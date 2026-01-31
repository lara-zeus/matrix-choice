<?php

namespace LaraZeus\MatrixChoice;

use BackedEnum;
use Filament\Schemas\Components\StateCasts\OptionsArrayStateCast;
use Illuminate\Support\Arr;

class MatrixStateCast extends OptionsArrayStateCast
{
    public function get(mixed $state): array
    {
        if (blank($state)) {
            return [];
        }

        if (! is_array($state)) {
            $state = json_decode($state, associative: true);
        }
        $keys = array_keys(Arr::wrap($state));

        return array_reduce(
            Arr::wrap($state),
            function (array $carry, $stateItem) use (&$keys): array {
                if (blank($stateItem)) {
                    return $carry;
                }
                $key = array_shift($keys);

                if ($stateItem instanceof BackedEnum) {
                    $stateItem = $stateItem->value;
                }

                if (
                    is_int($stateItem)
                    || (
                        is_string($stateItem)
                        && ctype_digit($stateItem)
                        && (($stateItem === '0') || (! str($stateItem)->startsWith('0')))
                    )
                ) {
                    $max = (string) PHP_INT_MAX;

                    if (
                        (strlen($stateItem) > strlen($max)) ||
                        ((strlen($stateItem) === strlen($max)) && (strcmp($stateItem, $max) > 0))
                    ) {
                        $carry[] = strval($stateItem);
                    } else {
                        $carry[] = intval($stateItem);
                    }
                } else {
                    if (is_array($stateItem)) {
                        $carry[$key] = $stateItem;
                    } else {
                        $carry[] = strval($stateItem);
                    }
                }

                return $carry;
            },
            initial: [],
        );
    }

    public function set(mixed $state): array
    {
        if (blank($state)) {
            return [];
        }

        if (! is_array($state)) {
            $state = json_decode($state, associative: true);
        }

        return array_reduce(
            Arr::wrap($state),
            function (array $carry, $stateItem): array {
                if (blank($stateItem)) {
                    return $carry;
                }

                if ($stateItem instanceof BackedEnum) {
                    $stateItem = $stateItem->value;
                }

                $carry[] = strval($stateItem);

                return $carry;
            },
            initial: [],
        );
    }
}
