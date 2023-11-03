<?php

namespace LaraZeus\MatrixChoice;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class MatrixChoiceServiceProvider extends PackageServiceProvider
{
    public static string $name = 'zeus-matrix-choice';

    public function configurePackage(Package $package): void
    {
        $package
            ->name(static::$name)
            ->hasViews(static::$name)
            ->hasTranslations();
    }
}
