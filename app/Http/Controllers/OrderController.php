<?php

namespace App\Http\Controllers;

use App\Exports\CanceledOrdersExport;
use App\Exports\FinishedOrdersExport;
use App\Exports\NewOrdersExport;
use App\Exports\OrdersExport;
use App\Exports\UnFinishedOrdersExport;
use App\Http\Requests\Orders\StoreOrderRequest;
use App\Http\Requests\Orders\UpdateOrderRequest;
use App\Models\City;
use App\Models\Order;
use App\Models\Product;
use App\Models\Rout;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller
{
    public function index()
    {
//        $status_arr = ['new','unFinished','finished'];
        if(Auth::guard('user')->check())
        {
            $orders = Order::where('user_id',auth('user')->user()->id)->get();
            return view('orders.index', compact('orders'));
        }
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
        $product=Product::findorFail($request->product_id)->first();
        Order::create(array_merge($request->all(),[
            'discount'=> $product->discount + $request->add_discount,
            'total_price' => ($product->price * $request->quantity) * (1-$request->add_discount/100),
            'status'=>'new'
        ]));
        toast("تم اضافة الأوردر بنجاح",'success');
        return redirect()->route('orders.index');
    }

    public function edit(Order $order)
    {
        $users = User::get();
        $routs = Rout::with('gov')->get();
        $products = Product::get();
        return view('orders.edit', compact('order','users','routs','products'));
    }
    public function update(UpdateOrderRequest $request)
    {
        $order = Order::findOrFail($request->order_id);
        $product=Product::findorFail($request->product_id)->first();
        $city=City::findorFail($request->city_id)->first();
        $order->update(array_merge($request->all(),[
            'discount'=> $product->discount + $request->add_discount,
            'total_price' => (($product->price * $request->quantity) + $city->ship_cost) * (1-$request->add_discount/100),
            'status'=>'new'
        ]));
        toast("تم تعديل الأوردر بنجاح",'success');
        return redirect()->route('orders.index');
    }

    public function delete(Order $order)
    {
        $order->delete();
        toast("تم حذف الأوردر بنجاح",'success');
        return redirect()->back();
    }

    public function arrive(Order $order)
    {
        $order->update([
            'status' => 'unFinished'
        ]);
        toast("تم الحصول علي الأوردر بنجاح",'success');
        return redirect()->back();
    }

    public function finish(Order $order)
    {
        $order->update([
            'status' => 'finished'
        ]);
        toast("تم تسليم الأوردر بنجاح",'success');
        return redirect()->back();
    }

    public function cancel(Order $order)
    {
        $order->update([
            'status' => 'canceled'
        ]);
        toast("تم الغاء الأوردر بنجاح",'success');
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
    public function exportCanceled()
    {
        return Excel::download(new CanceledOrdersExport(), 'canceled_orders_'.now().'.xlsx');
    }
}
