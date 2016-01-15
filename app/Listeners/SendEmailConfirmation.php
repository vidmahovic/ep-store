<?php

namespace App\Listeners;

use App\Events\CustomerWasRegistered;
use Illuminate\Mail\Mailer;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

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
        Mail::send('emails.registration_email', ['user' => $event->customer->user, 'password' => $event->password], function($m) use($event) {
            $m->to($event->customer->user->email, $event->customer->user->name)->subject('Registracija uspešna!');;
        });
    }
}
