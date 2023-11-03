<?php

namespace LaraZeus\MatrixChoice\Components;

use Closure;
use Filament\Forms\Components\CheckboxList;

class CheckboxGrid extends CheckboxList
{
    protected string $view = 'zeus::filament.components.checkbox-grid';

    protected array | Closure $columnData = [];

    protected array | Closure $rowData = [];

    protected function setUp(): void
    {
        parent::setUp();

        $this->rules([
            function () {
                return function (string $attribute, mixed $value, Closure $fail) {
                    if (blank($value)) {
                        $fail(__('required selection for each row'));
                    }
                    foreach ($value as $val) {
                        if (blank(array_filter($val))) {
                            $fail(__('required selection for each row'));
                        }
                    }
                };
            },
        ]);
    }

    public function columnData(array $data): static
    {
        $this->columnData = $data;

        return $this;
    }

    public function getColumnData(): array
    {
        return $this->evaluate($this->columnData);
    }

    public function rowData(array $data): static
    {
        $this->rowData = $data;

        return $this;
    }

    public function getRowData(): array
    {
        return $this->evaluate($this->rowData);
    }
}
