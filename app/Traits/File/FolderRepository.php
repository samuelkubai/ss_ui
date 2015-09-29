<?php

namespace App\Traits\File;


use App\Interfaces\File\FolderModelInterface;

trait FolderRepository
{
    /**
     * Creates a new root folder for the user.
     *
     * @param $name
     * @return mixed
     */
    public function createFolder($name)
    {
        $folder = \Auth::user()->personalFolders()->create([
            'name' => $name,
        ]);

        return $folder;
    }

    /**
     * Creates a new sub-folder for the user.
     *
     * @param $folder
     * @param $request
     * @return mixed
     */
    public function createSubFoldersOf(FolderModelInterface $folder, $request)
    {
        $subFolder = $folder->subFolders()->create([
            'name' => $request->name,
            'sub_directory' => 1,
        ]);

        return $subFolder;
    }

    /**
     * Updates a personal folder.
     *
     * @param $folder
     * @param $name
     * @return mixed
     */
    public function updateFolder(FolderModelInterface $folder, $name)
    {
        $folder->name = $name;
        $folder->save();
        return $folder;
    }


    /**
     * Delete a personal folder.
     *
     * @param $folder
     */
    public function deleteFolder(FolderModelInterface $folder)
    {
        $folder->delete();
    }


    /**
     * Retrieves the files for a specific folder.
     *
     * @param $folder
     * @return mixed
     */
    public function filesForFolder(FolderModelInterface $folder)
    {
        return $folder->files()->get();
    }


    /**
     * Retrieves Sub-Folders of a specific folder.
     *
     * @param $folder
     * @return mixed
     */
    public function subFoldersForFolder(FolderModelInterface $folder)
    {
        return $folder->subFolders()->get();
    }

} 