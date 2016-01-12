<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';


    protected $visible = ['id', 'ordered_by', 'acquired_by', 'created_at'];

    protected $fillable = ['ordered_by', 'acquired_by', 'state_id'];


    /**
     * Calling convention in view to display quantity of a specific product in a specific order:
     * foreach($order->products() as $product) {
     *    $product->pivot->quantity
     * }
    */
    public function products() {
        return $this->belongsToMany(Product::class, 'orders_products')->withPivot('quantity');
    }

    public function acquirer() {
        return $this->belongsTo(Employee::class, 'acquired_by');
    }

    public function subscriber() {
        return $this->belongsTo(Customer::class, 'ordered_by');
    }

    public function state() {
        return $this->belongsTo(OrderState::class, 'state_id');
    }


    public function scopeProcessed($query) {
        return $query->where('acquired_by', null);
    }

    public function scopeIsProcessed($query, $id) {
        return $this->scopeProcessed($query)->where('id', $id);
    }
}
