<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
	/**
	 * Bootstrap the application services.
	 * @return void
	 */
	public function boot()
	{
		//
	}
	
	/**
	 * Register the application services.
	 * @return void
	 */
	public function register()
	{
		$this->app->bind('App\Repositorys\Interfaces\ArticleInterface', 'App\Repositorys\Implement\ArticleService');
		$this->app->bind('App\Repositorys\Interfaces\LabelInterface', 'App\Repositorys\Implement\LabelService');
		$this->app->bind('App\Repositorys\Interfaces\MarkDownInterface', 'App\Repositorys\Implement\MarkDownService');
		$this->app->bind('App\Repositorys\Interfaces\CommentInterface', 'App\Repositorys\Implement\CommentService');
	}
}
