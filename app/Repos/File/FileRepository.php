<?php

namespace App\Repos\File;

use App\File;
use App\Traits\File\FileSharing;
use App\Traits\File\FileDownload;
use App\Interfaces\File\FileRepositoryInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class FileRepository implements FileRepositoryInterface
{
    use FileSharing;
    use FileDownload;

    /**
     * Path to which all files will be saved in.
     *
     * @var string
     */
    protected $destination = 'uploads/';

    /**
     * Stores a an uploaded file.
     *
     * @param UploadedFile $file
     * @param $name
     * @param $groups
     * @return UploadedFile
     */
    public function store(UploadedFile $file, $name, $groups)
    {
        $type = $file->getClientOriginalExtension();
        $mime = $file->getClientMimeType();

        //Get the name for the file
        $name = $this->sanitizeName($name).'.'.$type;

        $actualName = time(). $name;

        // Set the destination for the uploaded files.

        $path = $this->destination . $actualName;

        // Move the file to the destination.

        if (!$file->move($path)) {
            return false;
        }

        //Persist the files to the database.

        $details = [
            'name' => $name,
            'path' => $path,
            'type' => $type,
            'mime' => $mime
        ];

        $file = $this->persist($details, \Auth::user());

        //Share file with the selected groups.

        if(count($groups) >= 1)
        {
            foreach($groups as $group)
            {
                $this->shareFileToGroup($group, $file);
            }
        }

        return $file;
    }

    /**
     * Deletes a file from the database.
     *
     * @param $file
     */
    public function deleteFile(File $file)
    {
        $file->delete();
    }

    /**
     * Sanitizes the file name.
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

    /**
     * Save the file details to the database.
     *
     * @param array $details
     * @param $model
     * @return mixed
     * @internal param $user
     */
    protected function persist(Array $details, $model)
    {
        return $model->files()->create([
            'name' => $details['name'],
            'path' => $details['path'],
            'type' => $details['type'],
            'mime' => $details['mime']
        ]);
    }

    /**
     * Search a file by its name or its type
     * @param string $key
     * @param string $query
     * @param string $index
     * @param string $type
     * @param string $model
     * @param string $key_one
     * @return mixed
     */
    public function search($key="", $query = "", $index = "", $type = "", $model="", $key_one="")
    {
        return $model::where($key, 'like', "%{$query}%")
            ->orWhere($key_one, 'like', "%{$query}%")
            ->get();
    }

    /**
     *
     * Retrieves all the files
     * @return mixed
     */
    public function all()
    {
        return File::all();
    }
}