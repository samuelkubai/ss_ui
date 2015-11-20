<?php

namespace App;

use App\Interfaces\PostableInterface;
use Illuminate\Database\Eloquent\Model;

class File extends Model Implements PostableInterface
{
    /**
     * List the fields that can be mass assigned.
     * @var array
     */
    protected $fillable = ['name', 'path', 'type', 'mime', 'topic_id','user_id', 'source_id'];

    /**
     * Gets the source of the file.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function source()
    {
        return $this->belongsTo('App\Source');
    }

    /**
     * Return the appropriate picture
     *
     * @return string
     */
    public function picture()
    {
        return 'ss/icons/excel.png';
    }
    /**
     * Links to the object's activity.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function activity()
    {
        return $this->morphMany('App\Activity', 'subject');
    }

    /**
     * Links to the user that created the document.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get all of the owning documentable models.
     */
    public function documentable()
    {
        return $this->morphTo();
    }

    /**
     * Gets the topic of the file.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function topic()
    {
        return $this->belongsTo('App\Topic');
    }

    /**
     * Returns the path to the file.
     *
     * @return mixed
     */
    public function path()
    {
        return $this->path;
    }

    /**
     * Returns the type(extension) of the file.
     *
     * @return mixed
     */
    public function type()
    {
        return $this->type;
    }

    /**
     * Gets the name for the file.
     *
     * @return mixed
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * Gets the mime of the file.
     *
     * @return mixed
     */
    public function mime()
    {
        return $this->mime;
    }
    /**
     * Lists the extensions for image types.
     *
     * @var array
     */
    protected $imageTypes = ['png', 'jpg', 'jpeg', 'jpe'];

    /**
     * Lists the extensions for image types.
     *
     * @var array
     */
    protected $compressedTypes = [ 'zip', 'tar', 'rar', '7z', 'iso' ];

    /**
     * Lists the extensions for image types.
     *
     * @var array
     */
    protected $excelTypes = ['xls', 'xlsm', 'xlsx', 'xlsb', 'xlt'];

    /**
     * Lists the extensions for image types.
     *
     * @var array
     */
    protected $pptTypes = ['ppt','pptx','pptm','pot','potx'];

    /**
     * Check if file is a powerpoint document.
     *
     * @return bool
     */
    public function isPpt()
    {
        foreach ($this->pptTypes as $type) {
            if($this->type == $type)
                return true;
        }

        return false;
    }
    /**
     * Check if file is a pdf document.
     *
     * @return bool
     */
    public function isPdf()
    {
        if($this->type == 'pdf')
            return true;
        return false;
    }
    /**
     * Check if file is a word document.
     *
     * @return bool
     */
    public function isDoc()
    {
        if($this->type == 'doc' || $this->type == 'docx')
            return true;
        return false;
    }

    /**
     * Check if file is a compressed file.
     *
     * @return bool
     */
    public function isCompressedFile()
    {
        foreach ($this->compressedTypes as $type) {
            if($this->type == $type)
                return true;
        }

        return false;
    }

    /**
     * Check if file is a excel document.
     *
     * @return bool
     */
    public function isExcel()
    {
        foreach ($this->excelTypes as $type) {
            if($this->type == $type)
                return true;
        }

        return false;
    }

    /**
     * Check if file is an image.
     *
     * @return bool
     */
    public function isImage()
    {
        foreach ($this->imageTypes as $type) {
            if($this->type == $type)
                return true;
        }

        return false;
    }

    /**
     * Checks if file is a text file.
     *
     * @return bool
     */
    public function isText()
    {
        if($this->type == 'txt')
        {
            return true;
        }
        return false;
    }

    /**
     * List of allowed types.
     *
     * @var array
     */
    static public $allowedTypes = [
        'txt', 'pdf', 'docx', 'jpg', 'png', 'jpeg', 'jpe', 'ppt','pptx','pptm','pot','potx', 'doc',
        'zip', 'tar', 'rar', '7z', 'iso','xls', 'xlsm', 'xlsx', 'xlsb', 'xlt',
    ];


}
