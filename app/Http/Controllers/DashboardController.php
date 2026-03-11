<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Condition;
use App\Models\Brand;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */

    public function index(Request $request)
    {
        $query = Product::with(['brand', 'condition']);

        if ($request->filled('brand_id')) {
            $query->where('brand_id', $request->brand_id);
        }

        if ($request->filled('condition_id')) {
            $query->where('condition_id', $request->condition_id);
        }

        $sort = $request->get('sort', 'newest');
        $products = $query->sorted($sort)->paginate(10)->withQueryString();
        $user = Auth::user();
        $brands = Brand::all();
        $conditions = Condition::all();

        return view('dashboard', compact('products', 'user', 'brands', 'conditions'));
    }
}
