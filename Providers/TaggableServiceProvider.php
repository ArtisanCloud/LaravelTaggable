<?php

namespace ArtisanCloud\Taggable\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\TaggableService\Contracts\TaggableServiceContract;


/**
 * Class TaggableServiceProvider
 * @package App\Providers
 */
class TaggableServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            // publish config file

            // register artisan command
            if (!class_exists('CreateTaggableTable')) {
                $this->publishes([
                    __DIR__ . '/../database/migrations/create_tag_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_tag_table.php'),
                    // you can add any number of migrations here
                ], ['ArtisanCloud', 'Taggable-Migration']);
            }
        }
    }
}
