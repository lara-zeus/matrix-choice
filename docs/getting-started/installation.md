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
        '🙂',
        '😐',
        '🙁',
    ])
    ->rowData([
        'Saturday',
        'Sunday',
        'Monday',
    ])
    
    //set the row selection optional
    ->rowSelectRequired(false)
    ,
```
