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
                        <h3>العملاء</h3>
                    </div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item" aria-current="page"><a href="{{route('customers.index')}}">جميع العملاء</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">اضافة عميل</a></li>
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
                                            <h4>العميل</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <div class="row">
                                        <div class="col-lg-6 col-12 mx-auto">
                                            <form action="{{route('customers.store')}}" method="POST">
                                                @csrf
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
                                                @error('city_id')
                                                <div class="text-danger mb-3" role="alert">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                @error('address')
                                                <div class="text-danger mb-3" role="alert">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                <div class="form-group">
                                                    <label for="t-text">الاسم</label>
                                                    <input id="t-text" type="text" name="name" placeholder="ادخل الاسم ...." class="form-control"  required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="t-text">رقم التلفون</label>
                                                    <input id="t-text" type="text" name="phone" placeholder="ادخل رقم التلفون ...." class="form-control"  required>
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="exampleFormControlSelect1">تابع لمركز</label>
                                                    <select name="city_id" class="form-control" id="exampleFormControlSelect1">
                                                        <option>اختر مركز</option>
                                                        @foreach($cities as $city)
                                                            <option value="{{$city->id}}">{{$city->id .' >> '. $city->name}} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-12 mb-4">
                                                    <label for="fullName">عنوان العميل</label>
                                                    <textarea type="text" name="address" class="form-control" id="fullName" placeholder="ادخل العنوان ...." required></textarea>
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
