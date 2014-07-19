<?php namespace Craigzearfoss\ThwordUtil;

use Illuminate\Support\ServiceProvider;

class ThwordUtilServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('craigzearfoss/thword-util');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        $this->app->booting(function()
        {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('ThwordUtil', 'Craigzearfoss\ThwordUtil\Facades\ThwordUtil');
        });

        $this->app['thword-util'] = $this->app->share(function($app)
        {
            return new ThwordUtil;
        });
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('thword-util');
	}

}
