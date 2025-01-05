<?php

namespace App\Http\Controllers;

use App\Exports\GovsExport;
use App\Http\Requests\Govs\StoreGovRequest;
use App\Http\Requests\Govs\UpdateGovRequest;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\City;
use App\Models\Customer;
use App\Models\Gov;
use App\Models\Rout;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::with('city')->get();
        return view('customers.index', compact('customers'));
    }
    public function create()
    {
        $cities = City::get();
        return view('customers.create',compact('cities'));
    }
    public function store(StoreCustomerRequest $request)
    {
        Customer::create($request->all());
        toast("تم اضافة العميل بنجاح",'success');
        return redirect()->route('customers.index');
    }
    public function edit(Customer $customer)
    {
        $cities = City::get();
        return view('customers.edit', compact('customer','cities'));
    }
    public function update(UpdateCustomerRequest $request)
    {
        $customer = Customer::findOrFail($request->customer_id);
        $customer->update($request->all());
        toast("تم تعديل العميل بنجاح",'success');
        return redirect()->route('customers.index');
    }

    public function delete(Customer $customer)
    {
        $customer->delete();
        toast("تم حذف العميل بنجاح",'success');
        return redirect()->back();
    }
}
