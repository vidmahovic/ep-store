<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{


    public function orders() {
        return $this->belongsToMany('App\Order', 'orders_products')->withPivot('quantity');
    }

    public function voters() {
        return $this->belongsToMany('App\Customer', 'votes')->withPivot('vote');
    }
}
