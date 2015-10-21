<?php namespace App\Interfaces;


interface PostableInterface
{
    /**
     * Links the model to its activity.
     *
     * @return mixed
     */
    public function activity();
}