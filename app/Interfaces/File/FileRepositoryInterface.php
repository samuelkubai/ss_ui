<?php

namespace App\Interfaces\File;

use Illuminate\Support\Collection;


interface FileRepositoryInterface
{

    /**
     * Implements searching and filtering of files
     * @param $key
     * @param string $query
     * @param string $index
     * @param string $type
     * @param string $model
     * @param string $key_one
     * @return mixed
     *
     */
    public function search($key = "", $query = "", $index = "", $type ="", $model="", $key_one ="");

    /**
     * Returns all the files
     * @return Collection
     */
    public function all();


} 