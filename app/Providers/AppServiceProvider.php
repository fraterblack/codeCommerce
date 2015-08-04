<?php namespace CodeCommerce\Providers;

use Illuminate\Support\ServiceProvider;
use PHPSC\PagSeguro\Purchases\Transactions\Locator;

class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register any application services.
	 *
	 * This service provider is a great spot to register your various container
	 * bindings with the application.
	 *
	 * @return void
	 */
	public function register()
	{
        $this->app->bind('Locator', function () {
            return new Locator($this->app->make('PHPSC\PagSeguro\Credentials'));
        });
	}

}
