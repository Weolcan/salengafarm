<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SystemLogController extends Controller
{
    /**
     * Fetch logs via AJAX for modal
     */
    public function fetchLogs(Request $request)
    {
        // Get filter parameters
        $level = $request->get('level', 'all');
        $search = $request->get('search', '');
        $lines = $request->get('lines', 100);

        // Read log file
        $logPath = storage_path('logs/laravel.log');
        
        if (!File::exists($logPath)) {
            return response()->json([
                'logs' => [],
                'logSize' => 0,
                'count' => 0
            ]);
        }

        // Get file size
        $logSize = File::size($logPath);

        // Read last N lines
        $logs = $this->readLastLines($logPath, $lines);
        
        // Parse logs
        $parsedLogs = $this->parseLogs($logs);

        // Apply filters
        if ($level !== 'all') {
            $parsedLogs = array_filter($parsedLogs, function($log) use ($level) {
                return strtolower($log['level']) === strtolower($level);
            });
        }

        if (!empty($search)) {
            $parsedLogs = array_filter($parsedLogs, function($log) use ($search) {
                return stripos($log['message'], $search) !== false || 
                       stripos($log['context'], $search) !== false;
            });
        }

        return response()->json([
            'logs' => array_values($parsedLogs),
            'logSize' => $logSize,
            'count' => count($parsedLogs)
        ]);
    }

    /**
     * Display system logs (super admin only)
     */
    public function index(Request $request)
    {
        // Get filter parameters
        $level = $request->get('level', 'all');
        $search = $request->get('search', '');
        $lines = $request->get('lines', 100);

        // Read log file
        $logPath = storage_path('logs/laravel.log');
        
        if (!File::exists($logPath)) {
            return view('admin.logs.index', [
                'logs' => [],
                'logSize' => 0,
                'level' => $level,
                'search' => $search,
                'lines' => $lines
            ]);
        }

        // Get file size
        $logSize = File::size($logPath);

        // Read last N lines
        $logs = $this->readLastLines($logPath, $lines);
        
        // Parse logs
        $parsedLogs = $this->parseLogs($logs);

        // Apply filters
        if ($level !== 'all') {
            $parsedLogs = array_filter($parsedLogs, function($log) use ($level) {
                return strtolower($log['level']) === strtolower($level);
            });
        }

        if (!empty($search)) {
            $parsedLogs = array_filter($parsedLogs, function($log) use ($search) {
                return stripos($log['message'], $search) !== false || 
                       stripos($log['context'], $search) !== false;
            });
        }

        return view('admin.logs.index', [
            'logs' => array_values($parsedLogs),
            'logSize' => $logSize,
            'level' => $level,
            'search' => $search,
            'lines' => $lines
        ]);
    }

    /**
     * Download log file
     */
    public function download()
    {
        $logPath = storage_path('logs/laravel.log');
        
        if (!File::exists($logPath)) {
            return back()->with('error', 'Log file not found');
        }

        return response()->download($logPath, 'laravel-' . date('Y-m-d') . '.log');
    }

    /**
     * Clear log file
     */
    public function clear()
    {
        $logPath = storage_path('logs/laravel.log');
        
        if (File::exists($logPath)) {
            // Backup before clearing
            $backupPath = storage_path('logs/laravel-backup-' . date('Y-m-d-His') . '.log');
            File::copy($logPath, $backupPath);
            
            // Clear the log
            File::put($logPath, '');
            
            return response()->json([
                'success' => true,
                'message' => 'Logs cleared successfully. Backup saved.'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Log file not found'
        ], 404);
    }

    /**
     * Read last N lines from file
     */
    private function readLastLines($file, $lines = 100)
    {
        $handle = fopen($file, "r");
        $linecounter = $lines * 3; // Read more lines to account for multi-line entries
        $pos = -2;
        $beginning = false;
        $text = [];

        while ($linecounter > 0) {
            $t = " ";
            while ($t != "\n") {
                if (fseek($handle, $pos, SEEK_END) == -1) {
                    $beginning = true;
                    break;
                }
                $t = fgetc($handle);
                $pos--;
            }
            $linecounter--;
            if ($beginning) {
                rewind($handle);
            }
            $text[] = fgets($handle);
            if ($beginning) break;
        }
        fclose($handle);
        
        // Return in correct order (oldest to newest)
        return array_reverse($text);
    }

    /**
     * Parse log lines into structured data
     */
    private function parseLogs($logs)
    {
        $parsed = [];

        foreach ($logs as $line) {
            $line = trim($line);
            if (empty($line)) continue;

            // Match Laravel log format: [2026-02-05 12:21:02] local.INFO: Message
            if (preg_match('/^\[(.*?)\]\s+\w+\.(\w+):\s+(.*)$/', $line, $matches)) {
                $timestamp = $matches[1];
                $level = strtoupper($matches[2]);
                $rest = $matches[3];

                // Try to extract JSON context from the end
                $message = $rest;
                $context = '';

                // Look for JSON object {...} or array [...] at the end
                if (preg_match('/^(.+?)\s+(\{.+\}|\[.+\])$/', $rest, $contextMatches)) {
                    $message = trim($contextMatches[1]);
                    $context = $contextMatches[2];
                }

                $parsed[] = [
                    'timestamp' => $timestamp,
                    'level' => $level,
                    'message' => $message,
                    'context' => $context,
                    'raw' => $line
                ];
            }
        }

        // Reverse to show newest first
        return array_reverse($parsed);
    }
}
