<?php

namespace App\Exports;

use App\Models\Order;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class UnFinishedOrdersExport implements FromView
{
    public function view(): View
    {
        $orders=Order::where('status','unFinished')->get();
        return view('products.export',compact('orders'));
    }
}
