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
        return $this->morphOne(User::class, 'userable');
    }

    public function log() {
        return $this->morphOne(ActivityLog::class, 'subject');
    }

    public function city() {
        return $this->belongsTo(Municipality::class, 'city_id');
    }

    public function orders() {
        return $this->hasMany(Order::class, 'ordered_by');
    }

    public function products() {
        return $this->belongsToMany(Product::class, 'votes')->withPivot('vote');
    }


    /* QUERY SCOPES */
    public function scopeDeactivated($query) {
        return $query->onlyTrashed();
    }

}
