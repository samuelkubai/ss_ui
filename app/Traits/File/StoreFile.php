<?php namespace App\Traits\File;


use App\File;
use App\Group;
use App\Http\Requests\UploadFileRequest;
use App\Topic;
use App\Traits\Postable;
use App\User;
use App\Interfaces\File\FileModelInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

trait StoreFile {

    /**
     * Contains the path to the directory where the uploaded files are stored.
     *
     * @var string
     */
    public $storagePath = 'uploads/';


    /**
     * Stores the new file to the database.
     *
     * @param UploadFileRequest $request
     * @param $user
     * @param Group $group
     * @return mixed
     */
    protected function storeFile(UploadFileRequest $request, $user, Group $group = null)
    {
        $files = $request->file('files');

        foreach($files as $file)
        {
            $type = $file->getClientOriginalExtension();

            $name = $file->getClientOriginalName();

            $mime = $file->getClientMimeType();

            $actualName = time(). $name;

            $path = $this->storagePath;

            $file->move($path, $actualName);

            $details = [
                'name' => $name,
                'type' => $type,
                'path' => $path. $actualName,
                'mime' => $mime,
            ];

            $savedFile = $this->persist($details, $user, $request->topic);

            if($group)
            {
                $groupFile = $this->shareFileToGroup($group, $savedFile);
                $this->post($groupFile, 'add_file', $group, $user);
            }

        }

        return true;
    }

    /**
     * Share the file to a group.
     *
     * @param Group $group
     * @param File $file
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function shareFileToGroup(Group $group, File $file)
    {
        $savedFile = $group->files()->create([
            'name' => $file->name(),
            'type' => $file->type(),
            'path' => $file->path(),
            'mime' => $file->mime(),
            'topic_id' => $file->topic->id,
            'user_id' => $file->user->id
        ]);

        return $savedFile;
    }

    /**
     * Storing the information about the file to the database.
     *
     * @param array $details
     * @param User $user
     * @return \Illuminate\Database\Eloquent\Model
     */
    protected function persist(Array $details, User $user, $topicName)
    {
        $topic = $this->findOrCreateTopic($topicName, $user);

        $file = $user->myFiles()->create([
            'name' => $details['name'],
            'path' => $details['path'],
            'type' => $details['type'],
            'mime' => $details['mime'],
            'topic_id' => $topic->id,
            'user_id' => $user->id
        ]);

        return $file;
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

    /**
     * Finds or creates a topic.
     *
     * @param $topicName
     * @param User $user
     * @return static
     */
    protected function findOrCreateTopic($topicName, User $user)
    {
        $name = ucfirst($topicName);

        $topic = Topic::where('name', $name)->first();

        if($topic == null)
        {
            return Topic::create([
                'name' => $name,
                'user_id' => $user->id
            ]);
        }

        return $topic;
    }
} 