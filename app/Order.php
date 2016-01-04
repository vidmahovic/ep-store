<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';


    /**
     * Calling convention in view to display quantity of a specific product in a specific order:
     * foreach($order->products() as $product) {
     *    $product->pivot->quantity
     * }
    */
    public function products() {
        return $this->belongsToMany('App\Product', 'orders_products')->withPivot('quantity');
    }

    public function acquirer() {
        return $this->belongsTo('App\Employee', 'acquired_by');
    }

    public function subscriber() {
        return $this->belongsTo('App\Customer', 'ordered_by');
    }

    public function state() {
        return $this->belongsTo('App\OrderState', 'state_id');
    }


    public function scopeProcessed($query) {
        return $query->where('processed_by', null);
    }

    public function scopeIsProcessed($query, $id) {
        return $this->scopeProcessed($query)->where('id', $id);
    }
}
