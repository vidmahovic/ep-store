<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{

    use SoftDeletes;

    public function orders() {
        return $this->belongsToMany(Order::class, 'orders_products')->withPivot('quantity')->withTimestamps();
    }

    public function voters() {
        return $this->belongsToMany(Customer::class, 'votes')->withPivot('vote')->withTimestamps();
    }
}
