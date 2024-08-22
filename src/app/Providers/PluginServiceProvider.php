<?php

declare(strict_types=1);

namespace WordpressPluginTemplate\App\Providers;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Roots\WPConfig\Config;
use Symfony\Component\HttpFoundation\Response;

use function Roots\bundle;
use function Roots\view;

class PluginServiceProvider extends ServiceProvider
{
    public static function uninstallRoutine(): void
    {
        Schema::drop('yourplugin_migrations');
    }

    public function register(): void
    {
        Factory::guessFactoryNamesUsing(function ($class) {
            return 'WordpressPluginTemplate\\Database\\Factories\\'.class_basename($class).'Factory';
        });

        $this->registerShortcode();
        $this->registerHooks();
        $this->buildAdminControlPanel();
    }

    public function registerShortcode(): void
    {
        add_shortcode('yourplugin_shortcode', function () {
            bundle('app')->enqueueCss();

            return view('shortcodes.plugin');
        });
    }

    public function registerHooks(): void
    {
        register_activation_hook(Config::get('YOUR_PLUGIN_FILE'), [$this, 'activationRoutine']);
        register_uninstall_hook(Config::get('YOUR_PLUGIN_FILE'), [PluginServiceProvider::class, 'uninstallRoutine']);

        add_action('init', [$this, 'pluginInitiated']);
    }

    public function pluginInitiated(): void
    {
        //
    }

    public function activationRoutine(): void
    {
        Artisan::call('migrate', ['--force' => true]);
        Log::debug(Artisan::output());
    }

    public function buildAdminControlPanel(): void
    {
        add_action('admin_menu', function () {
            add_menu_page(
                'Your Plugin Settings',
                'Your Plugin',
                'manage_options',
                'your-plugin',
                [$this, 'renderAdminControlPanel']);
        });
    }

    public function renderAdminControlPanel(): Response
    {
        return response()->view('admin.settings')->send();
    }
}
