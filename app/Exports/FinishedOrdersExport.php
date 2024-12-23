<?php

namespace App\Exports;

use App\Models\Order;
use App\Models\Product;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class FinishedOrdersExport implements FromView
{

    public function view(): View
    {
        $orders=Order::where('status','finished')->get();
        return view('products.export',compact('orders'));
    }
}
