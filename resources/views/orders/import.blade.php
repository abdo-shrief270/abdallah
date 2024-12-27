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
                        <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">اضافة أوردرات</a></li>
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
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <div class="row">
                                        <div class="col-lg-6 col-12 mx-auto">
                                            <a class="btn btn-success" download href="{{asset('ordersDumpy.xlsx')}}" target="_blank">تحميل ملف الأستيراد</a>
                                            <form action="{{route('orders.import')}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @error('file')
                                                <div class="text-danger mb-3" role="alert">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                <div class="form-group mb-4 mt-3">
                                                    <label for="exampleFormControlFile1">ملف الأوردرات</label>
                                                    <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1">
                                                </div>
                                                <input type="submit" name="txt" value="استيراد" class="mt-4 btn btn-primary">
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
