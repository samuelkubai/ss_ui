<?php

namespace App\Repos\File;

use App\User;
use App\File;
use App\Group;
use App\Topic;
use App\Traits\Postable;
use App\Traits\File\StoreFile;
use App\Repos\Group\GroupRepository;
use App\Http\Requests\UploadFileRequest;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class FileRepository
{
    use StoreFile, Postable;

    /**
     * @var
     */
    private $groupRepository;

    /**
     * Initialize fileds for the repo.
     *
     * @param GroupRepository $groupRepository
     */
    function __construct(GroupRepository $groupRepository)
    {

        $this->groupRepository = $groupRepository;
    }

    /**
     * Stores a an uploaded file.
     *
     * @param UploadFileRequest $request
     * @param User $user
     * @return UploadedFile
     */
    public function store(UploadFileRequest $request, User $user)
    {
        $group = $this->groupRepository->findGroupWithUsername($request->get('group'));

        if($this->storeFile($request, $user, $group))
        {
            return true;
        }

        return false;
    }


    /**
     *
     * Retrieves all the files for the user's backpack
     * @param User $user
     * @return mixed
     */
    public function getBackpackFilesForUser(User $user)
    {
        return $user->myFiles()
            ->with('user','topic')
            ->latest()
            ->get();
    }

    /**
     *
     * Retrieves all the files for the specific group.
     * @param Group $group
     * @param int $howMany
     * @return mixed
     */
    public function groupFilesForGroup(Group $group, $howMany = 12)
    {
        return $group->files()
            ->with('user','topic')
            ->latest()
            ->get();
    }

    /**
     * Deletes a file from the database.
     *
     * @param $file
     * @return bool
     */
    public function deleteFile(File $file)
    {
        $file->activity()->delete();
        $file->delete();
        return true;
    }

    /**
     * Finds a file by its id.
     *
     * @param $fileId
     * @return mixed
     */
    public function findFileById($fileId)
    {
        return File::find($fileId);
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
     * Retrieves all the topics for the user.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAllTopics()
    {
        return Topic::all();
    }

    /**
     * Returns a list of all the topics used in the backpack.
     *
     * @param User $user
     * @return mixed
     */
    public function getBackpackTopicsForUser(User $user)
    {
        $topicIds = $user->myFiles()
            ->select('topic_id')
            ->distinct()
            ->latest()
            ->get()
            ->toArray();

        return Topic::whereIn('id',$topicIds )
            ->latest()
            ->get();
    }

    /**
     * Returns a collection of all the topics used in the group.
     *
     * @param Group $group
     * @return mixed
     */
    public function getGroupTopicsForGroup(Group $group)
    {
        $topicIds = $group->files()
            ->select('topic_id')
            ->distinct()
            ->latest()
            ->get()
            ->toArray();

        return Topic::whereIn('id',$topicIds )
            ->latest()
            ->get();
    }

    /**
     * Gets the file's profile picture.
     *
     * @param File $file
     * @return mixed|string
     */
    public function getFilePicture(File $file)
    {
        if($file->isDoc())
            return '/ss/icons/word1.png';
        elseif($file->isCompressedFile())
            return 'ss/icons/compressed.png';
        elseif($file->isExcel())
            return 'ss/icons/excel.png';
        elseif($file->isPdf())
            return 'ss/icons/pdf.png';
        elseif($file->isPpt())
            return 'ss/icons/powerpoint1.png';
        else
            return false;
    }
}