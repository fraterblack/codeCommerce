<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Events\CheckoutEvent;
use CodeCommerce\Http\Requests;
use CodeCommerce\Order;
use CodeCommerce\OrderItem;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use PHPSC\PagSeguro\Items\Item;

use PHPSC\PagSeguro\Requests\Checkout\CheckoutService;
use PHPSC\PagSeguro\Purchases\Transactions\Locator;

class CheckoutController extends Controller
{
    public function place(Order $orderModel, OrderItem $orderItemModel, CheckoutService $checkoutService)
    {
        //Se existe item no carrinho de compras
        if (Session::has('cart') && Session::get('cart')->getTotal() > 0) {
            $cart = Session::get('cart');

            $checkout = $checkoutService->createCheckoutBuilder();

            $transactionReference = md5(Auth::user()->id . "_" . date("Ymd His") . "_" . $cart->getTotal());

            $order = $orderModel->create([
                'user_id' => Auth::user()->id,
                'total' => $cart->getTotal(),
                'status' => 1,
                'payment_transaction_reference' => $transactionReference
            ]);

            //Itens
            foreach ($cart->all() as $k=>$item) {
                $order->items()->create([
                    'product_id' => $k,
                    'price' => $item['price'],
                    'qtd' => $item['qtd']
                ]);

                $checkout->addItem(new Item($k, $item['name'], number_format($item['price'], 2, '.', ''), $item['qtd']));
            }

            $cart->clear();

            //Dispara evento
            event(new CheckoutEvent(Auth::user(), $order));

            //Seta Referencia
            $checkout->setReference($transactionReference);
            //Seta a URL
            $checkout->setRedirectTo(route('transaction.return', ['transaction_reference' => $transactionReference]));

            $response = $checkoutService->checkout($checkout->getCheckout());

            return redirect($response->getRedirectionUrl());

            //return view('store.checkout', compact('order'));
        } else {
            return redirect()->route('cart');
        }
    }

    public function transactionReturn(Order $orderModel, Request $request)
    {
        //Consulta no PagSeguro o status da transação
        $transactionStatus = $this->transactionStatus($request->transaction_id);

        $orderModel->where('payment_transaction_reference', $request->transaction_reference)->update([
            'payment_transaction_code' => $request->transaction_id,
            'status' => $transactionStatus
        ]);

        return redirect()->route('account.orders');
    }

    public function transactionNotification(Order $orderModel, Request $request, Locator $service)
    {
        $notificationType = $request->notificationType;
        //$notificationType = "transaction"; //Para teste local
        $notificationCode = $request->notificationCode;
        //$notificationCode = "5CB5B19E65296529A4A33449EF8633A3B0B7"; //Para teste local

        if ($notificationType == 'transaction') {
            $transactionDetails = $service->getByNotification($notificationCode)->getDetails();

            //Ignora Status (4 - available)
            if ($transactionDetails->getStatus() != 4) {
                $orderModel->where('payment_transaction_code', $transactionDetails->getCode())->update([
                        'status' => $transactionDetails->getStatus()
                ]);
            }
        }
    }

    public function transactionStatus($code)
    {
        $service = App::make('Locator');

        $transactionStatus = $service->getByCode($code)->getDetails()->getStatus();

        //Status (4 - available) é o considerado
        if ($transactionStatus == 4) {
            $transactionStatus = 3;
        }

        return $transactionStatus;
    }
}
