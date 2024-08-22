<?php

declare(strict_types=1);

namespace WordpressPluginTemplate\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PluginModel extends Model
{
    use HasFactory;

    protected $table = 'yourplugin_entries';
}
