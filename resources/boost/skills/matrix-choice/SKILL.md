---
name: zeus-matrix-choice
description: Use when adding or customizing a radio/checkbox multiple-choice grid form field with lara-zeus/matrix-choice in Filament.
---

# Lara Zeus Matrix Choice

## Overview & Requirements
`lara-zeus/matrix-choice` provides the `Matrix` form component for building radio or checkbox choice grids in FilamentPHP forms.
- **PHP**: `^8.4`
- **Filament**: `^5.0`
- **Package Name**: `lara-zeus/matrix-choice` (Service Provider: `LaraZeus\MatrixChoice\MatrixChoiceServiceProvider`)

## Installation
```bash
composer require lara-zeus/matrix-choice
```

## Configuration & Migrations
No migrations or config files are required.

To ensure Tailwind classes in the component view are compiled, add the view path to your Filament custom theme CSS:
```css
@source '../../../../vendor/lara-zeus/matrix-choice/resources/views/**/*.blade.php';
```

On the Eloquent model saving the field, cast the column to `array`:
```php
protected function casts(): array
{
    return [
        'question' => 'array',
    ];
}
```

## Filament Panel Registration
No panel plugin registration is required. Use `LaraZeus\MatrixChoice\Components\Matrix` directly in your Filament form schema.

## Core Usage & Examples
```php
use LaraZeus\MatrixChoice\Components\Matrix;

Matrix::make('question')
    ->label('Permissions Matrix')
    ->asCheckbox() // or ->asRadio() (default)
    ->columnData([
        'c' => 'Create',
        'r' => 'Read',
        'u' => 'Update',
        'd' => 'Delete',
    ])
    ->rowData([
        'users' => 'Users',
        'companies' => 'Companies',
    ])
    ->rowSelectRequired(false)
    ->disableOptionWhen(fn (string $value): bool => $value === 'd' || $value === 'users')
    ->hideOptionWhen(fn (string $rowKey, string $columnKey): bool => $rowKey === 'users' && $columnKey === 'd');
```

## Common Pitfalls / Anti-Patterns
- **Forgetting `->rowSelectRequired(false)`**: By default, `Matrix` validates that every row in `rowData()` has at least one selected column.
- **`disableOptionWhen()` evaluation**: In the Blade template, an individual cell is disabled when `$isDisabled` is true OR when `$isOptionDisabled($columnKey, '') && $isOptionDisabled($rowKey, '')` both evaluate to true — check both keys in your closure or use `->hideOptionWhen(fn (string $rowKey, string $columnKey) => ...)` to hide specific cells.
- **Missing `array` cast**: Storing matrix state without casting the model attribute to `array` will fail when hydrating/dehydrating array state.
