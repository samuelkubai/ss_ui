<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Interfaces\File\FolderModelInterface;

class PersonalFolder extends Model implements FolderModelInterface
{
    /**
     * Lists out the fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['name', 'user_id', 'sub_directory', 'personal_folder_id'];


    /**
     * Gets the user the folders belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }


    /**
     * Gets all the files that belong to this folder.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function files()
    {
        return $this->hasMany('App\PersonalFile');
    }


    /**
     * Get the Sub Folders that belong to the folder.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subFolders()
    {
        return $this->hasMany('App\PersonalFolder');
    }


    /**
     * Get the root folder that the file belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rootFolder()
    {
        return $this->belongsTo('App\PersonalFolder');
    }
}
