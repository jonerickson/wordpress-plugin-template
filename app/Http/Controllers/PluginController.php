<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

class PluginController extends Controller
{
    public function index()
    {
        return response()->view('welcome');
    }
}
