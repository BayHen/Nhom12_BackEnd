<?php

namespace App\Http\Controllers;

use App\Order;

class AdminOrdersController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        var_dump($orders[0]->details[0]->product->product_name);
        return view('admin.pages.orders.index');
    }

    public function destroy($id)
    {
        return "xóa đơn đặt hàng " . $id;
    }
}
