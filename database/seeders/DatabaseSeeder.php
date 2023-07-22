<?php

use App\Models\PluginModel;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        PluginModel::factory()->count(10)->create();
    }
}
