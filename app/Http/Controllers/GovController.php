<?php

namespace App\Http\Controllers;

use App\Exports\GovsExport;
use App\Http\Requests\Govs\StoreGovRequest;
use App\Http\Requests\Govs\UpdateGovRequest;
use App\Models\Gov;
use App\Models\Rout;
use Maatwebsite\Excel\Facades\Excel;

class GovController extends Controller
{
    public function index()
    {
        $govs = Gov::with('rout')->get();
        return view('govs.index', compact('govs'));
    }
    public function create()
    {
        $routs = Rout::get();
        return view('govs.create',compact('routs'));
    }
    public function store(StoreGovRequest $request)
    {
        Gov::create($request->all());
        toast("تم اضافة المركز بنجاح",'success');
        return redirect()->route('govs.index');
    }
    public function edit(Gov $gov)
    {
        $routs = Rout::get();
        return view('govs.edit', compact('gov','routs'));
    }
    public function update(UpdateGovRequest $request)
    {
        $gov = Gov::findOrFail($request->gov_id);
        $gov->update($request->all());
        toast("تم تعديل المركز بنجاح",'success');
        return redirect()->route('govs.index');
    }

    public function delete(Gov $gov)
    {
        $gov->delete();
        toast("تم حذف المركز بنجاح",'success');
        return redirect()->back();
    }

    public function export()
    {
        return Excel::download(new GovsExport(), 'govs_'.now().'.xlsx');
    }
}
