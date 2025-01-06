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
                        <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">جميع الأوردرات</a></li>
                    </ol>
                </nav>
            </div>
            @if(auth()->guard('owner')->check())
                <div class="row layout-spacing">
                    <div class="col-lg-12">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>كل الأوردرات</h4>
                                        <button class="m-2 btn btn-secondary"><a href="{{route('orders.export')}}">تصدير جميع الاوردرات</a> </button>
                                        <button class="m-2 btn btn-success"><a href="{{route('orders.importPage')}}">استيراد اوردرات</a> </button>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <div class="table-responsive mb-4">
                                    <table id="all_orders" class="table style-3  table-hover">
                                        <thead>
                                        <tr>
                                            <th class="checkbox-column text-center"> الكود </th>
                                            <th>اسم العميل</th>
                                            <th>رقم العميل</th>
                                            <th>خط سير</th>
                                            <th>العنوان</th>
                                            <th>اسم المندوب</th>
                                            <th>رقم المندوب</th>
                                            <th>اسم المنتج</th>
                                            <th>سعر المنتج</th>
                                            <th>الكمية</th>
                                            <th>اجمالي السعر</th>
                                            <th>الخصم الأساسي</th>
                                            <th>السعر النهائي</th>
                                            <th>تكلفة الشحن</th>
                                            <th>تكلفة الاوردر</th>
                                            <th>الخصم الأضافي</th>
                                            <th>التكلفة الأجمالية</th>
                                            <th>حالة الاوردر</th>
                                            <th class="text-center">عمليات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($orders as $order)
                                            <tr>
                                                <td class="checkbox-column text-center h4"> {{$order->id}} </td>
                                                <td>{{$order->customer->name}}</td>
                                                <td>{{$order->customer->phone}}</td>
                                                <td>{{$order->customer->city->name}}</td>
                                                <td>{{$order->customer->address}}</td>
                                                <td>{{$order->user->name}}</td>
                                                <td>{{$order->user->phone}}</td>
                                                <td>{{$order->product->name}}</td>
                                                <td class="text-primary">{{$order->product->net_price}}</td>
                                                <td>{{$order->quantity}}</td>
                                                <td class="text-warning">{{$order->product->net_price * $order->quantity}}</td>
                                                <td class="text-danger">{{$order->product->discount}}%</td>
                                                <td>{{$order->product->price * $order->quantity}}</td>
                                                <td class="text-warning">{{$order->customer->city->ship_cost}}</td>
                                                <td class="text-secondary">{{$order->product->price * $order->quantity + $order->customer->city->ship_cost}}</td>
                                                <td class="text-danger">{{$order->add_discount}}%</td>
                                                <td class="text-success">{{$order->total_price}}</td>
                                                <td>{!! $order->status=='new' ? '<span class="badge outline-badge-primary">لم يتم الاستلام</span>' : ( $order->status=='unFinished' ? '<span class="badge outline-badge-warning">جاري التوصيل</span>' : ( $order->status=='finished' ? '<span class="badge outline-badge-success">تم التوصيل</span>' :'<span class="badge outline-badge-danger">تم الألغاء</span>' ))!!}</td>
                                                <td class="text-center">
                                                    <ul class="table-controls">
                                                        <li><a href="{{route('orders.edit',$order->id)}}" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="تعديل"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-6 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                                                        <li><a href="{{route('orders.delete',$order->id)}}" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="حذف"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-6 mb-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if(isset($groupedOrders['new']))
                    <div class="row layout-spacing">
                        <div class="col-lg-12">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>الأوردرات الجديدة</h4>
                                            <button class="m-2 btn btn-danger"><a href="{{route('orders.exportNew')}}">تصدير جميع الاوردرات الجديدة</a> </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <div class="table-responsive mb-4">
                                        <table id="new_orders" class="table style-3  table-hover">
                                            <thead>
                                            <tr>
                                                <th class="checkbox-column text-center"> الكود </th>
                                                <th>اسم العميل</th>
                                                <th>رقم العميل</th>
                                                <th>خط سير</th>
                                                <th>العنوان</th>
                                                <th>اسم المندوب</th>
                                                <th>رقم المندوب</th>
                                                <th>اسم المنتج</th>
                                                <th>سعر المنتج</th>
                                                <th>الكمية</th>
                                                <th>اجمالي السعر</th>
                                                <th>الخصم الأساسي</th>
                                                <th>السعر النهائي</th>
                                                <th>تكلفة الشحن</th>
                                                <th>تكلفة الاوردر</th>
                                                <th>الخصم الأضافي</th>
                                                <th>التكلفة الأجمالية</th>
                                                <th>حالة الاوردر</th>
                                                <th class="text-center">عمليات</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($groupedOrders['new'] as $order)
                                                <tr>
                                                    <td class="checkbox-column text-center h4"> {{$order->id}} </td>
                                                    <td>{{$order->customer->name}}</td>
                                                    <td>{{$order->customer->phone}}</td>
                                                    <td>{{$order->customer->city->name}}</td>
                                                    <td>{{$order->customer->address}}</td>
                                                    <td>{{$order->user->name}}</td>
                                                    <td>{{$order->user->phone}}</td>
                                                    <td>{{$order->product->name}}</td>
                                                    <td class="text-primary">{{$order->product->net_price}}</td>
                                                    <td>{{$order->quantity}}</td>
                                                    <td class="text-warning">{{$order->product->net_price * $order->quantity}}</td>
                                                    <td class="text-danger">{{$order->product->discount}}%</td>
                                                    <td>{{$order->product->price * $order->quantity}}</td>
                                                    <td class="text-warning">{{$order->customer->city->ship_cost}}</td>
                                                    <td class="text-secondary">{{$order->product->price * $order->quantity + $order->customer->city->ship_cost}}</td>
                                                    <td class="text-danger">{{$order->add_discount}}%</td>
                                                    <td class="text-success">{{$order->total_price}}</td>
                                                    <td>{!! $order->status=='new' ? '<span class="badge outline-badge-primary">لم يتم الاستلام</span>' : ( $order->status=='unFinished' ? '<span class="badge outline-badge-warning">جاري التوصيل</span>' : ( $order->status=='finished' ? '<span class="badge outline-badge-success">تم التوصيل</span>' :'<span class="badge outline-badge-danger">تم الألغاء</span>' ))!!}</td>
                                                    <td class="text-center">
                                                        <ul class="table-controls">
                                                            <li><a href="{{route('orders.edit',$order->id)}}" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="تعديل"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-6 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                                                            <li><a href="{{route('orders.delete',$order->id)}}" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="حذف"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-6 mb-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if(isset($groupedOrders['unFinished']))
                    <div class="row layout-spacing">
                        <div class="col-lg-12">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>الأوردرات الغير مسلمة</h4>
                                            <button class="m-2 btn btn-warning"><a href="{{route('orders.exportUnFinished')}}">تصدير جميع الاوردرات الغير مسلمة</a> </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <div class="table-responsive mb-4">
                                        <table id="un_orders" class="table style-3  table-hover">
                                            <thead>
                                            <tr>
                                                <th class="checkbox-column text-center"> الكود </th>
                                                <th>اسم العميل</th>
                                                <th>رقم العميل</th>
                                                <th>خط سير</th>
                                                <th>العنوان</th>
                                                <th>اسم المندوب</th>
                                                <th>رقم المندوب</th>
                                                <th>اسم المنتج</th>
                                                <th>سعر المنتج</th>
                                                <th>الكمية</th>
                                                <th>اجمالي السعر</th>
                                                <th>الخصم الأساسي</th>
                                                <th>السعر النهائي</th>
                                                <th>تكلفة الشحن</th>
                                                <th>تكلفة الاوردر</th>
                                                <th>الخصم الأضافي</th>
                                                <th>التكلفة الأجمالية</th>
                                                <th>حالة الاوردر</th>
                                                <th class="text-center">عمليات</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($groupedOrders['unFinished'] as $order)
                                                <tr>
                                                    <td class="checkbox-column text-center h4"> {{$order->id}} </td>
                                                    <td>{{$order->customer->name}}</td>
                                                    <td>{{$order->customer->phone}}</td>
                                                    <td>{{$order->customer->city->name}}</td>
                                                    <td>{{$order->customer->address}}</td>
                                                    <td>{{$order->user->name}}</td>
                                                    <td>{{$order->user->phone}}</td>
                                                    <td>{{$order->product->name}}</td>
                                                    <td class="text-primary">{{$order->product->net_price}}</td>
                                                    <td>{{$order->quantity}}</td>
                                                    <td class="text-warning">{{$order->product->net_price * $order->quantity}}</td>
                                                    <td class="text-danger">{{$order->product->discount}}%</td>
                                                    <td>{{$order->product->price * $order->quantity}}</td>
                                                    <td class="text-warning">{{$order->customer->city->ship_cost}}</td>
                                                    <td class="text-secondary">{{$order->product->price * $order->quantity + $order->customer->city->ship_cost}}</td>
                                                    <td class="text-danger">{{$order->add_discount}}%</td>
                                                    <td class="text-success">{{$order->total_price}}</td>
                                                    <td>{!! $order->status=='new' ? '<span class="badge outline-badge-primary">لم يتم الاستلام</span>' : ( $order->status=='unFinished' ? '<span class="badge outline-badge-warning">جاري التوصيل</span>' : ( $order->status=='finished' ? '<span class="badge outline-badge-success">تم التوصيل</span>' :'<span class="badge outline-badge-danger">تم الألغاء</span>' ))!!}</td>
                                                    <td class="text-center">
                                                        <ul class="table-controls">
                                                            <li><a href="{{route('orders.edit',$order->id)}}" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="تعديل"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-6 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                                                            <li><a href="{{route('orders.delete',$order->id)}}" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="حذف"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-6 mb-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if(isset($groupedOrders['finished']))
                    <div class="row layout-spacing">
                        <div class="col-lg-12">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>الأوردرات المنتهية</h4>
                                            <button class="m-2 btn btn-primary"><a href="{{route('orders.exportFinished')}}">تصدير جميع الاوردرات المسلمة</a> </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <div class="table-responsive mb-4">
                                        <table id="fi_orders" class="table style-3  table-hover">
                                            <thead>
                                            <tr>
                                                <th class="checkbox-column text-center"> الكود </th>
                                                <th>اسم العميل</th>
                                                <th>رقم العميل</th>
                                                <th>خط سير</th>
                                                <th>العنوان</th>
                                                <th>اسم المندوب</th>
                                                <th>رقم المندوب</th>
                                                <th>اسم المنتج</th>
                                                <th>سعر المنتج</th>
                                                <th>الكمية</th>
                                                <th>اجمالي السعر</th>
                                                <th>الخصم الأساسي</th>
                                                <th>السعر النهائي</th>
                                                <th>تكلفة الشحن</th>
                                                <th>تكلفة الاوردر</th>
                                                <th>الخصم الأضافي</th>
                                                <th>التكلفة الأجمالية</th>
                                                <th>حالة الاوردر</th>
                                                <th class="text-center">عمليات</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($groupedOrders['finished'] as $order)
                                                <tr>
                                                    <td class="checkbox-column text-center h4"> {{$order->id}} </td>
                                                    <td>{{$order->customer->name}}</td>
                                                    <td>{{$order->customer->phone}}</td>
                                                    <td>{{$order->customer->city->name}}</td>
                                                    <td>{{$order->customer->address}}</td>
                                                    <td>{{$order->user->name}}</td>
                                                    <td>{{$order->user->phone}}</td>
                                                    <td>{{$order->product->name}}</td>
                                                    <td class="text-primary">{{$order->product->net_price}}</td>
                                                    <td>{{$order->quantity}}</td>
                                                    <td class="text-warning">{{$order->product->net_price * $order->quantity}}</td>
                                                    <td class="text-danger">{{$order->product->discount}}%</td>
                                                    <td>{{$order->product->price * $order->quantity}}</td>
                                                    <td class="text-warning">{{$order->customer->city->ship_cost}}</td>
                                                    <td class="text-secondary">{{$order->product->price * $order->quantity + $order->customer->city->ship_cost}}</td>
                                                    <td class="text-danger">{{$order->add_discount}}%</td>
                                                    <td class="text-success">{{$order->total_price}}</td>
                                                    <td>{!! $order->status=='new' ? '<span class="badge outline-badge-primary">لم يتم الاستلام</span>' : ( $order->status=='unFinished' ? '<span class="badge outline-badge-warning">جاري التوصيل</span>' : ( $order->status=='finished' ? '<span class="badge outline-badge-success">تم التوصيل</span>' :'<span class="badge outline-badge-danger">تم الألغاء</span>' ))!!}</td>
                                                    <td class="text-center">
                                                        <ul class="table-controls">
                                                            <li><a href="{{route('orders.edit',$order->id)}}" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="تعديل"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-6 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                                                            <li><a href="{{route('orders.delete',$order->id)}}" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="حذف"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-6 mb-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            @endforeach


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if(isset($groupedOrders['canceled']))
                    <div class="row layout-spacing">
                        <div class="col-lg-12">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>الأوردرات الملغية</h4>
                                            <button class="m-2 btn btn-danger"><a href="{{route('orders.exportCanceled')}}">تصدير جميع الاوردرات الملغية</a> </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <div class="table-responsive mb-4">
                                        <table id="ca_orders" class="table style-3  table-hover">
                                            <thead>
                                            <tr>
                                                <th class="checkbox-column text-center"> الكود </th>
                                                <th>اسم العميل</th>
                                                <th>رقم العميل</th>
                                                <th>خط سير</th>
                                                <th>العنوان</th>
                                                <th>اسم المندوب</th>
                                                <th>رقم المندوب</th>
                                                <th>اسم المنتج</th>
                                                <th>سعر المنتج</th>
                                                <th>الكمية</th>
                                                <th>اجمالي السعر</th>
                                                <th>الخصم الأساسي</th>
                                                <th>السعر النهائي</th>
                                                <th>تكلفة الشحن</th>
                                                <th>تكلفة الاوردر</th>
                                                <th>الخصم الأضافي</th>
                                                <th>التكلفة الأجمالية</th>
                                                <th>حالة الاوردر</th>
                                                <th class="text-center">عمليات</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($groupedOrders['canceled'] as $order)
                                                <tr>
                                                    <td class="checkbox-column text-center h4"> {{$order->id}} </td>
                                                    <td>{{$order->customer->name}}</td>
                                                    <td>{{$order->customer->phone}}</td>
                                                    <td>{{$order->customer->city->name}}</td>
                                                    <td>{{$order->customer->address}}</td>
                                                    <td>{{$order->user->name}}</td>
                                                    <td>{{$order->user->phone}}</td>
                                                    <td>{{$order->product->name}}</td>
                                                    <td class="text-primary">{{$order->product->net_price}}</td>
                                                    <td>{{$order->quantity}}</td>
                                                    <td class="text-warning">{{$order->product->net_price * $order->quantity}}</td>
                                                    <td class="text-danger">{{$order->product->discount}}%</td>
                                                    <td>{{$order->product->price * $order->quantity}}</td>
                                                    <td class="text-warning">{{$order->customer->city->ship_cost}}</td>
                                                    <td class="text-secondary">{{$order->product->price * $order->quantity + $order->customer->city->ship_cost}}</td>
                                                    <td class="text-danger">{{$order->add_discount}}%</td>
                                                    <td class="text-success">{{$order->total_price}}</td>
                                                    <td>{!! $order->status=='new' ? '<span class="badge outline-badge-primary">لم يتم الاستلام</span>' : ( $order->status=='unFinished' ? '<span class="badge outline-badge-warning">جاري التوصيل</span>' : ( $order->status=='finished' ? '<span class="badge outline-badge-success">تم التوصيل</span>' :'<span class="badge outline-badge-danger">تم الألغاء</span>' ))!!}</td>
                                                    <td class="text-center">
                                                        <ul class="table-controls">
                                                            <li><a href="{{route('orders.edit',$order->id)}}" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="تعديل"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-6 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                                                            <li><a href="{{route('orders.delete',$order->id)}}" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="حذف"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-6 mb-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endif
            @if(auth()->guard('user')->check())
                <div class="row layout-spacing">
                    <div class="col-lg-12">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <div class="table-responsive mb-4">
                                    <table id="all_orders" class="table style-3  table-hover">
                                        <thead>
                                        <tr>
                                            <th class="checkbox-column text-center"> الكود </th>
                                            <th>اسم العميل</th>
                                            <th>رقم العميل</th>
                                            <th>خط سير</th>
                                            <th>العنوان</th>
                                            <th>اسم المنتج</th>
                                            <th>الكمية</th>
                                            <th>تكلفة الشحن</th>
                                            <th>تكلفة الأوردر</th>
                                            <th>حالة الاوردر</th>
                                            <th class="text-center">عمليات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($orders as $order)
                                            <tr>
                                                <td class="checkbox-column text-center h4"> {{$order->id}} </td>
                                                <td>{{$order->customer->name}}</td>
                                                <td>{{$order->customer->phone}}</td>
                                                <td>{{$order->customer->city->name}}</td>
                                                <td>{{$order->customer->address}}</td>
                                                <td>{{$order->product->name}}</td>
                                                <td>{{$order->quantity}}</td>
                                                <td class="text-warning">{{$order->customer->city->ship_cost}}</td>
                                                <td class="text-success">{{$order->total_price}}</td>
                                                <td>{!! $order->status=='new' ? '<span class="badge outline-badge-primary">لم يتم الاستلام</span>' : ( $order->status=='unFinished' ? '<span class="badge outline-badge-warning">جاري التوصيل</span>' : ( $order->status=='finished' ? '<span class="badge outline-badge-success">تم التوصيل</span>' :'<span class="badge outline-badge-danger">تم الألغاء</span>' ))!!}</td>
                                                <td class="text-center">
                                                    <ul class="table-controls">
                                                        @if ($order->status=='new')
                                                            <li><a href="{{route('orders.arrive',$order->id)}}" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="تم استلام الاوردر"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle p-1 br-6 mb-1"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg></a></li>
                                                        @elseif($order->status =='unFinished')
                                                            <li><a href="{{route('orders.finish',$order->id)}}" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="تم التوصيل"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send p-1 br-6 mb-1"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg></a></li>
                                                            <li><a href="{{route('orders.cancel',$order->id)}}" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="الغاء"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle p-1 br-6 mb-1"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a></li>
                                                        @else
                                                            <li><a href="{{route('orders.arrive',$order->id)}}" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="استلام من جديد"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-cw p-1 br-6 mb-1"><polyline points="23 4 23 10 17 10"></polyline><polyline points="1 20 1 14 7 14"></polyline><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path></svg></a></li>

                                                        @endif
                                                    </ul>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @endif
        </div>
