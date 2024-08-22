<?php

declare(strict_types=1);

namespace WordpressPluginTemplate\Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\WithFaker;

abstract class TestCase extends BaseTestCase
{
    use WithFaker;
}
