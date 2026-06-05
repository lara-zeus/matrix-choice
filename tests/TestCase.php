<?php

namespace Tests;

use LaraZeus\MatrixChoice\MatrixChoiceServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            MatrixChoiceServiceProvider::class,
        ];
    }
}
