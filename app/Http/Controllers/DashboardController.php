<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\User;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('components.dashboard', [
            'customerCount' => Customer::count(),
            'invoiceCount' => Invoice::count(),
            'productCount' => Product::count(),
            'userCount' => User::count(),
            'lowStockProducts' => Product::query()
                ->where('quantity', '<=', 10)
                ->orderBy('quantity')
                ->take(5)
                ->get(),
            'recentInvoices' => Invoice::query()
                ->with('customer')
                ->latest()
                ->take(5)
                ->get(),
        ]);
    }
}
