<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{

    public $timestamps = true;

    public function voter() {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function scopeLevel($query, $vote) {
        return $query->where('vote', $vote);
    }

    public function scopeBy($query, $id) {
        return $query->where('customer_id', $id);
    }

}
