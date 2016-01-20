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

    public function before(User $user, $ability)
    {
        if(auth()->user()->hasRole('employee')) {
            return true;
        }
    }

    public function update(User $user, Product $product) {

        return auth()->user()->hasRole('employee');
    }

    public function create() {
        return auth()->user()->hasRole('employee');
    }

    public function deactivate() {
        return auth()->user()->hasRole('employee');
    }

    public function activate() {
        return auth()->user()->hasRole('employee');
    }
}
