<?php namespace App\Interfaces\Search;

/**
 * AN ABSTRACTION OF THE SEARCH AND FILTERING FUNCTIONALITY FOR SKOOLSPACE APP
 * Interface SearchInterface
 * @package App\Interfaces\Search
 *
 *
 */

interface SearchInterface{

    /**
     * Abstracts the searching and filtering functionality
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

/***
 * Abstracts the retrieval of all records
 * @param string $model
 * @param string $query
 * @param string $key
 * @param string $index
 * @param string $type
 * @return mixed
 */
    public function all($model="", $query = "", $key="", $index="", $type="");

}