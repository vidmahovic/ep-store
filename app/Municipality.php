<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    protected $table = 'municipalities';

    public $timestamps = false;

    protected $fillable = ['zip_code', 'name'];


    public function residents() {
        return $this->hasMany('App\Customer', 'city_id');
    }
}
