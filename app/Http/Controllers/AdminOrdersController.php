<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Order;

class AdminOrdersController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('id', 'desc')->paginate(10);

        return view('admin.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::find($id);

        return view("admin.orders.show", compact('order'));
    }

    public function updateStatus($id, $status)
    {
        Order::find($id)->update(['status' => $status]);

        return redirect()->route('admin.orders');
    }
}
