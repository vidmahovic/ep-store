<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;

    protected $table = 'customers';

    public $timestamps = false;

    protected $fillable = ['street', 'phone'];

    public function user() {
        return $this->morphOne('App\User', 'userable');
    }

    public function log() {
        return $this->morphOne('App\ActivityLog', 'subject');
    }

    public function city() {
        return $this->belongsTo('App\Municipality', 'city_id');
    }

    public function orders() {
        return $this->hasMany('App\Order', 'ordered_by');
    }

    public function productVotes() {
        return $this->belongsToMany('App\Product', 'votes')->withPivot('vote');
    }


    /* QUERY SCOPES */
    public function scopeDeactivated($query) {
        return $query->onlyTrashed();
    }

}
