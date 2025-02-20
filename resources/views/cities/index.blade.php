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
                        <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">جميع خطوط السير</a></li>
                    </ol>
                </nav>
            </div>

            <div class="row layout-spacing">
                <div class="col-lg-12">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>خطوط السير</h4>
                                    <button class="btn btn-primary"><a href="{{route('cities.create')}}"> اضافة خط سير</a> </button>
                                    <button class="btn btn-secondary"><a href="{{route('cities.export')}}"> تصدير خطوط السير</a> </button>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="table-responsive mb-4">
                                <table id="style-3" class="table style-3  table-hover">
                                    <thead>
                                    <tr>
                                        <th class="checkbox-column text-center"> الكود </th>
                                        <th>الاسم</th>
                                        <th>المركز</th>
                                        <th>تكلفة الشحن</th>
                                        <th class="text-center">عمليات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cities as $city)
                                        <tr>
                                            <td class="checkbox-column text-center h4"> {{$city->id}} </td>
                                            <td >{{$city->name}}</td>
                                            <td >{{$city->gov->name}}</td>
                                            <td >{{$city->ship_cost}}</td>
                                            <td class="text-center">
                                                <ul class="table-controls">
                                                    <li><a href="{{route('cities.edit',$city->id)}}" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="تعديل"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-6 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                                                    <li><a href="{{route('cities.delete',$city->id)}}" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="حذف"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-6 mb-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a></li>
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

        </div>
@endsection


@section('scripts')

    <script src="{{asset("plugins/table/datatable/datatables.js")}}"></script>
<script>
    c1 = $('#style-3').DataTable({
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
</script>

@endsection
