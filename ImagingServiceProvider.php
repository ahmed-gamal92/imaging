<?php

namespace LOOP\Imaging;

use Illuminate\Support\ServiceProvider;
use Intervention\Image\ImageManager;
use LOOP\Imaging\Services\ImageServiceInterface;
use LOOP\Imaging\Services\ImageProcessingServiceInterface;
use LOOP\Imaging\Services\src\ImageProcessingService;
use LOOP\Imaging\Services\Validation\ImageValidatorInterface;
use LOOP\Imaging\Services\Validation\src\ImageValidatorLaravel;

/**
 * Class ImagingServiceProvider
 * @package LOOP\Imaging
 */
class ImagingServiceProvider extends ServiceProvider
{

    private $configPath = '/config/imaging.php';


    /**
     *
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.$this->configPath => config_path('imaging.php'),
        ], 'imaging');
    }


    /**
     *
     */
    public function register()
    {
        // merge default config
        $this->mergeConfigFrom(
            __DIR__.$this->configPath , 'imaging'
        );

        // Bindings.
        $this->bindValidators();
        $this->bindImageProcessor();
        $this->bindImageService();

        // And generators.
        //$this->registerRepositoryGenerator();
    }


    /**
     *
     */
    private function bindImageProcessor()
    {
        // Bind the image processing service.
        $this->app->bind( ImageProcessingServiceInterface::class, function ( $app )
        {
            // create an image manager instance with favored driver
            $config = [
                'driver' => config('imaging.driver', 'gd')
            ];

            $imageManager = new ImageManager( $config );

            return new ImageProcessingService( $imageManager );
        });
    }

    /**
     *
     */
    private function bindValidators()
    {
        // Bind the image service.
        $this->app->bind( ImageValidatorInterface::class, function ( $app )
        {
            $this->app->make( ImageValidatorLaravel::class );
        });
    }

    /**
     *
     */
    private function bindImageService()
    {
        // Bind the image service.
        $this->app->bind( ImageServiceInterface::class, function ( $app )
        {
            $this->app->make( ImageServiceInterface::class );
        });
    }

    /**
     *
     *
    private function registerRepositoryGenerator()
    {
        $this->app->singleton('command.repository', function ($app)
        {
            return $app['LOOP\LaravelRepositories\Commands\MakeRepositoryCommand'];
        });

        $this->commands('command.repository');
    }
     * */


}