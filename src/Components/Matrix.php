<?php

namespace LaraZeus\MatrixChoice\Components;

use Closure;
use Filament\Forms\Components\CheckboxList;

class Matrix extends CheckboxList
{
    protected string $view = 'zeus-matrix-choice::components.matrix-choice';

    protected array | Closure $columnData = [];

    protected array | Closure $rowData = [];

    protected string $redOrBlue = 'radio';

    protected bool $rowSelectRequired = true;

    protected function setUp(): void
    {
        parent::setUp();

        $this->rules([
            function () {
                return function (string $attribute, mixed $value, Closure $fail) {
                    if ($this->rowSelectRequired && (blank($value) || count($this->getRowData()) !== count($value))) {
                        $fail(__('required a selection for each row'));
                    }
                    foreach ($value as $val) {
                        if ($this->rowSelectRequired && is_array($val) && blank(array_filter($val))) {
                            $fail(__('required a selection for each row'));
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

    public function getPilColor(): string
    {
        return $this->evaluate($this->redOrBlue);
    }

    public function asRadio(): static
    {
        $this->redOrBlue = 'radio';

        return $this;
    }

    public function asCheckbox(): static
    {
        $this->redOrBlue = 'checkbox';

        return $this;
    }

    public function rowSelectRequired(bool $rowSelectRequired = true): static
    {
        $this->rowSelectRequired = $rowSelectRequired;

        return $this;
    }
}
