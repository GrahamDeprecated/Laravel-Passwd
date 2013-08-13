<?php namespace GrahamCampbell\Passwd;

use Illuminate\Support\ServiceProvider;

class PasswdServiceProvider extends ServiceProvider {

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
	public function boot() {
		$this->package('graham-campbell/passwd');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register() {
		$this->app['passwd'] = $this->app->share(function($app) {
            return new GrahamCampbell\Passwd\Classes\Passwd;
        });
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides() {
		return array();
	}
}
