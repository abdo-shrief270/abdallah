<?php

namespace App\Exports;

use App\Models\Order;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class CanceledOrdersExport implements FromView
{

    public function view(): View
{
    $orders=Order::where('status','canceled')->get();
    return view('orders.export',compact('orders'));
}
}