<?php

namespace App\Http\Controllers\Concerns;

trait HandlesTableSorting
{
    /**
     * @param  array<int, string>  $sortableColumns
     * @return array{0: string, 1: string}
     */
    protected function sortQuery(array $sortableColumns, string $defaultColumn, string $defaultDirection = 'desc'): array
    {
        $sort = request()->query('sort');
        $direction = request()->query('direction');

        if (! in_array($sort, $sortableColumns, true)) {
            $sort = $defaultColumn;
        }

        if (! in_array($direction, ['asc', 'desc'], true)) {
            $direction = $defaultDirection;
        }

        return [$sort, $direction];
    }
}