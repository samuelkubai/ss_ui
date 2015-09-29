<?php namespace App\Observers;

use App\File;

//use Elasticsearch\Client;

/**THIS CLASS OBSERVES CHANGES IN THE FILE MODEL AND REGISTERS THEM IN ELASTICSEARCH
 * Class ElasticsearchFileObserver
 * @package App\Observers
 */
class ElasticsearchFileObserver{
    /**
     *  This instance of the elasticsearch client
     *
     */
    private $elasticsearch;

    /**
     * Initialize objects for this class
     *
     * @param Client $elasticsearch
     */
/*
    public function __construct(Client $elasticsearch)
    {
        $this->elasticsearch = $elasticsearch;
    }
*/

    /**
     * Observes the File model for inserts and replicates in elastic search
     * @param File $file
     */

    public function created(File $file)
    {
        $this->elasticsearch->index([
            'index' => 'file',
            'type' => 'files',
            'body' => [

                'id'   => $file->id,
                'name' => $file->name,
                'path' => $file->path,
                'type' => $file->type,
        ]
      ]);
    }

    /**
     * Observes the File model for updates and replicates
     * the changes in elasticsearch
     * @param File $file
     */

    public function updated(File $file)
    {
        $this->elasticsearch->index([
            'index' => 'file',
            'type' => 'files',
            'body' => [

                'id'   => $file->id,
                'name' => $file->name,
                'path' => $file->path,
                'type' => $file->type,
            ]
        ]);
    }

    /**
     * Observes the File model for deletes
     * and removes also in elastic search
     * @param File $file
     */

    public function deleted(File $file)
    {
        $this->elasticsearch->delete([
            'index' => 'file',
            'type' => 'files',
            'id' => $file->id
        ]);
    }
}
