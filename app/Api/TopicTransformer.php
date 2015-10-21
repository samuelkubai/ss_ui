<?php namespace App\Api;


class TopicTransformer extends BaseTransformer
{

    /**
     * Transforming the single topic model data to json.
     *
     * @param $topic
     * @return array
     */
    public function transform($topic)
    {
        return [
            'id' => $topic->id,
            'name' => $topic->name,
        ];
    }
}