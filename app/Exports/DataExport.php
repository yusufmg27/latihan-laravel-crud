<?php

namespace App\Exports;

use App\Models\master;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return master::all();
    }

    public function headings(): array
    {
        return [
            'id',
            'name',
            'description',
            'seq',
            'status',
            'is_deleted',
            'created_at',
            'updated_at',
        ];
    }
}
