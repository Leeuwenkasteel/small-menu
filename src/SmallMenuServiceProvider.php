<?php
namespace Leeuwenkasteel\SmallMenu;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Schema;
use Leeuwenkasteel\SmallMenu\Console\Menu;

class SmallMenuServiceProvider extends ServiceProvider
{
    public function boot(){
        Schema::defaultStringLength(255);
		
    	$this->loadRoutesFrom(__DIR__.'/routes/web.php');
    	$this->loadViewsFrom(__DIR__.'/resources/views', 'menu');
    	$this->loadTranslationsFrom(__DIR__.'/resources/lang', 'menu');
		
		$this->publishes([__DIR__.'/database/migrations' => database_path('migrations')], 'menu_migrations');
        $this->publishes([__DIR__.'/database/seeders' => database_path('seeders')], 'menu_seeders');
		

        if ($this->app->runningInConsole()) {
              $this->commands([
                Menu::class,
              ]);
          }
    }

    public function register(){
        
    }
}