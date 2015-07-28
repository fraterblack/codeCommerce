<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Order;
use CodeCommerce\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.store');
    }

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

            //Limpa carrinho
            Session::remove('cart');

            return "O pedido foi fechado com sucesso!";

            dd($order);
        } else {
            return redirect()->route('cart');
        }
    }
}
