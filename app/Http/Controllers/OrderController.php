<?php

namespace App\Http\Controllers;

use App\Exports\FinishedOrdersExport;
use App\Exports\NewOrdersExport;
use App\Exports\OrdersExport;
use App\Exports\UnFinishedOrdersExport;
use App\Http\Requests\Orders\StoreOrderRequest;
use App\Models\Order;
use App\Models\Product;
use App\Models\Rout;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller
{
    public function index()
    {
//        $status_arr = ['new','unFinished','finished'];
        $orders = Order::get();
        $groupedOrders = $orders->groupBy('status');
        return view('orders.index', compact('orders','groupedOrders'));
    }
    public function create()
    {
        $users = User::get();
        $routs = Rout::with('gov')->get();
        $products = Product::get();
        return view('orders.create',compact('users','routs','products'));
    }
    public function store(StoreOrderRequest $request)
    {
//        Order::create
        $product=Product::findorFail($request->product_id)->first();
        Order::create(array_merge($request->all(),[
            'discount'=> $product->discount + $request->add_discount,
            'total_price' => ($product->price * $request->quantity) * (1-$request->add_discount/100),
            'status'=>'new'
        ]));
        toast("تم اضافة الأوردر بنجاح",'success');
        return redirect()->route('orders.index');
    }

//    public function edit(Gov $gov)
//    {
//        $routs = Rout::get();
//        return view('govs.edit', compact('gov','routs'));
//    }
//    public function update(UpdateGovRequest $request)
//    {
//        $gov = Gov::findOrFail($request->gov_id);
//        $gov->update($request->all());
//        toast("تم تعديل المنطقة بنجاح",'success');
//        return redirect()->route('govs.index');
//    }
//
    public function delete(Order $order)
    {
        $order->delete();
        toast("تم حذف الأوردر بنجاح",'success');
        return redirect()->back();
    }

    public function export()
    {
        return Excel::download(new OrdersExport(), 'all_orders_'.now().'.xlsx');
    }
    public function exportNew()
    {
        return Excel::download(new NewOrdersExport(), 'new_orders_'.now().'.xlsx');
    }
    public function exportUnFinished()
    {
        return Excel::download(new UnFinishedOrdersExport(), 'unFinished_orders_'.now().'.xlsx');
    }
    public function exportFinished()
    {
        return Excel::download(new FinishedOrdersExport(), 'finished_orders_'.now().'.xlsx');
    }
}
