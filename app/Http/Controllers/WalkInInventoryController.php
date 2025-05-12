<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Plant;
use App\Models\Sale;

class WalkInInventoryController extends Controller
{
    /**
     * Display the inventory management interface for walk-in sales.
     */
    public function index()
    {
        // Get all plants for inventory management
        $plants = Plant::orderBy('name')->get();
        
        // Get recent sales data for reference
        $recentSales = Sale::with('plant')
            ->orderBy('sale_date', 'desc')
            ->take(10)
            ->get();
        
        return view('walk-in.inventory', compact('plants', 'recentSales'));
    }
    
    /**
     * Update plant inventory quantities.
     */
    public function updateInventory(Request $request)
    {
        try {
            $updates = $request->input('updates', []);
            
            if (empty($updates)) {
                return response()->json([
                    'success' => false,
                    'message' => 'No updates provided'
                ], 400);
            }
            
            foreach ($updates as $update) {
                $plant = Plant::find($update['id']);
                if ($plant) {
                    $plant->quantity = max(0, $update['quantity']);
                    $plant->save();
                }
            }
            
            return response()->json([
                'success' => true,
                'message' => 'Inventory updated successfully'
            ]);
        } catch (\Exception $e) {
            Log::error('Error updating walk-in inventory: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Failed to update inventory: ' . $e->getMessage()
            ], 500);
        }
    }
    
    /**
     * Get inventory status and sales statistics.
     */
    public function getInventoryStats()
    {
        try {
            // Get low stock items (less than 10 quantity)
            $lowStock = Plant::where('quantity', '<', 10)->orderBy('quantity')->get();
            
            // Get top selling items in the last 30 days
            $topSelling = Sale::selectRaw('plant_id, SUM(quantity) as total_sold')
                ->with('plant')
                ->whereDate('sale_date', '>=', now()->subDays(30))
                ->groupBy('plant_id')
                ->orderByDesc('total_sold')
                ->take(5)
                ->get();
            
            return response()->json([
                'success' => true,
                'data' => [
                    'low_stock' => $lowStock,
                    'top_selling' => $topSelling
                ]
            ]);
        } catch (\Exception $e) {
            Log::error('Error fetching inventory stats: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch inventory statistics: ' . $e->getMessage()
            ], 500);
        }
    }
    
    /**
     * Get summary statistics for dashboard cards.
     */
    public function getSummary()
    {
        try {
            // Get total number of plants
            $totalPlants = Plant::sum('quantity');
            
            // Get count of low stock items (less than 10 quantity)
            $lowStockCount = Plant::where('quantity', '<', 10)->count();
            
            // Get today's sales count
            $todaySales = Sale::whereDate('sale_date', now()->toDateString())->count();
            
            // Get total revenue for the last 30 days
            $monthlyRevenue = Sale::whereDate('sale_date', '>=', now()->subDays(30))
                ->sum('total_price');
            
            return response()->json([
                'success' => true,
                'data' => [
                    'total_plants' => $totalPlants,
                    'low_stock_count' => $lowStockCount,
                    'today_sales' => $todaySales,
                    'monthly_revenue' => number_format($monthlyRevenue, 2)
                ]
            ]);
        } catch (\Exception $e) {
            Log::error('Error fetching summary statistics: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch summary statistics: ' . $e->getMessage()
            ], 500);
        }
    }
} 