<?php

namespace WordpressPluginTemplate\App\Providers;

use Illuminate\Support\ServiceProvider;

class PluginServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        dd('test');
        $this->registerShortcode();
    }

    public function registerShortcode()
    {
        add_shortcode('yourplugin_shortcode', function () {
            return view('shortcodes.plugin');
        });
    }
}
