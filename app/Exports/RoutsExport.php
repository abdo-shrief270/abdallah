<?php

namespace App\Exports;

use App\Models\Rout;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class RoutsExport implements FromView
{

    public function view(): View
    {
        $routs=Rout::get();
        return view('Routs.export',compact('routs'));
    }
}
