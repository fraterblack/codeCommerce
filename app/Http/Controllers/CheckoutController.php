<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Order;
use CodeCommerce\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function place(Order $orderModel, OrderItem $orderItemModel)
    {
        //Se existe item no carrinho de compras
        if (Session::has('cart') && Session::get('cart')->getTotal() > 0) {
            $cart = Session::get('cart');

           $order = $orderModel->create(['user_id' => Auth::user()->id, 'total' => $cart->getTotal()]);

            foreach ($cart->all() as $k=>$item) {
                $order->items()->create([
                    'product_id' => $k,
                    'price' => $item['price'],
                    'qtd' => $item['qtd']
                ]);
            }

            $cart->clear();

            return view('store.checkout', compact('order'));
        } else {
            return redirect()->route('cart');
        }
    }
}
