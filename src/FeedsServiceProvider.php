<?php namespace Dimimo\Feeds;

use Illuminate\Support\ServiceProvider;
use RunTimeException;

class FeedsServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected bool $defer = true;

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/config/feeds.php' => config_path('feeds.php'),
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(FeedsFactory::class, function () {
            $config = config('feeds');

            if (! $config) {
                throw new RunTimeException('Feeds configuration not found. Please run `php artisan vendor:publish`');
            }

            return new FeedsFactory($config);
        });
        $this->app->alias(FeedsFactory::class, 'Feeds');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return ['Feeds'];
    }
}
