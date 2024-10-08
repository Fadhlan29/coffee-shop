<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index()
    {
        $dataLength = [
            'orders' => Order::count(),
            'products' => Product::count(),
            'users' => User::count()
        ];

        return view('dashboard.index', $dataLength);
    }
}
