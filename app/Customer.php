<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;

    protected $with = ['user', 'city', 'products'];

    protected $table = 'customers';

    public $timestamps = false;

    protected $fillable = ['street', 'phone', 'city_id'];

    public function user() {
        return $this->morphOne(User::class, 'userable');
    }

    public function log() {
        return $this->hasMany(ActivityLog::class, 'user_id');
    }

    public function city() {
        return $this->belongsTo(Municipality::class, 'city_id');
    }

    public function orders() {
        return $this->hasMany(Order::class, 'ordered_by');
    }

    public function products() {
        return $this->belongsToMany(Product::class, 'votes')->withPivot('vote')->withTimestamps();
    }

    /* QUERY SCOPES */
    public function scopeDeactivated($query) {
        return $query->onlyTrashed();
    }

}
