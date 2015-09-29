<?php namespace App\Providers;

use App\Repos\Search\ElasticSearchRepository;
use App\Repos\File\FileRepository;
use App\Interfaces\Search\SearchInterface;
use App\Repos\Search\SearchRepository;
use Elasticsearch\Client;
use Illuminate\Support\ServiceProvider;

/**
 * THIS CLASS REGISTERS THE ELASTICSEARCH DECORATOR REPO OF THE ELOQUENT REPO
 * Class RepositoriesServiceProvider
 * @package App\Providers
 */
class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register the  decorated search Repository as an elasticsearch Repository
     */
    public function register()
    {
        $this->app->bindShared(SearchInterface::class, function($app)
        {
            return new ElasticSearchRepository(
                new Client,
                new SearchRepository()
            );
        });
    }
}