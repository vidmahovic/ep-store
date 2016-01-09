<?php

namespace App\Listeners;

use App\Events\CustomerWasRegistered;
use Illuminate\Mail\Mailer;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailConfirmation
{

    protected $mail;

    /**
     * Create the event listener.
     *
     * @param Mailer $mailer
     */
    public function __construct(Mailer $mailer)
    {
        $this->mail = $mailer;
    }

    /**
     * Handle the event.
     *
     * @param  CustomerWasRegistered  $event
     * @return void
     */
    public function handle(CustomerWasRegistered $event)
    {

        /*$this->mail->send()*/

    }
}
