<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Model
{
    use SoftDeletes;

    protected $table = "admins";

    public $timestamps = false;

    public function user() {
        return $this->morphOne('App\User', 'userable');
    }

    public function log() {
        return $this->morphOne('App\ActivityLog', 'subject');
    }

}
