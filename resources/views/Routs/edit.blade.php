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
                        <h3>خطوط السير</h3>
                    </div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item" aria-current="page"><a href="{{route('routs.index')}}">جميع خطوط السير</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">تعديل خط سير {{$rout->name}}</a></li>
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
                                            <h4>تعديل خط سير {{$rout->name}}</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <div class="row">
                                        <div class="col-lg-6 col-12 mx-auto">
                                            <form action="{{route('routs.update',$rout->id)}}" method="POST">
                                                @csrf
                                                @error('rout_id')
                                                    <div class="text-danger mb-3" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                @error('name')
                                                <div class="text-danger mb-3" role="alert">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                <input type="hidden" name="rout_id" value="{{$rout->id}}">
                                                <div class="form-group">
                                                    <label for="t-text">الاسم</label>
                                                    <input type="text" name="name" placeholder="ادخل الاسم ...." class="form-control" value="{{$rout->name}}" required>
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
