<?php

namespace App\Listeners;

use App\Events\OrderWasPurchased;
use Illuminate\Mail\Mailer;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendPurchaseEmail
{

    protected $mail;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Mailer $mailer)
    {
        $this->mail = $mailer;
    }

    /**
     * Handle the event.
     *
     * @param  OrderWasPurchased  $event
     * @return void
     */
    public function handle(OrderWasPurchased $event)
    {
        $this->mail->send('emails.order_email', ['order' => $event->order], function($m) use($event) {
            $m->to($event->order->subscriber->user->email, $event->order->subscriber->user->name)->subject('Naročilo je bilo uspešno!');
        });
    }
}
