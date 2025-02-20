@extends('layout.master')
@section('head')

    <link rel="stylesheet" type="text/css" href="{{asset("plugins/table/datatable/datatables.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/css/forms/theme-checkbox-radio.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("plugins/table/datatable/dt-global_style.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("plugins/table/datatable/custom_dt_custom.css")}}">

@endsection

@section('content')

    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="page-header my-3">
                <nav class="breadcrumb-one" aria-label="breadcrumb">
                    <div class="title">
                        <h3>الأوردرات</h3>
                    </div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item" aria-current="page"><a href="{{route('orders.index')}}">جميع الأوردرات</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">اضافة أوردر</a></li>
                    </ol>
                </nav>
            </div>
            <div class="container">

                <div class="container">
                    <div class="row layout-top-spacing">

                        <div id="basic" class="col-lg-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>الأوردرات</h4>
                                            <button class="m-2 btn btn-warning"><a href="{{route('orders.importPage')}}">استيراد أوردرات</a> </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <div class="row">
                                        <div class="col-lg-6 col-12 mx-auto">
                                            <form action="{{route('orders.store')}}" method="POST">
                                                @csrf
                                                @error('customer_id')
                                                <div class="text-danger mb-3" role="alert">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                @error('user_id')
                                                <div class="text-danger mb-3" role="alert">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                @error('product_id')
                                                <div class="text-danger mb-3" role="alert">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                @error('quantity')
                                                <div class="text-danger mb-3" role="alert">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                @error('add_discount')
                                                <div class="text-danger mb-3" role="alert">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                @error('status')
                                                <div class="text-danger mb-3" role="alert">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                <div class="form-row">
                                                    <div class="col-md-12 form-group mb-4">
                                                        <label for="exampleFormControlSelect1">العميل</label>
                                                        <select name="customer_id" class="form-control" id="exampleFormControlSelect1">
                                                            <option value>اختر العميل</option>
                                                            @foreach($customers as $customer)
                                                                <option value="{{$customer->id}}">{{$customer->id .' >> '. $customer->name}} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-12 form-group mb-4">
                                                        <label for="exampleFormControlSelect1">المندوب</label>
                                                        <select name="user_id" class="form-control" id="exampleFormControlSelect1">
                                                            <option value>اختر المندوب</option>
                                                            @foreach($users as $user)
                                                                <option value="{{$user->id}}">{{$user->id .' >> '. $user->name}} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div id="product_div" class="col-md-12 form-group mb-4">
                                                        <label for="exampleFormControlSelect1">الصنف</label>
                                                        <select name="product_id" class="form-control" id="exampleFormControlSelect1" >
                                                            <option>اختر الصنف</option>
                                                            @foreach($products as $product)
                                                                <option value="{{$product->id}}">{{$product->id .' >> '. $product->name . ' >> ' . $product->net_price}} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-12 mb-4">
                                                        <label for="fullName">الكمية</label>
                                                        <input type="number" name="quantity" class="form-control" id="fullName" placeholder="ادخل الكمية ...." value="" required>
                                                    </div>
                                                    <div class="col-md-12 mb-4">
                                                        <label for="fullName">الخصم الأضافي</label>
                                                        <input type="number" name="add_discount" min="0" max="100" class="form-control" id="fullName" placeholder="ادخل الخصم الأضافي (0-100) ...." value="" required>
                                                    </div>
                                                </div>
                                                <input type="submit" name="txt" value="اضافة" class="mt-4 btn btn-primary">
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
@endsection


@section('scripts')


@endsection
