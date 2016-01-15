<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $table = 'activity_logs';

    protected $fillable = ['user_id', 'subject_id', 'subject_type', 'name', 'seen'];


    public function subject() {
        return $this->morphTo();
    }
}
