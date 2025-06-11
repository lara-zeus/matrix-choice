@php
    $statePath = $getStatePath();
    $pilColor = $getPilColor();
    $id = $getId();
    $rowData = $getRowData();
    $columnData = $getColumnData();
    $isDisabled = $isDisabled();
@endphp
<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <div class="overflow-x-auto shadow ring-1 ring-gray-200 dark:ring-white/10 ring-opacity-5 rounded-lg">
        <table class="w-full table-auto divide-y divide-gray-200 dark:divide-white/5 bg-white dark:bg-gray-900">
            <thead>
            <tr class="p-2 bg-gray-50 dark:bg-gray-800">
                <td></td>
                @foreach($columnData as $column)
                    <td class="p-2 text-center">{{ $column }}</td>
                @endforeach
            </tr>
            </thead>
            <tbody>
            @foreach($rowData as $rowKey => $rowValue)
                <tr>
                    <td class="p-2">{{ $rowValue }}</td>
                    @foreach($columnData as $columnKey => $columnValue)
                        <td class="p-2 text-center">
                            @php
                                $supStatPath = ($pilColor === 'radio') ? $statePath.'.'.$rowKey : $statePath.'.'.$rowKey.'.'.$columnKey ;
                                $attributes = $attributes
                                    ->class([
                                        'fi-checkbox-input' => $pilColor === 'checkbox',
                                        'fi-radio-input' => $pilColor === 'radio',
                                        'fi-valid' => ! $errors->has($statePath),
                                        'fi-invalid' => $errors->has($statePath),
                                    ])
                            @endphp
                            <input
                                {{ $attributes }}
                                @if($isDisabled || ($isOptionDisabled($columnKey,'') && $isOptionDisabled($rowKey,''))) disabled @endif
                                wire:key="{{ $id }}.{{ $rowKey }}"
                                wire:loading.attr="disabled"
                                {{ $applyStateBindingModifiers('wire:model') }}="{{ $supStatPath }}"
                                value="{{ $columnKey }}"
                                type="{{ $pilColor }}"
                            />
                        </td>
                    @endforeach
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-dynamic-component>
