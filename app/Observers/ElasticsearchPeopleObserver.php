<?php namespace App\Observers;

use App\People;

use Elasticsearch\Client;

/**
 * THE OBSERVER FOR THE PEOPLE MODEL FOR ELASTICSEARCH
 * Class ElasticsearchPeopleObserver
 * @package App\Observers
 */
class ElasticsearchPeopleObserver{
    /**
     *  This instance of the elasticsearch client
     * @var \Elasticsearch\Client
     *
     */
    private $elasticsearch;

    /**
     * Initialize objects for this class
     *
     * @param Client $elasticsearch
     */

    public function __construct(Client $elasticsearch)
    {
        $this->elasticsearch = $elasticsearch;
    }

    /**
     * Observes the People model for inserts
     * @param People $person
     */

    public function created(People $person)
    {
        $this->elasticsearch->index([
            'index' => 'people',
            'type' => 'persons',
            'body' => [


                'id'   => $person->id,
                'name' => $person->name,
                'age' => $person->age,
                'sex' => $person->sex,

            ]
        ]);
    }

    /**
     * Observes the People model for updates
     * @param People $person
     */

     public function updated(People $person)
      {
          $this->elasticsearch->index([
              'index' => 'people',
              'type' => 'persons',
              'body' => [

                  'id'   => $person->id,
                  'name' => $person->name,
                  'age' => $person->age,
                  'sex' => $person->sex,

              ]
          ]);
      }

      /**
       * Observes the People model for deletes
       * @param People $person
       */

    public function deleted(People $person)
     {
         $this->elasticsearch->delete([
             'index' => 'people',
             'type' => 'persons',
             'id' => $person->id
         ]);
     }
}
