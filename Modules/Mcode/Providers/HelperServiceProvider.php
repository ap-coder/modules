<?php

namespace Modules\Mcode\Providers;

use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
 
        foreach ('Modules/Mcode/Helpers/*.php') as $filename){
            require_once($filename);
        }
 
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
