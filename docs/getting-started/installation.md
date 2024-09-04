---
title: Installation
weight: 3
---

## Installation

Install @zeus Matrix Choice by running the following commands in your Laravel project directory.

```bash
composer require lara-zeus/matrix-choice
```

## Usage:

use it in your resource

```php
Matrix::make('question')
    ->label('Tell us about your mod')
    ->asRadio()
    // or
    ->asCheckbox()
    ->columnData([
        'c' => 'Create',
        'r' => 'Read',
        'u' => 'Update',
        'd' => 'Delete',
        'm' => 'Manage',
        'p' => 'Approve',
    ])
    ->rowData([
        'users' => 'Users',
        'companies' => 'Companies',
        'clients' => 'Clients',
    ])
    
    //set the row selection optional
    ->rowSelectRequired(false)
    
    // to disable any options:
    ->disableOptionWhen(fn (string $value): bool => $value === 'm' || $value === 'p' || $value === 'users')
    ,
```
