<?php

namespace App\Exports;

use App\Models\Gov;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class GovsExport implements FromView
{

    public function view(): View
    {
        $govs=Gov::with('rout')->get();
        return view('Govs.export',compact('govs'));
    }
}