@endsection


@section('scripts')

    <script src="{{asset("plugins/table/datatable/datatables.js")}}"></script>
<script>
    c1 = $('#all_orders').DataTable({
        "oLanguage": {
            "oPaginate": { "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
            "sInfo": "عرض صفحة _PAGE_ من _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "ابحث",
            "sLengthMenu": "النتائج :  _MENU_",
        },
        "stripeClasses": [],
        "lengthMenu": [5, 10, 20, 50],
        "pageLength": 5
    });
    multiCheck(c1);
    @if(auth()->guard('owner')->check())
        c2 = $('#new_orders').DataTable({
            "oLanguage": {
                "oPaginate": { "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "عرض صفحة _PAGE_ من _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "ابحث",
                "sLengthMenu": "النتائج :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [5, 10, 20, 50],
            "pageLength": 5
        });
        c3 = $('#un_orders').DataTable({
            "oLanguage": {
                "oPaginate": { "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "عرض صفحة _PAGE_ من _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "ابحث",
                "sLengthMenu": "النتائج :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [5, 10, 20, 50],
            "pageLength": 5
        });
        c4 = $('#fi_orders').DataTable({
            "oLanguage": {
                "oPaginate": { "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "عرض صفحة _PAGE_ من _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "ابحث",
                "sLengthMenu": "النتائج :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [5, 10, 20, 50],
            "pageLength": 5
        });
        c5 = $('#ca_orders').DataTable({
            "oLanguage": {
                "oPaginate": { "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "عرض صفحة _PAGE_ من _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "ابحث",
                "sLengthMenu": "النتائج :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [5, 10, 20, 50],
            "pageLength": 5
        });
        multiCheck(c2);
        multiCheck(c3);
        multiCheck(c4);
        multiCheck(c5);
    @endif
</script>

@endsection
