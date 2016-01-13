<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        if ($this->useSti()) {
            $this->setAttribute($this->stiClassField, get_class($this));
        }
    }

    private function useSti()
    {
        return ($this->stiClassField && $this->stiBaseClass);
    }


    public function newFromBuilder($attributes = [], $connection = null)
    {
        if ($this->useSti() && $attributes->{$this->stiClassField}) {
            $class = $attributes->{$this->stiClassField};
            $instance = new $class;
            $instance->exists = true;
            $instance->setRawAttributes((array) $attributes, true);
            return $instance;
        } else {
            return parent::newFromBuilder($attributes);
        }
    }
}
