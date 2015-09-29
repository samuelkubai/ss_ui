<?php

namespace App;

use App\Interfaces\File\FileModelInterface;

class PersonalFile extends FileParent implements FileModelInterface
{
    /**
     * List fields that can be mass assigned for the personal_files table.
     * @var array
     */
    protected $fillable = ['name', 'personal_folder_id', 'file_id'];


    /**
     * Links  to the folder the file belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function folder()
    {
        return $this->belongsTo('App\PersonalFolder');
    }
}
