<?php

namespace Shaon\ServiceProvider;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;

class MapBoxServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('map-box', function () {
            return new \Shaon\MapBox(); // Replace with your actual instantiation logic.
        });
    }

    public function boot()
    {
        $sourceFilePath = __DIR__.'/../config/mapbox.php';
        $destinationFilePath = base_path('config/mapbox.php');
        if ( is_readable($sourceFilePath) ){
            echo "running on runningInConsole.";
            Log::info("running on runningInConsole.");
        }

        if ( is_readable($sourceFilePath) ){
            echo "File can be copied.";
            Log::info(''.$sourceFilePath);
        }
        // if (is_readable($sourceFilePath) && is_writable($destinationDirectory)) {
        //     echo "File can be copied.";
        //     // Perform the file copy operation here
        // } else {
        //     echo "File cannot be copied due to permission issues.";
        // }

        // Publish the configuration file during package boot
        Log::debug('Boot $this->app->runningInConsole() '.$this->app->runningInConsole() . ' Debugging the boot method.');
        
        if ($this->app->runningInConsole()) {
            Log::info("running on runningInConsole.");
        } else {
            Log::info("running not on runningInConsole.");
        }

        if(!File::exists(config_path('mapbox.php'))){
            $this->publishes([
                $sourceFilePath => $destinationFilePath,
            ], 'laravel-assets');
    
            $this->publishes([
                $sourceFilePath => $destinationFilePath,
            ], 'config');
        }
        
        

        if(!File::exists(config_path('mapbox.php'))){
            echo "Failed to publish the file config/mapbox.php. Manually publish.";
            Log::debug("Failed to publish the file config/mapbox.php. Manually publish.");
        }
        


        // if (copy($sourceFilePath, $destinationFilePath)) {
        //     echo "File copied successfully.";
        // } else {
        //     echo "Failed to copy the file.";
        // }
    }
}
