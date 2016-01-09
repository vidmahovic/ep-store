<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{

    protected $table = 'ratings';


    public function customers() {
        return $this->belongsToMany(Customer::class);
    }

    public function products() {
        return $this->belongsToMany(Product::class);
    }
}
