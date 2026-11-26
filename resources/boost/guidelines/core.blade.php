# Lara Zeus Matrix Choice (`lara-zeus/matrix-choice`)

Multiple-choice grid (matrix) form component for FilamentPHP supporting radio and checkbox modes.

## Key Classes
- **Form Component**: `LaraZeus\MatrixChoice\Components\Matrix` (extends `Filament\Forms\Components\CheckboxList`)
- **State Cast**: `LaraZeus\MatrixChoice\MatrixStateCast` (extends `Filament\Schemas\Components\StateCasts\OptionsArrayStateCast`)
- **Service Provider**: `LaraZeus\MatrixChoice\MatrixChoiceServiceProvider` (`$name = 'zeus-matrix-choice'`)

## Rules & Anti-Patterns
- **No Filament Panel Plugin**: Do not register a panel plugin; use `Matrix` directly in Filament form schemas.
- **Model Casting**: Cast the bound Eloquent attribute to `'array'` (or `'json'`) on the model because `Matrix` stores nested row-to-column selections.
- **Row selection requirement**: `rowSelectRequired` defaults to `true`, enforcing a selection for every row in `rowData()`. Pass `->rowSelectRequired(false)` if rows are optional.
- **Radio vs Checkbox mode**: Uses radio buttons (`->asRadio()`) by default; call `->asCheckbox()` for multi-select per row.
- **Theme CSS**: Ensure `./vendor/lara-zeus/matrix-choice/resources/views/**/*.blade.php` is scanned by Tailwind (`@source` in your Filament custom theme CSS).
