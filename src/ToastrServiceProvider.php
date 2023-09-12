<?php

namespace Vironeer\Toastr;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class ToastrServiceProvider extends ServiceProvider
{
    /**
     * Register the package's services.
     *
     * @return void
     */
    public function register()
    {
        // Merge the package's configuration
        $this->mergeConfigFrom(__DIR__ . '/../config/toastr.php', 'toastr');

        // Register the 'toastr' service in the container
        $this->app->singleton('toastr', function ($app) {
            return new Toastr();
        });

        // Register Blade directives
        $this->registerBladeDirectives();
    }

    /**
     * Bootstrap the package's resources.
     *
     * @return void
     */
    public function boot()
    {
        // Publish the package's configuration file
        $this->publishes([
            __DIR__ . '/../config/toastr.php' => config_path('toastr.php'),
        ], 'config');

        // Publish the package's assets (CSS and JS)
        $this->publishes([
            __DIR__ . '/../dist/css' => public_path('vendor/toastr/css'),
            __DIR__ . '/../dist/js' => public_path('vendor/toastr/js'),
        ], 'toastr-assets');
    }

    /**
     * Register Blade directives for Toastr.
     *
     * @return void
     */
    public function registerBladeDirectives()
    {
        // Blade directive for including Toastr styles
        Blade::directive('toastrStyles', function ($version) {
            return "<?php echo app('toastr')->styles($version); ?>";
        });

        // Blade directive for including Toastr scripts
        Blade::directive('toastrScripts', function ($version) {
            return "<?php echo app('toastr')->scripts($version); ?>";
        });

        // Blade directive for rendering Toastr notifications
        Blade::directive('toastrRender', function () {
            return "<?php echo app('toastr')->render(); ?>";
        });
    }
}
