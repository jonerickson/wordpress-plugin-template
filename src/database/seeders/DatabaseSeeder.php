<?php

declare(strict_types=1);

namespace WordpressPluginTemplate\Database\Seeders;

use Illuminate\Database\Seeder;
use WordpressPluginTemplate\App\Models\PluginModel;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        PluginModel::factory()->count(10)->create();
    }
}
