<?php
namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index()
    {
        $hotels = Hotel::orderBy('name')->paginate(10); // Pagination
        return view('hotels.index', compact('hotels'));
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $search = $request->input('query');
            $hotels = Hotel::where('name', 'LIKE', "%{$search}%")
                ->orWhere('location', 'LIKE', "%{$search}%")
                ->get();

            return response()->json($hotels);
        }

        return response()->json([]);
    }
}
