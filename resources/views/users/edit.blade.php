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
                        <h3>المناديب</h3>
                    </div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item" aria-current="page"><a href="{{route('govs.index')}}">جميع المناديب</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">تعديل مندوب {{$user->name}}</a></li>
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
                                            <h4>{{$user->name}}</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <div class="row">
                                        <div class="col-lg-6 col-12 mx-auto">
                                            <form action="{{route('users.update',$user->id)}}" method="POST">
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
                                                @error('phone')
                                                <div class="text-danger mb-3" role="alert">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                @error('id_number')
                                                <div class="text-danger mb-3" role="alert">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                @error('last_password')
                                                <div class="text-danger mb-3" role="alert">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                @error('password')
                                                <div class="text-danger mb-3" role="alert">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                @error('active')
                                                <div class="text-danger mb-3" role="alert">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                @error('rout_id')
                                                <div class="text-danger mb-3" role="alert">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                <input type="hidden" name="user_id" value="{{$user->id}}">
                                                <div class="form-group">
                                                    <label for="t-text">الاسم</label>
                                                    <input id="t-text" type="text" name="name" value="{{old('name') ? old('name') : $user->name}}" placeholder="ادخل الاسم ...." class="form-control"  required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="t-text">رقم التليفون</label>
                                                    <input id="t-text" type="text" name="phone" value="{{old('phone') ? old('phone') : $user->phone}}" placeholder="ادخل رقم التليفون ...." class="form-control"  required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="t-text">رقم البطاقة</label>
                                                    <input id="t-text" type="number" name="id_number" value="{{old('id_number') ? old('id_number') : $user->id_number}}" placeholder="ادخل رقم البطاقة ...." class="form-control"  required>
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="exampleFormControlSelect1">تابع لخط سير</label>
                                                    <select name="rout_id" class="form-control" id="exampleFormControlSelect1">
                                                        <option>اختر خط سير</option>
                                                        @foreach($routs as $rout)
                                                            <option @if($user->rout_id == $rout->id) selected @endif value="{{$rout->id}}">{{$rout->id .' >> '. $rout->name}} </option>
                                                        @endforeach
                                                    </select>
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
