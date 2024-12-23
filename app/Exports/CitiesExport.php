<?php

namespace App\Exports;

use App\Models\City;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CitiesExport implements FromView
{

    public function view(): View
    {
        $cities=City::with('gov')->get();
        return view('cities.export',compact('cities'));
    }
}
