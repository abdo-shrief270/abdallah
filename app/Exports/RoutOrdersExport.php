<?php

namespace App\Exports;

use App\Models\Order;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class RoutOrdersExport implements FromView
{
    protected  $routId;

    public function __construct($routId)
    {
        $this->routId=$routId;
    }
    public function view(): View
    {
        $rout_id = $this->routId;
        $orders = Order::where(function($q) {
            $q->where('status', 'new')
                ->orWhere('status', 'unFinished');
         })->whereHas('city.gov', function ($query) use ($rout_id) {
            $query->where('rout_id', $rout_id);
        })->get();
        return view('orders.export',compact('orders'));
    }
}
