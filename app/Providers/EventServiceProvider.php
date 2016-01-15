<?php

namespace App\Providers;

use App\Events\CustomerWasRegistered;
use App\Order;
use App\User;
use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\CustomerWasRegistered' => [
            'App\Listeners\SendEmailConfirmation',
        ],
        'App\Events\OrderWasPurchased' => [
            'App\Listeners\SendPurchaseEmail'
        ]
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);


    }
}
