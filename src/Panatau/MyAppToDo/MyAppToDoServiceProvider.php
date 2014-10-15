<?php namespace Panatau\MyAppToDo;

use Illuminate\Support\Facades\Config;
use Panatau\MyAppToDo\Storage\AppTodoRepository;
use Illuminate\Support\ServiceProvider;

class MyAppToDoServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

    public function boot()
    {
        $this->package('panatau/my-app-to-do');
//        dd(\Config::get('my-app-to-do::include_my_route'));
        if(\Config::get('my-app-to-do::include-my-route'))
        {
            include __DIR__ . '/../../routes.php';
        }
    }

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		// AppTodoInterface kepada AppTodoRepository
        $this->app->bind('Panatau\MyAppToDo\Storage\AppTodoInterface', function($app)
        {
            return new AppTodoRepository();
        });

	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
