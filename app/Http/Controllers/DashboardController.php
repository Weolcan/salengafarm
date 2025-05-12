<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plant;
use App\Models\Sale;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Get total stock
        $totalStock = Plant::sum('quantity');

        // Get low stock items (quantity less than 10)
        $lowStockItems = Plant::where('quantity', '<', 10)->get();

        // Get recent plants (last 5 added)
        $recentPlants = Plant::orderBy('created_at', 'desc')->take(5)->get();

        // Get stock distribution by category
        $stockByCategory = Plant::selectRaw('category, sum(quantity) as total')
            ->groupBy('category')
            ->pluck('total', 'category')
            ->toArray();
            
        // Get sales distribution by plant category instead of individual plants
        $salesByPlant = [];
        $totalSalesQuantity = Sale::sum('quantity');
        
        if ($totalSalesQuantity > 0) {
            $salesByPlant = DB::table('sales')
                ->join('plants', 'sales.plant_id', '=', 'plants.id')
                ->select(
                    'plants.category',
                    DB::raw('SUM(sales.quantity) as total_quantity'),
                    DB::raw('(SUM(sales.quantity) / ' . $totalSalesQuantity . ' * 100) as percentage')
                )
                ->groupBy('plants.category')
                ->orderBy('total_quantity', 'desc')
                ->get()
                ->pluck('percentage', 'category')
                ->toArray();
        }

        // Get all plants for the update stock modal
        $plants = Plant::all();

        return view('dashboard', compact(
            'totalStock',
            'lowStockItems',
            'recentPlants',
            'stockByCategory',
            'salesByPlant',
            'plants'
        ));
    }

    public function updateStock(Request $request)
    {
        $updates = $request->input('updates', []);

        foreach ($updates as $update) {
            if (isset($update['plant_id'], $update['quantity'])) {
                Plant::where('id', $update['plant_id'])
                    ->update(['quantity' => $update['quantity']]);
            }
        }

        return response()->json(['message' => 'Stock updated successfully']);
    }

    public function clientRequests()
    {
        // Assuming you have a Request model
        $requests = \App\Models\ClientRequest::latest()->paginate(10);
        
        return view('client-requests.index', compact('requests'));
    }
}