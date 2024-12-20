<?php

namespace App\Http\Controllers;


use App\Exports\ProductsExport;
use App\Http\Requests\Products\StoreProductRequest;
use App\Http\Requests\Products\UpdateProductRequest;
use App\Models\Product;
use \Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return view('products.index', compact('products'));
    }
    public function create()
    {
        return view('products.create');
    }
    public function store(StoreProductRequest $request)
    {
        Product::create(array_merge($request->all(),[
            'price'=>$request->get('net_price') - $request->get('discount')
        ]));
        toast("تم اضافة الصنف بنجاح",'success');
        return redirect()->route('products.index');
    }
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }
    public function update(UpdateProductRequest $request)
    {
        $product = Product::findOrFail($request->product_id);
        $product->update(array_merge($request->all(),[
            'price'=>$request->get('net_price') - $request->get('discount')
        ]));
        toast("تم تعديل الصنف بنجاح",'success');
        return redirect()->route('products.index');
    }

    public function delete(Product $product)
    {
        $product->delete();
        toast("تم حذف الصنف بنجاح",'success');
        return redirect()->back();
    }

    public function export()
    {
        return Excel::download(new ProductsExport(), 'products_'.now().'.xlsx');
    }
}
