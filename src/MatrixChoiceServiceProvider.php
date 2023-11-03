<?php

namespace LaraZeus\MatrixChoice;

use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class MatrixChoiceServiceProvider extends PackageServiceProvider
{
    public static string $name = 'zeus-matrix-choice';

    public function configurePackage(Package $package): void
    {
        $package
            ->name(static::$name)
            ->hasViews()
            ->hasAssets()
            ->hasTranslations();
    }

    public function boot(): void
    {
        parent::boot();

        /*FilamentAsset::register([
            Css::make('matrix-choice', __DIR__ . '/../resources/dist/matrix.css')->loadedOnRequest(),
        ], 'zeus-matrix-choice');*/
    }
}
