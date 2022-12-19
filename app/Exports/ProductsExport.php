<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Product::all(['id', 'name', 'description', 'price', 'image', 'is_active']);
    }
    public function headings(): array
    {
        return ['ID', 'Name', 'Description', 'Price', 'Image', 'Available'];
    }
}
