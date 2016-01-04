<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;

    protected $table = "employees";

    public $timestamps = false;

    public function user() {
        return $this->morphOne('App\User', 'userable');
    }

    public function log() {
        return $this->morphOne('App\ActivityLog', 'subject');
    }

    public function orders() {
        return $this->hasMany('App\Order', 'acquired_by');
    }


    /* QUERY SCOPES */


    /**
     * Return deactivated employees
     * @param $query
     * @return mixed
     */
    public function scopeDeactivated($query) {
        return $query->onlyTrashed();
    }


}
