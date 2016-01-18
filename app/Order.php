<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Services\Recordable;
use Illuminate\Database\Eloquent\SoftDeletes;


class Order extends Model
{
    use SoftDeletes;
    //use Recordable;

    //static $recordEvents = ['created', 'updated'];



    protected $table = 'orders';

    protected $with = ['subscriber', 'acquirer'];

    protected $visible = ['id', 'ordered_by', 'acquired_by', 'created_at'];

    protected $fillable = ['ordered_by', 'acquired_by', 'state_id', 'deleted_at'];

    protected $dates = ['deleted_at'];


    /**
     * Calling convention in view to display quantity of a specific product in a specific order:
     * foreach($order->products() as $product) {
     *    $product->pivot->quantity
     * }
    */
    public function products() {
        return $this->belongsToMany(Product::class, 'orders_products')->withPivot('quantity')->withTimestamps();
    }

    public function activtity() {
        return $this->hasMany(ActivityLog::class);
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


    public function scopePending($query) {
        return $query->where('acquired_by', null);
    }

    public function scopePendingFor($query, $id) {
        return $this->scopePending($query)->where('id', $id);
    }

    public function scopeBy($query, $id) {
        return $query->where('ordered_by', $id);
    }

    public function scopeStatus($query, $status) {
        $state_id = OrderState::where('name', $status)->pluck('id');
        return $query->where('state_id', $state_id);
    }

}
