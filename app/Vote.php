<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{

    public function voter() {
        return $this->belongsTo('App\Customer', 'customer_id');
    }

    public function product() {
        return $this->belongsTo('App\Product', 'product_id');
    }

}
