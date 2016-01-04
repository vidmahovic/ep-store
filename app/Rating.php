<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{

    protected $table = 'ratings';


    public function customers() {
        return $this->belongsToMany('App\Customer');
    }

    public function products() {
        return $this->belongsToMany('App\Product');
    }
}
