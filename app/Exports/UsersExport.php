<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UsersExport implements FromView
{

    public function view(): View
{
    $users=User::get();
    return view('users.export',compact('users'));
}
}
