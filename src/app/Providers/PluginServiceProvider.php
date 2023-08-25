<?php

namespace WordpressPluginTemplate\App\Providers;

use Illuminate\Support\ServiceProvider;
use function Roots\view;

class PluginServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->registerShortcode();
    }

    public function registerShortcode(): void
    {
        add_shortcode('yourplugin_shortcode', function () {
            return view('shortcodes.plugin');
        });
    }
}
