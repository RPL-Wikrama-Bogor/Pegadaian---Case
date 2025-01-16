<?php

namespace App\Exports;

use App\Models\Pawnshop;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PawnshopsExport implements FromCollection, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pawnshop::with('response')->get();
    }

    Public function map($item) : array
    {
        return [
            $item->name,
            $item->email,
            $item->age,
            $item->phone_number,
            $item->nik,
            $item->item,
            $item->response['type'],
            $item->response['shop_location'],
        ];
    }

    public function headings(): array
    {
        return [
            'Name',
            'Email',
            'Age',
            'Phone Number',
            'NIK',
            'Item',
            'Status',
            'Shop Location',
        ];
    }
}
