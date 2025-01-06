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
                        <li class="breadcrumb-item" aria-current="page"><a href="{{route('govs.index')}}">جميع المراكز</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">تعديل مركز {{$gov->name}}</a></li>
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
                                            <h4>{{$gov->name}}</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <div class="row">
                                        <div class="col-lg-6 col-12 mx-auto">
                                            <form action="{{route('govs.update',$gov->id)}}" method="POST">
                                                @csrf
                                                @error('gov_id')
                                                    <div class="text-danger mb-3" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                @error('name')
                                                <div class="text-danger mb-3" role="alert">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                <input type="hidden" name="gov_id" value="{{$gov->id}}">
                                                <div class="form-group">
                                                    <label for="t-text">الاسم</label>
                                                    <input id="t-text" type="text" name="name" placeholder="ادخل الاسم ...." class="form-control" value="{{$gov->name}}" required>
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="exampleFormControlSelect1">تابع لمحافظة</label>
                                                    <select name="rout_id" class="form-control" id="exampleFormControlSelect1">
                                                        <option>اختر محافظة</option>
                                                        @foreach($routs as $rout)
                                                            <option @if($rout->id == $gov->rout_id) selected @endif value="{{$rout->id}}">{{$rout->id .' >> '. $rout->name}} </option>
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

    <script src="{{asset("plugins/table/datatable/datatables.js")}}"></script>
<script>
    c1 = $('#style-3').DataTable({
        "oLanguage": {
            "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
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
</script>

@endsection
