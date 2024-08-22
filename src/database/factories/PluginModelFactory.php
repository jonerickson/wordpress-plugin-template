<?php

declare(strict_types=1);

namespace WordpressPluginTemplate\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use WordpressPluginTemplate\App\Models\PluginModel;

class PluginModelFactory extends Factory
{
    protected $model = PluginModel::class;

    public function definition(): array
    {
        return [

        ];
    }
}
