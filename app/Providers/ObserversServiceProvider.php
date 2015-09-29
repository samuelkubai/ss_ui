<?php namespace App\Providers;

use App\Observers\ElasticsearchFileObserver;

use App\People;

use App\File;

use Elasticsearch\Client;

use Illuminate\Support\ServiceProvider;

use App\Observers\ElasticsearchPeopleObserver;

/**
 * REGISTRATION OF THE ELASTICSEARCH OBSERVER CLASSES
 * Class ObserversServiceProvider
 * @package App\Providers
 */
class ObserversServiceProvider extends ServiceProvider
{
    //Add a new model to be observed below
    public function boot()
    {
        People::observe($this->app->make(ElasticsearchPeopleObserver::class));
        File::observe($this->app->make(ElasticsearchFileObserver::class));
    }
    //Rgister an observer also below
    public function register()
    {
        $this->app->bindShared(ElasticsearchPeopleObserver::class, function()
        {
            return new ElasticsearchPeopleObserver(new Client());
        });

        $this->app->bindShared(ElasticsearchFileObserver::class, function()
        {
            return new ElasticsearchFileObserver(new Client());
        });
    }
}

