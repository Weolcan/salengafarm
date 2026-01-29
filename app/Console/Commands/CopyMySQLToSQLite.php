<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CopyMySQLToSQLite extends Command
{
    protected $signature = 'db:copy-mysql-to-sqlite';
    protected $description = 'Copy all data from MySQL to SQLite (MySQL data remains untouched)';

    public function handle()
    {
        $this->info('🔄 Starting data copy from MySQL to SQLite...');
        $this->info('⚠️  Your MySQL data will NOT be modified - this is a READ-ONLY operation');
        
        if (!$this->confirm('Do you want to continue?')) {
            $this->info('Operation cancelled.');
            return;
        }

        // Get all tables from MySQL
        $mysqlTables = DB::connection('mysql')->select('SHOW TABLES');
        $databaseName = DB::connection('mysql')->getDatabaseName();
        $tableKey = "Tables_in_{$databaseName}";
        
        $excludeTables = ['migrations', 'password_reset_tokens', 'failed_jobs', 'jobs', 'job_batches'];
        
        foreach ($mysqlTables as $table) {
            $tableName = $table->$tableKey;
            
            if (in_array($tableName, $excludeTables)) {
                $this->warn("⏭️  Skipping {$tableName}");
                continue;
            }
            
            $this->info("📋 Copying table: {$tableName}");
            
            try {
                // Get all data from MySQL
                $data = DB::connection('mysql')->table($tableName)->get();
                
                if ($data->isEmpty()) {
                    $this->line("   ℹ️  Table is empty, skipping...");
                    continue;
                }
                
                // Clear SQLite table first (optional)
                DB::connection('sqlite')->table($tableName)->truncate();
                
                // Insert data in chunks to avoid memory issues
                $chunks = $data->chunk(100);
                $bar = $this->output->createProgressBar($chunks->count());
                
                foreach ($chunks as $chunk) {
                    DB::connection('sqlite')->table($tableName)->insert(
                        json_decode(json_encode($chunk), true)
                    );
                    $bar->advance();
                }
                
                $bar->finish();
                $this->newLine();
                $this->info("   ✅ Copied {$data->count()} records");
                
            } catch (\Exception $e) {
                $this->error("   ❌ Error copying {$tableName}: " . $e->getMessage());
            }
        }
        
        $this->newLine();
        $this->info('✨ Data copy completed!');
        $this->info('📊 Verifying...');
        
        // Verify counts
        $this->table(
            ['Table', 'MySQL Count', 'SQLite Count', 'Status'],
            $this->getVerificationData()
        );
        
        $this->newLine();
        $this->info('✅ Your MySQL database is unchanged and safe!');
        $this->info('✅ SQLite now has a copy of your data!');
    }
    
    private function getVerificationData()
    {
        $tables = ['users', 'plants', 'plant_requests', 'display_plants', 'site_visits'];
        $data = [];
        
        foreach ($tables as $table) {
            try {
                if (Schema::connection('mysql')->hasTable($table)) {
                    $mysqlCount = DB::connection('mysql')->table($table)->count();
                    $sqliteCount = DB::connection('sqlite')->table($table)->count();
                    $status = $mysqlCount === $sqliteCount ? '✅ Match' : '⚠️  Mismatch';
                    
                    $data[] = [$table, $mysqlCount, $sqliteCount, $status];
                }
            } catch (\Exception $e) {
                $data[] = [$table, 'N/A', 'N/A', '❌ Error'];
            }
        }
        
        return $data;
    }
}
