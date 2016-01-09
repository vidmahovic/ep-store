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

    protected $customer;

    /**
     * Create a new event instance.
     *
     * @param User $customer
     */
    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
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
