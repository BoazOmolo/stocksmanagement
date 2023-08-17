<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Product;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $totalsales = Sale::count();
        $totalstock = Product::where('stockquantity', '>', 0)->count();
        $totaloutofstock = Product::where('stockquantity', '<=', 0)->count();
        return view('/auth/dashboard', compact('totalsales','totalstock','totaloutofstock'));
    }
}
