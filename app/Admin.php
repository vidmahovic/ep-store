<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Model
{
    protected $table = "admins";

    public $timestamps = false;

    public function user() {
        return $this->morphOne(User::class, 'userable');
    }

    public function log() {
        return $this->morphOne(ActivityLog::class, 'subject');
    }

}
