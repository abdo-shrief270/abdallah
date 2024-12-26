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
                        <h3>الأصناف</h3>
                    </div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item" aria-current="page"><a href="{{route('products.index')}}">جميع الأصناف</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">تعديل الصنف {{$product->name}}</a></li>
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
                                            <h4>{{$product->name}}</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <div class="row">
                                        <div class="col-lg-6 col-12 mx-auto">
                                            <form action="{{route('products.update',$product->id)}}" method="POST">
                                                @csrf
                                                @error('product_id')
                                                <div class="text-danger mb-3" role="alert">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                @error('name')
                                                <div class="text-danger mb-3" role="alert">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                @error('code')
                                                <div class="text-danger mb-3" role="alert">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                @error('net_price')
                                                <div class="text-danger mb-3" role="alert">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                @error('discount')
                                                <div class="text-danger mb-3" role="alert">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                @error('available_quantity')
                                                <div class="text-danger mb-3" role="alert">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                                <div class="form-group">
                                                    <label for="t-text">الاسم</label>
                                                    <input id="t-text" type="text" value="{{old('name')??$product->name}}" name="name" placeholder="ادخل الاسم ...." class="form-control"  required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="t-text">كود الصنف</label>
                                                    <input id="t-text" type="text" value="{{old('code')??$product->code}}" name="code" placeholder="ادخل كود الصنف ...." class="form-control"  required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="t-text">سعر الصنف الاساسي</label>
                                                    <input id="t-text" type="number" value="{{old('net_price')??$product->net_price}}" name="net_price" placeholder="ادخل سعر الصنف الاساسي ...." class="form-control"  required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="t-text">كمية الخصم</label>
                                                    <input id="t-text" type="number" min="0" max="100"  value="{{old('discount')??$product->discount}}" name="discount" placeholder="ادخل كمية الخصم (0-100) ...." class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="t-text">الكمية المتاحة</label>
                                                    <input id="t-text" type="number" value="{{old('available_quantity')??$product->available_quantity}}" name="available_quantity" placeholder="ادخل الكمية المتاحة ...." class="form-control"  required>
                                                </div>
                                                <input type="submit" name="txt" value="حفظ" class="mt-4 btn btn-primary">
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
