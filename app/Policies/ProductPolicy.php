<?php

namespace App\Policies;

use App\Product;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function before(User $user, $ability) {
        if($user->isAdmin()) {
            return true;
        }
    }

    public function update(User $user, Product $product) {
        // check if user is admin or employee
        // if so, allow the product to be updated
    }

    public function create() {

    }

    public function delete() {

    }
}
