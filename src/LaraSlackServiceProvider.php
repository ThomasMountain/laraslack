<?php

namespace DataDev\LaraSlack;

class LaraSlackServiceProvider extends \Illuminate\Support\ServiceProvider {

	public function register(){

	}


	public function boot(){
		$this->mergeConfigFrom(
			__DIR__.'/config/slack.php', 'slack'
		);

		$this->app->singleton(LaraSlack::class, function () {
            return new LaraSlack();
        });
        $this->app->alias(LaraSlack::class, 'laraslack');
	
	}



}
