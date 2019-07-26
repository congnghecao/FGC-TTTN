
@extends('admin::layouts.master')

@section('content')
    <!---->
    <!--Main main-->
    <main class="app-content">
        <div class="app-title">
            <div class="row">

                <h1><i class="app-menu__icon fa fa-laptop"></i> Lịch sử công tác</h1>


            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.trangchu')}}"><i class="fa fa-home fa-lg"></i></a></li>
                <li class="breadcrumb-item"><a href="{{route('admin.get.index.nhansu')}}">Nhân sự</a></li>
                <li class="breadcrumb-item"><a href="">Lịc sử công tác</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div id="sampleTable_wrapper"
                             class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <form action="admin/nhansu/lich-su-cong-tac" method="post">
                                        @csrf
                                        <div id="sampleTable_filter" class="dataTables_filter"><label>Search:
                                                <input type="search" class="form-control form-control-sm" name="id"
                                                       placeholder="ID" aria-controls="sampleTable"></label></div>
                                    </form>
                                </div>
                            </div>
                            {{--@if(session('thongbao'))--}}
                            {{--<div class="alert alert-success">--}}
                            {{--{{session('thongbao')}}--}}
                            {{--</div>--}}
                            {{--@endif--}}
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-hover table-bordered dataTable no-footer" id="sampleTable"
                                           role="grid" aria-describedby="sampleTable_info">
                                        <thead>
                                        <tr role="row" style="background-color: #009688;color: white">
                                            <th class="sorting_asc" tabindex="0" aria-controls="sampleTable" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width:10px;">ID
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 110px;">Họ tên
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1"
                                                colspan="1" aria-label="Office: activate to sort column ascending"
                                                style="width: 60px;">Vị trí
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1"
                                                colspan="1" aria-label="Age: activate to sort column ascending"
                                                style="width: 70px;">Phòng ban
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 70px;">Ngày vào làm
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 70px;">Ngày kết thúc
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 70px;">Số năm làm việc
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($nhansu as $ns)
                                            <tr>
                                                <td>{{$ns->id}}</td>
                                                <td>{{$ns->ho_ten}}</td>
                                                <td>{{$ns->ten_vi_tri}}</td>
                                                <td>{{$ns->ten_phong}}</td>
                                                <td>{{$ns->ngay_lam}}</td>
                                                <td>{{$ns->ngay_ket_thuc}}</td>
                                                <td>{{$ns->so_nam_lam_viec}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <div class="dataTables_paginate paging_simple_numbers" id="sampleTable_paginate">
                                        <ul class="pagination">
                                            <li class="paginate_button page-item previous disabled"
                                                id="sampleTable_previous">
                                                <a href="#" aria-controls="sampleTable" data-dt-idx="0" tabindex="0"
                                                   class="page-link">Previous</a>
                                            </li>
                                            <li class="paginate_button page-item active">
                                                <a href="#" aria-controls="sampleTable" data-dt-idx="1" tabindex="0"
                                                   class="page-link">1</a>
                                            </li>
                                            <li class="paginate_button page-item ">
                                                <a href="#" aria-controls="sampleTable" data-dt-idx="2" tabindex="0"
                                                   class="page-link">2</a>
                                            </li>
                                            <li class="paginate_button page-item ">
                                                <a href="#" aria-controls="sampleTable" data-dt-idx="3" tabindex="0"
                                                   class="page-link">3</a>
                                            </li>
                                            <li class="paginate_button page-item ">
                                                <a href="#" aria-controls="sampleTable" data-dt-idx="4" tabindex="0"
                                                   class="page-link">4</a>
                                            </li>
                                            <li class="paginate_button page-item ">
                                                <a href="#" aria-controls="sampleTable" data-dt-idx="5" tabindex="0"
                                                   class="page-link">5</a>
                                            </li>
                                            <li class="paginate_button page-item ">
                                                <a href="#" aria-controls="sampleTable" data-dt-idx="6" tabindex="0"
                                                   class="page-link">6</a>
                                            </li>
                                            <li class="paginate_button page-item next" id="sampleTable_next">
                                                <a href="#" aria-controls="sampleTable" data-dt-idx="7" tabindex="0"
                                                   class="page-link">Next</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!---->
    <!---->
@stop
