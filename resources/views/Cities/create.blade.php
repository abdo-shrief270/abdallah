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
                        <h3>المراكز</h3>
                    </div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item" aria-current="page"><a href="{{route('cities.index')}}">جميع المراكز</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">اضافة مركز</a></li>
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
                                            <h4>المركز</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <div class="row">
                                        <div class="col-lg-6 col-12 mx-auto">
                                            <form action="{{route('cities.store')}}" method="POST">
                                                @csrf
                                                @error('name')
                                                <div class="text-danger mb-3" role="alert">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                @error('gov_id')
                                                <div class="text-danger mb-3" role="alert">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                <div class="form-group">
                                                    <label for="t-text">الاسم</label>
                                                    <input id="t-text" type="text" name="name" placeholder="ادخل الاسم ...." class="form-control"  required>
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="exampleFormControlSelect1">تابع لمنطقة</label>
                                                    <select name="gov_id" class="form-control" id="exampleFormControlSelect1">
                                                        <option>اختر المنطقة</option>
                                                        @foreach($govs as $gov)
                                                            <option value="{{$gov->id}}">{{$gov->id .' >> '. $gov->name}} </option>
                                                        @endforeach
                                                    </select>
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
