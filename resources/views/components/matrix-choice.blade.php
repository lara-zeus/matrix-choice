@php
    $statePath = $getStatePath();
    $pilColor = $getPilColor();
    $id = $getId();
    $rowData = $getRowData();
    $columnData = $getColumnData();
    $isDisabled = $isDisabled();
@endphp

<x-dynamic-component :component="$getFieldWrapperView()" :field="$field">
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
                        @php
                            $supStatPath = ($pilColor === 'radio') ? $statePath.'.'.$rowKey : $statePath.'.'.$rowKey.'.'.$columnKey ;
                        @endphp
                        <td class="p-2 text-center">
                            <input
                                @if($isDisabled || ($isOptionDisabled($columnKey,'') && $isOptionDisabled($rowKey,''))) disabled @endif
                                wire:key="{{ $id }}.{{ $rowKey }}"
                                wire:loading.attr="disabled"
                                {{ $applyStateBindingModifiers('wire:model') }}="{{ $supStatPath }}"
                                value="{{ $columnKey }}"
                                type="{{ $pilColor }}"
                                class="mt-1 border-none bg-white shadow-sm ring-1 transition duration-75 checked:ring-0 focus:ring-2 focus:ring-offset-0 disabled:bg-gray-50 disabled:text-gray-50 disabled:checked:bg-current disabled:checked:text-gray-400 dark:bg-white/5 dark:disabled:bg-transparent dark:disabled:checked:bg-gray-600 text-custom-600 ring-gray-950/10 focus:ring-custom-600 checked:focus:ring-custom-500/50 dark:text-custom-500 dark:ring-white/20 dark:checked:bg-custom-500 dark:focus:ring-custom-500 dark:checked:focus:ring-custom-400/50 dark:disabled:ring-white/10"
                            />
                        </td>
                    @endforeach
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-dynamic-component>
