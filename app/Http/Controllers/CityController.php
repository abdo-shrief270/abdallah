<?php

namespace App\Http\Controllers;

use App\Exports\CitiesExport;
use App\Http\Requests\Cities\StoreCityRequest;
use App\Http\Requests\Cities\UpdateCityRequest;
use App\Models\City;
use App\Models\Gov;
use Maatwebsite\Excel\Facades\Excel;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::with('gov')->get();
        return view('cities.index', compact('cities'));
    }
    public function create()
    {
        $govs = Gov::get();
        return view('cities.create',compact('govs'));
    }
    public function store(StoreCityRequest $request)
    {
        City::create($request->all());
        toast("تم اضافة الخط سير بنجاح",'success');
        return redirect()->route('cities.index');
    }
    public function edit(City $city)
    {
        $govs = Gov::get();
        return view('cities.edit', compact('city','govs'));
    }
    public function update(UpdateCityRequest $request)
    {
        $city = City::findOrFail($request->city_id);
        $city->update($request->all());
        toast("تم تعديل الخط سير بنجاح",'success');
        return redirect()->route('cities.index');
    }

    public function delete(City $city)
    {
        $city->delete();
        toast("تم حذف الخط سير بنجاح",'success');
        return redirect()->back();
    }

    public function export()
    {
        return Excel::download(new CitiesExport(), 'cities_'.now().'.xlsx');
    }
}
