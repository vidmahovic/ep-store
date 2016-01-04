<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderState extends Model
{
    protected $table = 'order_states';



    public function orders() {
        return $this->hasMany('App\Order', 'state_id');
    }
}
