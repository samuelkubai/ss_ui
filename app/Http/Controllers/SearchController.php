<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Interfaces\Search\SearchInterface;

use App\Repos\Search\SearchRepository;


class SearchController extends Controller
{
    /**
     * @var
     */
    private $repo;


    private $eloquentSearch;

    /**
     * @param SearchInterface $repository
     * @param SearchRepository $eloquent
     */

    public function __construct(SearchInterface $repository, SearchRepository $eloquent)
   {
       $this->repo = $repository;
       $this->eloquentSearch = $eloquent;
   }

    /**
     *Method for searching a file both in mysql and elasticsearch
     * @return \Illuminate\View\View
     *
     * $key->The field to be matched in an sql database
     * $query->The search phrase to be matched with data in the database and in elasticsearch
     * $index->The index in elastic search to be searched (currently set to search the file index)
     * $type->The type in elastic search to be searched
     * $model->The eloquent model to whom a search result collection will be returned to
     * $key_one->An optional extra field used for searching sql databases
     *
     */

    public function searchFile()
    {
        //The search phrase from a get request
        $query = $_GET['q'];

        //Uses Elastic search as default
        //If it fails then use sql search
        $results = $this->repo->search($key ="", $query, $index = "file", $type = "files", $model ="File", $key_one = "");

        if(!$results)
        {
            $results = $this->eloquentSearch->search($key ="name", $query, $index = "", $type = "", $model ="File", $key_one = "type");
        }

        return view('search', compact('results'));
    }

    /**
     *Method for searching people both in mysql and elasticsearch
     * @return \Illuminate\View\View
     *
     * $key->The field to be matched in an sql database
     * $query->The search phrase to be matched with data in the database and in elasticsearch
     * $index->The index in elastic search to be searched (currentl set to search the people index in elasticsearch)
     * $type->The type in elastic search to be searched
     * $model->The eloquent model to whom a search result collection will be returned to
     * $key_one->An optional extra field used for searching sql databases
     *
     */
    public function searchPeople()
    {
        //The search phrase from a get request
        $query = $_GET['q'];
        //Uses elasticsearch as default
        //if it fails use elastic search
        $results = $this->repo->search($key ="name", $query, $index = "people", $type = "persons", $model ="People", $key_one = "age");

        if(!$results)
        {
            $results = $this->eloquentSearch->search($key ="name", $query, $index = "", $type = "", $model ="People", $key_one = "age");

        }

        return view('search', compact('results'));
    }

    /**
     * Searches all people using elasticsearch and sql
     * @return \Illuminate\View\View
     *
     *
     */

    public function searchAllPeople()
    {
        $results = $this->repo->all($model="People", $query = "_search", $key="", $index="people", $type="persons");

        if(!$results)
        {
            $results = $this->eloquentSearch->all($model="People", $query = "", $key="", $index="", $type="");
        }

        return view('search', compact('results'));
    }

    /**
     * This method searches all files using both elastic search and sql
     * @return \Illuminate\View\View
     *
     */

    public function searchAllFiles()
    {
        $results = $this->repo->all($model="File", $query = "_search", $key="", $index="file", $type="files");

        //Uses elasticsearch as default search engine
        //Returns to sql incase of a failure
        if(!$results)
        {
            $results = $this->eloquentSearch->all($model="File", $query = "_search", $key="", $index="file", $type="files");
        }

        return view('search', compact('results'));
    }
}
