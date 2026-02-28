<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */

    public function index()
    {
        $products = Product::with(['brand', 'condition'])->orderBy('name', 'desc')->paginate(5);
        $user = Auth::user();

        return view('dashboard', compact('products', 'user'));
    }


    public function __invoke(Request $request)
    {
        $user = Auth::user();

        return view('dashboard', [
            'user' => $user
        ]);
    }
}
