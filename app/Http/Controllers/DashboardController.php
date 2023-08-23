<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Product;
use App\Models\Invoice;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $todayStart = Carbon::now()->startOfDay();
        $todayEnd = Carbon::now()->endOfDay();
        $lastWeekStart = Carbon::now()->subWeek()->startOfWeek();
        $lastWeekEnd = Carbon::now()->subWeek()->endOfWeek();
        $lastMonthStart = Carbon::now()->subMonth()->startOfMonth();
        $lastMonthEnd = Carbon::now()->subMonth()->endOfMonth();

        // Retrieve the total price and count for the last week and last month
        $todaySales = Sale::whereBetween('created_at', [$todayStart, $todayEnd])->get();
        $lastWeekSales = Sale::whereBetween('created_at', [$lastWeekStart, $lastWeekEnd])->get();
        $lastMonthSales = Sale::whereBetween('created_at', [$lastMonthStart, $lastMonthEnd])->get();
        $todaySalesmade = Invoice::whereBetween('created_at', [$todayStart, $todayEnd])->get();
        $lastWeekSalesmade = Invoice::whereBetween('created_at', [$lastWeekStart, $lastWeekEnd])->get();
        $lastMonthSalesmade = Invoice::whereBetween('created_at', [$lastMonthStart, $lastMonthEnd])->get();

        // Calculate total price and count for the last week and last month
        $todayCount = $todaySales->count();
        $todayTotalPrice = $todaySalesmade->sum('totalprice');
        $lastWeekTotalPrice = $lastWeekSalesmade->sum('totalprice');
        $lastWeekCount = $lastWeekSales->count();
        $lastMonthTotalPrice = $lastMonthSalesmade->sum('totalprice');
        $lastMonthCount = $lastMonthSales->count();

        $invoices = Invoice::count();
        $sales = Sale::where('status', 1)->latest()->take(10)->get();
        $totalsales = Sale::count();
        $totalstock = Product::where('stockquantity', '>', 0)->where('stockquantity', '<', 30)->count();
        $totaloutofstock = Product::where('stockquantity', '<=', 0)->count();
        $taskStatusColors = [
            'Pending' => '#FFC0C0',
            'Paid' => '#C0FFC0',
        ];
        return view('/auth/dashboard', compact('totalsales','totalstock','totaloutofstock','sales','taskStatusColors','lastWeekTotalPrice','lastWeekCount','lastMonthTotalPrice','lastMonthCount','todayCount','todayTotalPrice','invoices'));
    }
}
