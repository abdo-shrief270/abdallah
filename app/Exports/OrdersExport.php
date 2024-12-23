<?php

namespace App\Exports;

use App\Models\Order;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class OrdersExport implements FromView
{
    public function view(): View
    {
        $orders=Order::get();
        return view('products.export',compact('orders'));
    }
}
