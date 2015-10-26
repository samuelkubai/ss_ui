<?php namespace App\Traits\File;


use App\File;
use App\Group;
use App\Http\Requests\UploadFileRequest;
use App\Source;
use App\Topic;
use App\Traits\GroupMailerTrait;
use App\Traits\Postable;
use App\User;
use App\Interfaces\File\FileModelInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

trait StoreFile {
    use GroupMailerTrait;
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
            if($this->authenticateType($file->getClientOriginalExtension()))
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
                $this->linkToSource($savedFile);

                if($group)
                {
                    $this->shareFileToGroup($group, $savedFile, $user);
                }
            }
            else {
                return false;
            }
        }

        return true;
    }

    /**
     * Adds a file to  the user's backpack.
     *
     * @param User $user
     * @param File $file
     * @return File
     */
    public function addFileToBackpackForUser(User $user, File $file)
    {
        if($user->inMyBackPack($file))
            return false;

        $savedFile = $user->myFiles()->create([
            'name' => $file->name(),
            'type' => $file->type(),
            'path' => $file->path(),
            'mime' => $file->mime(),
            'topic_id' => $file->topic->id,
            'user_id' => $file->user->id
        ]);

         $this->linkToSource($savedFile, isset($file->source->id)?$file->source->id:null);

        return true;
    }

    /**
     * Share the file to a group.
     *
     * @param Group $group
     * @param File $file
     * @param User $user
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function shareFileToGroup(Group $group, File $file, User $user)
    {
        if($group->hasFile($file))
            return false;

        $savedFile = $group->files()->create([
            'name' => $file->name(),
            'type' => $file->type(),
            'path' => $file->path(),
            'mime' => $file->mime(),
            'topic_id' => $file->topic->id,
            'user_id' => $file->user->id
        ]);

        $groupFile = $this->linkToSource($savedFile, $file->source->id);
        $this->post($groupFile, 'add_file', $group, $user);

        $this->sendFileUploadNotification($groupFile, $group);

        return $groupFile;
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
     * Links the file to the source.
     *
     * @param $sourceID
     * @param File $file
     * @return File
     */
    protected function linkToSource(File $file, $sourceID = null)
    {
        if(!$sourceID) {
            $source = Source::create([
                'file_id' => $file->id,
            ]);

            $file->update([
                'source_id' => $source->id,
            ]);
        } else {

            $file->update([
                'source_id' => $sourceID,
            ]);
        }

        return $file;
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

    /**
     * Authenticate the file types.
     *
     * @param $itemType
     * @return bool
     */
    protected function authenticateType($itemType)
    {
        foreach(File::$allowedTypes as $type)
        {
            if((strtolower($itemType) == strtolower($type)))
                return true;
        }
        return false;

    }
} 