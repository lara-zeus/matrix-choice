<?php

use LaraZeus\MatrixChoice\Components\Matrix;

it('can evaluate if option is hidden', function () {
    $matrix = Matrix::make('question')
        ->columnData([
            'c' => 'Create',
            'm' => 'Manage',
        ])
        ->rowData([
            'users' => 'Users',
            'companies' => 'Companies',
        ])
        ->hideOptionWhen(fn (string $rowKey, string $columnKey): bool => $rowKey === 'users' && $columnKey === 'm');

    expect($matrix->isOptionHidden('users', 'm'))->toBeTrue()
        ->and($matrix->isOptionHidden('users', 'c'))->toBeFalse()
        ->and($matrix->isOptionHidden('companies', 'm'))->toBeFalse();
});
