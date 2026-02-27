<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */

    public function index()
    {
        $brands = Brand::all();
        $user = Auth::user();

        return view('dashboard', compact('brands', 'user'));
    }


    public function __invoke(Request $request)
    {
        $user = Auth::user();

        return view('dashboard', [
            'user' => $user
        ]);
    }
}
