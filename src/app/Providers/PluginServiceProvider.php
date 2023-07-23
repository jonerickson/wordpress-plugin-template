<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PluginServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->setupMigrations();
        $this->registerShortcode();
    }

    public function setupMigrations()
    {

    }

    public function registerShortcode()
    {
        add_shortcode('yourplugin_shortcode', function () {
            return view('shortcodes.plugin');
        });
    }
}
