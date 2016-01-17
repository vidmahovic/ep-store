<?php
/**
 * Created by PhpStorm.
 * User: vidmahovic
 * Date: 05/11/15
 * Time: 00:09
 */

namespace App\Services;


use App\ActivityLog;
use App\Order;
use ReflectionClass;

trait Recordable
{

    protected static function bootRecordEvents()
    {
        foreach(static::getModelEvents() as $event)
        {
            static::$event(function($model) use ($event) {
                $model->recordActivity($event);
            });
        }
    }

    /**
     * @param $event
     */
    public function recordActivity($event)
    {
        ActivityLog::create([
            'subject_id' => $this->id,
            'name' => $this->getActivityName($this, $event),
            'subject_type' => get_class($this),
            'user_id' => $this->getActivityCarrier(),
            'seen' => 0
        ]);
    }

    /**
     * If activity is linked or unlinked, the user ID will be authenticated user's ID.
     * @param $event
     * @return mixed
     */
    protected function getActivityCarrier() {
        if($this instanceof Order) {
            return $this->ordered_by;
        }
        return $this->user_id;
    }

    protected function getActivityName($model, $event) {

        $activity = strtolower((new ReflectionClass($model))->getShortName());
        return $activity.'_'.$event;
    }

    public function deleteRecords() {
        ActivityLog::where('subject_id', $this->id)->delete();
    }

    /**
     * Check if $recordEvents array is present in Model class, if not use defaults
     *
     * @return array
     */
    protected static function getModelEvents()
    {
        if(isset(static::$recordEvents)) {
            return static::$recordEvents;
        }

        return ['created', 'updated', 'deleted'];

    }
}