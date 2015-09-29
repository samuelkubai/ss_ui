<?php

namespace App;


use App\Interfaces\File\FileModelInterface;

class GroupFile extends FileParent implements FileModelInterface
{
    /**
     * Lists the fields that can be mass assigned.
     *
     * @var array
     */
    protected  $fillable = ['name', 'group_folder_id', 'file_id'];

    /**
     * Links  to the folder the file belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function folder()
    {
        return $this->belongsTo('App\GroupFolder');
    }
}
