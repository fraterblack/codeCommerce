<?php

namespace CodeCommerce\Listeners\Events;

use CodeCommerce\Events\CheckoutEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailCheckout
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CheckoutEvent  $event
     * @return void
     */
    public function handle(CheckoutEvent $event)
    {
        $user = $event->getUser();
        $order = $event->getOrder();

       Mail::send('emails.checkout', ['user' => $user, 'order' => $order], function ($m) use ($user, $order) {
           $m->to($user->email, $user->name)->subject('Seu pedido #' . $order->id .' foi finalizado');
       });
    }
}
