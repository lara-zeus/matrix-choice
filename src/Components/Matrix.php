<?php

namespace LaraZeus\MatrixChoice\Components;

use Closure;
use Filament\Forms\Components\CheckboxList;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Validation\Rules\In;
use LaraZeus\MatrixChoice\MatrixStateCast;

class Matrix extends CheckboxList
{
    /** @phpstan-ignore-next-line  */
    protected string $view = 'zeus-matrix-choice::components.matrix-choice';

    protected array | Closure $columnData = [];

    protected array | Closure $rowData = [];

    protected string $redOrBlue = 'radio';

    protected bool $rowSelectRequired = true;

    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->stateCast(app(MatrixStateCast::class))
            ->rules([
                fn () => function (string $attribute, mixed $value, Closure $fail) {
                    $pillColor = $this->getPilColor();
                    if ($this->rowSelectRequired && (blank($value) || count($this->getRowData()) !== count($value))) {
                        $fail(__('required a selection for each row'));
                    }

                    foreach ($value as $rowData => $columnData) {
                        if ($this->rowSelectRequired && is_array($columnData) && blank(array_filter($columnData))) {
                            $fail(__('required a selection for each row'));
                        }

                        if (! in_array($rowData, array_keys($this->getRowData()))) {
                            $fail(__('the selected :attribute is invalid'));
                        }

                        if ($pillColor === 'checkbox' && count(array_diff_key($columnData, $this->getColumnData()))) {
                            $fail(__('the selected :attribute is invalid'));
                        }

                        if ($pillColor === 'radio' && ! in_array($columnData, array_keys($this->getColumnData()))) {
                            $fail(__('the selected :attribute is invalid'));
                        }
                    }
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

    public function getInValidationRule(): In | Enum | null
    {
        return null;
    }
}
