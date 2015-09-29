<?php

namespace App\Traits\File;


use App\User;
use App\Interfaces\File\FileModelInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

trait FileRepository {

    /**
     * Contains the path to the directory where the uploaded files are stored.
     *
     * @var string
     */
    public $storagePath = 'uploads/';



    /**
     * Stores the new file to the database.
     *
     * @param UploadedFile $file
     * @param $user
     * @param null $requestName
     * @internal param array $details
     * @return mixed
     */
    protected function storeFile(UploadedFile $file, $user, $requestName)
    {
        $type = $file->getClientOriginalExtension();

        if($requestName == null)
            $name = $file->getClientOriginalName();
        else
        {
            $name = $this->sanitizeName($requestName).'.'.$type;
        }
        $actualName = time(). $name;

        $path = $this->storagePath . $actualName;

        if (!$file->move($path)) {
            return false;
        }

        $details = [
            'name' => $name,
            'type' => $type,
            'path' => $path,
        ];

        return $this->persist($details, $user);

    }

    /**
     * Delete a file.
     *
     * @param $file
     * @return bool
     */
    public function deleteFile(FileModelInterface $file)
    {
        if($file->delete())
        {
            return true;
        }
        return false;
    }

    /**
     * Storing the information about the file to the database.
     *
     * @param array $details
     * @param User $user
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function persist(Array $details, User $user)
    {
        return $user->files()->create([
            'name' => $details['name'],
            'path' => $details['path'],
            'type' => $details['type'],
        ]);
    }

    /**
     * Sanitizes the name for use in the storing of the files
     *
     * @param $requestName
     * @return mixed
     */
    protected function sanitizeName($requestName)
    {
        $fileName = preg_replace("([^\w\s\d\-_~,;:\[\]\(\].]|[\.]{2,})", '', $requestName);
        $fileName = filter_var($fileName, FILTER_SANITIZE_URL);
        return $fileName;
    }
} 