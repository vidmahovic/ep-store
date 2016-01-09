<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{


    public function orders() {
        return $this->belongsToMany(Order::class, 'orders_products')->withPivot('quantity');
    }

    public function voters() {
        return $this->belongsToMany(Customer::class, 'votes')->withPivot('vote');
    }
}
