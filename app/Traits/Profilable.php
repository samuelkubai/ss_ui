<?php
/**
 * Created by PhpStorm.
 * User: wizxs
 * Date: 10/7/2015
 * Time: 3:40 PM
 */

namespace App\Traits;


use Symfony\Component\HttpFoundation\File\UploadedFile;

trait Profilable
{
    /**
     * The path to store the profile pictures of the model.
     *
     * @var string
     */
    protected $path = 'ss/profPics/';

    /**
     * Updated the model's profile picture.
     *
     * @param $model
     * @param UploadedFile $file
     */
    public function saveProfilePicture($model, UploadedFile $file)
    {
        //Save the document.
        if($file->move($this->path, $file->getClientOriginalName()))
        {
            //Persist the record
            if($model->profilePicture()->first())
            {
                $model->profilePicture()->update([
                    'path' => $this->path. $file->getClientOriginalName(),
                ]);
            }else{
                $model->profilePicture()->create([
                    'path' => $this->path. $file->getClientOriginalName(),
                ]);
            }
        }



        return $model;
    }
}