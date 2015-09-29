<?php

namespace App\Interfaces\File;


interface FolderModelInterface {

    /**
     * Gets the user the folders belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user();


    /**
     * Gets all the files that belong to this folder.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function files();


    /**
     * Get the Sub Folders that belong to the folder.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subFolders();


    /**
     * Get the root folder that the file belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rootFolder();
} 