<?php namespace App\Api;


abstract class BaseTransformer
{
    /**
     * Prepares the entire collection for the Api
     *
     * @param $items
     * @return array
     */
    public function transformCollection($items)
    {
        return array_map([$this, 'transform'], $items);
    }

    /**
     * Transforming the single item data to json.
     *
     * @param $activity
     * @return array
     */
    abstract public function transform($activity);
}