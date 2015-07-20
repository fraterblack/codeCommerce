<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use Illuminate\Support\Facades\Session;
use CodeCommerce\Cart;
use CodeCommerce\Product;

class CartController extends Controller
{
    private $cart;

    /**
     * @param Cart $cart
     */
    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    public function index(Product $productModel)
    {
        if (!Session::has('cart')) {
            Session::set('cart', $this->cart);
        }

        return view('store.cart', ['cart' => Session::get('cart'), 'products' => $productModel]);
    }

    public function add($id)
    {
        $cart = $this->getCart();
        $product = Product::find($id);

        $cart->add($id, $product->name, $product->price);

        Session::set('cart', $cart);

        return redirect()->route('cart');
    }

    public function remove($id)
    {
        $cart = $this->getCart();

        $cart->remove($id);

        Session::set('cart', $cart);

        return redirect()->route('cart');
    }

    public function update($id, $newQtd)
    {
        $cart = $this->getCart();

        $cart->update($id, $newQtd);

        Session::set('cart', $cart);

        return redirect()->route('cart');
    }

    /**
     * @return Cart
     */
    private function getCart()
    {
        if (Session::has('cart')) {
            $cart = Session::get('cart');
        } else {
            $cart = $this->cart;
        }

        return $cart;
    }
}
