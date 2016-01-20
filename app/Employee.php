<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;

    protected $fillable = ['id', 'deleted_at'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    protected $table = "employees";

    public $timestamps = false;

    protected $dates = ['deleted_at'];

    protected $with = ['user'];

    public function user() {
        return $this->morphOne(User::class, 'userable')->withTrashed();
    }

    public function log() {
        return $this->morphOne(ActivityLog::class, 'subject');
    }

    public function orders() {
        return $this->hasMany(Order::class, 'acquired_by');
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
