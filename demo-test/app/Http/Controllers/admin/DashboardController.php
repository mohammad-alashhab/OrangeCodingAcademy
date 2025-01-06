<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\Review;
use App\Models\OrderItem;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Show the dashboard home page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Fetch key metrics
        $totalCustomers = User::where('role_id', 3)->count();
        $totalProducts = Product::count();
        $totalOrders = Order::count();
        $totalRevenue = Order::sum('total_price');

        // Fetch recent orders
        $recentOrders = Order::with(['user', 'status'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // Fetch top-selling products
        $topSellingProducts = OrderItem::select('product_id', DB::raw('SUM(quantity) as total_sold'), DB::raw('SUM(quantity * price) as total_revenue'))
            ->groupBy('product_id')
            ->orderBy('total_sold', 'desc')
            ->with('product')
            ->take(5)
            ->get();

        // Fetch low stock products
        $lowStockProducts = Product::where('stock', '<=', 10)
            ->orderBy('stock', 'asc')
            ->take(5)
            ->get();

        // Fetch active coupons
        $activeCoupons = Coupon::where('valid_until', '>=', now())
            ->orderBy('valid_until', 'asc')
            ->take(5)
            ->get();

        // Fetch review statistics
        $averageRating = Review::avg('rating');
        $totalReviews = Review::count();

        // Fetch sales data for the current month
        $salesData = Order::selectRaw('MONTH(created_at) as month, SUM(total_price) as total_sales')
        ->whereYear('created_at', Carbon::now()->year)
        ->groupBy('month')
        ->orderBy('month')
        ->get();

        // Prepare data for the chart
        $months = [];
        $sales = [];

        foreach ($salesData as $data) {
            $months[] = Carbon::create()->month($data->month)->format('M'); // Get the short month name
            $sales[] = $data->total_sales;
        }

        return view('admin.dashboard', compact(
            'totalCustomers',
            'totalProducts',
            'totalOrders',
            'totalRevenue',
            'recentOrders',
            'topSellingProducts',
            'lowStockProducts',
            'activeCoupons',
            'averageRating',
            'totalReviews',
            'months',
            'sales'
        ));

    }
}
