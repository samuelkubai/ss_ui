<?php namespace App\Api;


class FileTransformer extends BaseTransformer
{

    /**
     * Transforming the single file data to json.
     *
     * @param $file
     * @return array
     */
    public function transform($file)
    {
        return [
            'id' => $file->id,
            'name' => $file->name,
            'topic' => $file->topic->name,
            'path' => asset($file->path()),
            'picture' => asset($file->picture()),
            'created_at' => $file->updated_at->diffForHumans(),
            'url' => [
                'share' => url('/file/'.$file->id.'/share'),
                'delete' => url('/file/'.$file->id.'/delete'),
                'addToBackpack' => url('/')
            ],
            'user' => [
                'name' => $file->user->first_name . ' ' . $file->user->last_name
            ],
        ];
    }
}