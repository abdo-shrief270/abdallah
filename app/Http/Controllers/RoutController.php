<?php

namespace App\Http\Controllers;

use App\Exports\RoutOrdersExport;
use App\Exports\RoutsExport;
use App\Http\Requests\Routs\StoreRoutRequest;
use App\Http\Requests\Routs\UpdateRoutRequest;
use App\Models\Rout;
use \Maatwebsite\Excel\Facades\Excel;

class RoutController extends Controller
{
    public function index()
    {
        $routs = Rout::get();
        return view('routs.index', compact('routs'));
    }
    public function create()
    {
        return view('routs.create');
    }
    public function store(StoreRoutRequest $request)
    {
        Rout::create($request->all());
        toast("تم اضافة المحافطة بنجاح",'success');
        return redirect()->route('routs.index');
    }
    public function edit(Rout $rout)
    {
        return view('routs.edit', compact('rout'));
    }
    public function update(UpdateRoutRequest $request)
    {
        $rout = Rout::findOrFail($request->rout_id);
        $rout->update($request->all());
        toast("تم تعديل المحافطة بنجاح",'success');
        return redirect()->route('routs.index');
    }

    public function delete(Rout $rout)
    {
        $rout->delete();
        toast("تم حذف المحافطة بنجاح",'success');
        return redirect()->back();
    }

    public function export()
    {
        return Excel::download(new RoutsExport(), 'routs_'.now().'.xlsx');
    }

    public function exportRoutOrders(Rout $rout)
    {
        return Excel::download(new RoutOrdersExport($rout->id), 'اوردات'.'_'.$rout->name.'_'.now().'.xlsx');
    }
}
