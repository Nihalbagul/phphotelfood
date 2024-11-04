<?php
// app/Http/Controllers/DashboardController.php
namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Hotel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalHotels = Hotel::count();
        $totalFoods = Food::count();

        // Monthly data for foods and hotels
        $foodMonthlyData = Food::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month')
            ->toArray();
        $foodMonthlyData = array_replace(array_fill(1, 12, 0), $foodMonthlyData);

        $hotelMonthlyData = Hotel::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month')
            ->toArray();
        $hotelMonthlyData = array_replace(array_fill(1, 12, 0), $hotelMonthlyData);

        return view('dashboard.index', compact('totalHotels', 'totalFoods', 'foodMonthlyData', 'hotelMonthlyData'));
    }
}
