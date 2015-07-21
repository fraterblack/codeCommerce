<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\OrderItem;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function place(Order $orderModel, OrderItem $orderItemModel)
    {
        if (Session::has('cart')) {
            return false;
        }

        $cart = Session::get('cart');

        if ($cart->getTotal() > 0) {
            $order = $orderModel->create(['user_id' => 1, 'total' => $cart->getTotal()]);

            foreach ($cart->all() as $k=>$item) {
                $order->items()->create([
                    'product_id' => $k,
                    'price' => $item['price'],
                    'qtd' => $item['qtd']
                ]);
            }

            dd($order);
        }
    }
}
