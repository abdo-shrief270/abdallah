<?php

namespace App\Exports;

use App\Models\Product;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class ProductsExport implements FromView
{

    public function view(): View
    {
        $products=Product::get();
        return view('products.export',compact('products'));
    }
}
