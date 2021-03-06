<?php

namespace App\Events;

use App\Customer;
use App\Events\Event;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class CustomerWasRegistered extends Event implements ShouldQueue
{
    use SerializesModels;

    public $customer;
    public $password;

    /**
     * Create a new event instance.
     *
     * @param Customer|User $customer
     */
    public function __construct(Customer $customer, $password)
    {
        $this->customer = $customer;
        $this->password = $password;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
