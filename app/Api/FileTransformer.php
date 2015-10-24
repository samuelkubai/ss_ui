<?php namespace App\Api;


use App\Repos\File\FileRepository;

class FileTransformer extends BaseTransformer
{
    /**
     * @var FileRepository
     */
    private $fileRepository;

    /**
     * Initialize the variables for the transformer.
     *
     * @param FileRepository $fileRepository
     */
    function __construct(FileRepository $fileRepository)
    {
        $this->fileRepository = $fileRepository;
    }

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
            'created_at' => $file->updated_at->diffForHumans(),
            'inBackpack' => (bool) \Auth::user()->inMyBackPack($file),
            'yourFile' => (bool) \Auth::user()->isMyFile($file),
            'icon' => $this->fileRepository->getFilePicture($file)? asset($this->fileRepository->getFilePicture($file)) : (bool)false,
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