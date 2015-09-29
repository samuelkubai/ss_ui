<?php namespace App\Repos\Search;

use Illuminate\Support\Collection;


use App\Interfaces\Search\SearchInterface;

/**
 * THE MAIN ELASTICSEARCH REPOSITORY
 * Class ElasticSearchRepository
 * @package App\Repos\Search
 */
class ElasticSearchRepository implements SearchInterface
{

    private $elasticsearch;

    /**
     * @param Client $client
     *
     */
    /*
    public function __construct(Client $client)
    {
        $this->elasticsearch = $client;

    }
    */

    /**
     * Elastic search search method
     * @param string $query
     * @param string $key
     * @param string $index
     * @param string $type
     * @param string $model
     * @param string $key_one
     *@return Collection|mixed
     */
    public function search($key = "", $query = "", $index = "", $type = "", $model ="", $key_one = "")
    {
        $items = $this->searchOnElasticsearch($query, $key, $index, $type);

        return $this->buildCollection($items, 'App\\'.$model);
    }

    /**
     * Retrieves all records
     * @param $model
     * @param string $query
     * @param string $key
     * @param string $index
     * @param string $type
     * @return Collection
     */
    public function all($model="", $query = "", $key="", $index="", $type="")
    {
        $items = $this->searchOnElasticsearch($query, $key, $index, $type);

        return $this->buildCollection($items, 'App\\'.$model);


    }

    /**
     * Method performs actual search on elastic search
     * @param $query
     * @param $key
     * @param $index
     * @param $type
     * @return array
     */
    private function searchOnElasticsearch($query="", $key="", $index="", $type="")
    {
        if($query != '_search')
        {
        //This code performs full text search on all the fields
        $items = $this->elasticsearch->search([
            'index' => $index,
            'type' => $type,
            'body' => [
                'query' => [
                    'query_string' => [
                        'query' => $query
                    ]
                ]
            ]
        ]);
        }
        else
        {
          //This code retrieves all documents in a particular file
            $items = $this->elasticsearch->search([
                'index' => $index,
                'type' => $type,
                'body' => [
                    'query' => [
                        'match_all' => []
                    ]
                ]
            ]);
        }


        return $items;


    }

    /**
     * Build fields from the elastic search results
     * @param array $items the elasticsearch result
     * @param string $model
     * @return Collection of Eloquent models
     */
    private function buildCollection($items, $model)
    {
        $result = $items['hits']['hits'];

        return Collection::make(array_map(function($r) use($model) {
            $model = new $model;
            $model->newInstance($r['_source'], true);
            $model->setRawAttributes($r['_source'], true);
            return $model;
        }, $result));
    }

}