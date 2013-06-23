<?php namespace Magniloquent\Magniloquent;

use Illuminate\Support\ServiceProvider;

class MagniloquentServiceProvider extends ServiceProvider {

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
    $this->package('magniloquent/magniloquent');
  }

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
  public function register()
  {
    $this->app['magniloquent'] = $this->app->share(function($app)
    {
      return new Magniloquent;
    });
    $this->app->booting(function()
    {
      $loader = \Illuminate\Foundation\AliasLoader::getInstance();
      $loader->alias('Magniloquent', 'Magniloquent\Magniloquent\Facades\Magniloquent');
    });
  }

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('magniloquent');
	}

}