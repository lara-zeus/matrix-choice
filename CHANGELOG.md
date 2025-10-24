# Changelog

All notable changes to `Matrix Choice` will be documented in this file

## 4.0.1 - 2025-10-24

### What's Changed

* filament 4 by @atmonshi in https://github.com/lara-zeus/matrix-choice/pull/28

**Full Changelog**: https://github.com/lara-zeus/matrix-choice/compare/4.0.0...4.0.1

## v3.2.2 - 2024-09-04

### What's Changed

* Bump dependabot/fetch-metadata from 1.6.0 to 2.2.0 by @dependabot in https://github.com/lara-zeus/matrix-choice/pull/12
* allow to disable options by @atmonshi in https://github.com/lara-zeus/matrix-choice/pull/14

#### Allow to disable options:

usage:

```php
MatrixAlias::make('options')
    ->disableOptionWhen(fn (string $value): bool => $value === 'm' || $value === 'p' || $value === 'users')
    ->rowSelectRequired(false)

    ->label('Resources Operations')
    ->asRadio()
    ->columnData([
        'c'=>'Create',
        'r'=>'Read',
        'u'=>'Update',
        'd'=>'Delete',
        'm'=>'Manage',
        'p'=>'Approve',
    ])
    ->rowData([
        'users'=>'Users',
        'companies'=>'Companies',
        'clients'=>'Clients',
    ]),



```
output:
<img width="1096" alt="Screenshot 2024-09-04 at 3 25 12 PM" src="https://github.com/user-attachments/assets/b38eefc5-2c38-4c42-a279-92a38e3d7023">

**Full Changelog**: https://github.com/lara-zeus/matrix-choice/compare/v3.2.1...v3.2.2

## v3.2.1 - 2024-05-04

### What's Changed

* Bump ramsey/composer-install from 2 to 3 by @dependabot in https://github.com/lara-zeus/matrix-choice/pull/7
* Bump aglipanci/laravel-pint-action from 2.3.1 to 2.4 by @dependabot in https://github.com/lara-zeus/matrix-choice/pull/9
* responsive ui by @atmonshi in https://github.com/lara-zeus/matrix-choice/pull/11

**Full Changelog**: https://github.com/lara-zeus/matrix-choice/compare/v3.2.0...v3.2.1

## v3.2.0 - 2024-01-08

### What's Changed

* Bump aglipanci/laravel-pint-action from 2.3.0 to 2.3.1 by @dependabot in https://github.com/lara-zeus/matrix-choice/pull/4
* update filament v3.1 by @atmonshi in https://github.com/lara-zeus/matrix-choice/pull/5

### New Contributors

* @dependabot made their first contribution in https://github.com/lara-zeus/matrix-choice/pull/4

**Full Changelog**: https://github.com/lara-zeus/matrix-choice/compare/v3.1.0...v3.2.0

## v3.1.0 - 2023-12-06

### What's Changed

* New feature Optional selects by @ArtDepartmentMJ in https://github.com/lara-zeus/matrix-choice/pull/3

### New Contributors

* @ArtDepartmentMJ made their first contribution in https://github.com/lara-zeus/matrix-choice/pull/3

**Full Changelog**: https://github.com/lara-zeus/matrix-choice/compare/v3.0.1...v3.1.0

## 3.0.0 - 2023-11-04

- initial release
