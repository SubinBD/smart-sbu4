<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromQuery; // Changed from FromCollection
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromQuery, WithHeadings // Changed from FromCollection
{
    /**
    * @return \Illuminate\Database\Eloquent\Builder // Changed return type hint
    */
    public function query() // Changed method name from collection to query
    {
        return User::select(
            'id', 'name', 'email', 'phone', 'employee_id', 'position', 'role',
            'division', 'district', 'upozila', 'region',
            'nsm', 'csm', 'rsm', 'asm', 'tsm', 'sr',
            'retailer', 'distributor', 'image'
        ); // Changed from ->get() to return query builder
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID', 'Name', 'Email', 'Phone', 'Employee ID', 'Position', 'Role',
            'Division', 'District', 'Upozila', 'Region',
            'NSM', 'CSM', 'RSM', 'ASM', 'TSM', 'SR',
            'Retailer', 'Distributor', 'Image'
        ];
    }
}
