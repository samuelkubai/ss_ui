<?php

namespace App\Traits\Activity;


use App\Activity;

trait RecordsActivity {

    protected static function bootRecordsActivity()
    {
        foreach (static::getModelEvents() as $event)
        {
            static::$event(function($model, $event)
            {
                $model->recordActivity($event);
            });
        }
    }

    protected function getActivityName($model, $action)
    {
        $name = strtolower(new \ReflectionClass($model))->getShortName();
        return "{$action}_{$name}";
    }

    public function recordActivity($event)
    {
        Activity::create([
            'subject_id' => $this->id,
            'type' => $this->getActivityName($this, $event),
            'subject_type' => get_class($this),
            'user_id' => \Auth::user()->id,
            'group_id' => $this->group_id
        ]);
    }

    protected function getModelEvents()
    {
        if(isset(static::$recordEvents))
        {
            return static::$recordEvents;
        }

        return ['created', 'updated', 'deleted'];
    }
} 