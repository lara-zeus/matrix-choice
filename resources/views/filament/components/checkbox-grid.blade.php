<x-dynamic-component :component="$getFieldWrapperView()" :field="$field">
    @php
        $statePath = $getStatePath();
    @endphp

    <div class="overflow-hidden shadow ring-1 ring-gray-300 ring-opacity-5 rounded-lg">
        <table class="w-full table-auto divide-y divide-gray-200 dark:divide-white/5 bg-white">
            <thead class="">
            <tr class="p-2 bg-gray-50">
                <td class=""></td>
                @foreach($getColumnData() as $column)
                    <td class="p-2 text-center">{{ $column }}</td>
                @endforeach
            </tr>
            </thead>
            <tbody>
                @foreach($getRowData() as $row)
                    <tr>
                        <td class="p-2">{{ $row }}</td>
                        @foreach($getColumnData() as $columnRow)
                            @php
                                $subStatPath = "{$statePath}.{$row}.{$columnRow}";
                            @endphp
                            <td class="p-2 text-center">
                                <input
                                    wire:key="{{ $this->getId() }}.{{ $statePath }}.{{ $row }}.options.{{ $columnRow }}"
                                    :error="$errors->has($statePath)"
                                    type="checkbox"
                                    wire:loading.attr="disabled"
                                {{ $applyStateBindingModifiers('wire:model') }}="{{ $subStatPath }}"
                                {{
                                    $getExtraInputAttributeBag()
                                        ->class([
                                            'mt-1 border-none bg-white shadow-sm ring-1 transition duration-75 checked:ring-0 focus:ring-2 focus:ring-offset-0 disabled:bg-gray-50 disabled:text-gray-50 disabled:checked:bg-current disabled:checked:text-gray-400 dark:bg-white/5 dark:disabled:bg-transparent dark:disabled:checked:bg-gray-600',
                                            'text-custom-600 ring-gray-950/10 focus:ring-custom-600 checked:focus:ring-custom-500/50 dark:text-custom-500 dark:ring-white/20 dark:checked:bg-custom-500 dark:focus:ring-custom-500 dark:checked:focus:ring-custom-400/50 dark:disabled:ring-white/10' => ! $errors->has($statePath),
                                            'text-danger-600 ring-danger-600 focus:ring-danger-600 checked:focus:ring-danger-500/50 dark:text-danger-500 dark:ring-danger-500 dark:checked:bg-danger-500 dark:focus:ring-danger-500 dark:checked:focus:ring-danger-400/50' => $errors->has($statePath),
                                        ])
                                }}
                                />
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-dynamic-component>
