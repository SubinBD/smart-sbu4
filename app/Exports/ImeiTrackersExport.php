<?php

namespace App\Exports;

use App\Models\ImeiTracker;
use Maatwebsite\Excel\Concerns\FromQuery; // Changed from FromCollection
use Maatwebsite\Excel\Concerns\WithHeadings;

class ImeiTrackersExport implements FromQuery, WithHeadings // Changed from FromCollection
{
    /**
    * @return \Illuminate\Database\Eloquent\Builder // Changed return type hint
    */
    public function query() // Changed method name from collection to query
    {
        return ImeiTracker::query(); // Changed from ImeiTracker::all();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        // Get column names from the ImeiTracker model's table
        $columns = \Schema::getColumnListing((new ImeiTracker)->getTable());

        // You might want to customize these headings for better readability
        // For example, replace snake_case with spaces and capitalize words
        $customHeadings = array_map(function($column) {
            return ucwords(str_replace('_', ' ', $column));
        }, $columns);

        return $customHeadings;
    }
}