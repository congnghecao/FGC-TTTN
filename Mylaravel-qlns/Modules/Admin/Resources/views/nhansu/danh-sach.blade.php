
@extends('admin::layouts.master')

@section('content')
    <!---->
    <!--Main main-->
    <main class="app-content">
        <div class="app-title">
            <div class="row">

                <h1><i class="app-menu__icon fa fa-laptop"></i> Quản lý Nhân sự</h1>


            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.trangchu')}}"><i class="fa fa-home fa-lg"></i></a>
                </li>
                <li class="breadcrumb-item"><a href="">Nhân sự</a></li>

            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div id="sampleTable_wrapper"
                             class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="dataTables_length" id="sampleTable_length"><label>Show <select
                                                    name="sampleTable_length" aria-controls="sampleTable"
                                                    class="form-control form-control-sm">
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select> entries</label></div>
                                </div>
                                <div class="col-sm-12 col-md-5">
                                    <div id="sampleTable_filter" class="dataTables_filter"><label>Search:<input
                                                    type="search" class="form-control form-control-sm" placeholder=""
                                                    aria-controls="sampleTable"></label></div>
                                </div>
                                <div class="col-sm-12 col-md-1 pl-md-0 text-center">
                                    <a href="{{route('admin.get.them.nhansu')}}" class="btn btn-sm btn-info">Thêm mới</a>
                                </div>
                            </div>
                            @if(session('thongbao'))
                                <div class="alert alert-success">
                                    {{session('thongbao')}}
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-hover table-bordered dataTable no-footer" id="sampleTable"
                                           role="grid" aria-describedby="sampleTable_info">
                                        <thead>
                                        <tr role="row" style="background-color: #009688;color: white">
                                            <th class="sorting_asc" tabindex="0" aria-controls="sampleTable" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 20px;">ID
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 110px;">Họ tên
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1"
                                                colspan="1" aria-label="Office: activate to sort column ascending"
                                                style="width: 70px;">Ngày sinh
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1"
                                                colspan="1" aria-label="Age: activate to sort column ascending"
                                                style="width: 80px;">Nơi thường trú
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1"
                                                colspan="1" aria-label="Start date: activate to sort column ascending"
                                                style="width: 50px;">CMND
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 70px;">Ngày vào làm
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 60px;">Số năm công tác
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 110px;">Vị trí - Phòng ban
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 80px;">Thực hiện
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($nhansu as $ns)
                                            <tr>
                                                <td>{{$ns->id}}</td>
                                                <td>{{$ns->ho_ten}}</td>
                                                <td>{{$ns->ngay_sinh}}</td>
                                                <td>{{$ns->noi_thuong_tru}}</td>
                                                <td>{{$ns->cmnd}}</td>
                                                <td>{{$ns->ngay_vao}}</td>
                                                <td>{{$ns->so_nam_cong_tac}}</td>
                                                <td>
                                                    @foreach($lamviec as $lv)
                                                        {{$lv->ten_vi_tri." - ".$lv->ten_phong}}
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <nav class="navbar navbar-expand-lg navbar-light pl-0 pr-0">
                                                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                                            <ul class="navbar-nav ml-auto mr-auto">
                                                                <li class="nav-item active">
                                                                    <a href="{{route('admin.get.sua.nhansu',$ns->id)}}"
                                                                       class="badge badge-warning">Sửa</a>
                                                                </li>
                                                                <li class="nav-item mr-1 ml-1">
                                                                    <a href="{{route('admin.get.xoa.nhansu',$ns->id)}}"
                                                                       class="badge badge-danger">Xóa</a>
                                                                </li>
                                                                <li class="nav-item dropdown">
                                                                <span class="badge badge-pill badge-dark" id="dropdown"
                                                                      data-toggle="dropdown" aria-haspopup="true"
                                                                      aria-expanded="false">!</span>
                                                                    <div class="dropdown-menu" aria-labelledby="dropdown">
                                                                        <h6 class="dropdown-header text-center"
                                                                            style="color: black;font-weight: bold">{{$ns->id."_".$ns->ho_ten}}</h6>
                                                                        <hr width="50%" color="black" class="mt-1 mb-0">
                                                                        <p class="dropdown-item d-flex align-items-center small text-gray-500 m-0 pb-0">
                                                                            <b>- Thời gian học việc: </b>
                                                                            @if($ns->ngay_hoc_viec !== null)
                                                                                {{'__Từ '.$ns->ngay_hoc_viec.' '}}
                                                                            @endif
                                                                            @if($ns->ngay_kt_hoc_viec !== null)
                                                                                {{'đến '.$ns->ngay_kt_hoc_viec}}
                                                                            @endif
                                                                        </p>
                                                                        <p class="dropdown-item d-flex align-items-center small text-gray-500 m-0 pb-0 pt-0">
                                                                            <b>- Thời gian thử việc:</b>
                                                                            @if($ns->ngay_thu_viec !== null)
                                                                                {{'__Từ '.$ns->ngay_thu_viec.' '}}
                                                                            @endif
                                                                            @if($ns->ngay_kt_thu_viec !== null)
                                                                                {{'đến '.$ns->ngay_kt_thu_viec}}
                                                                            @endif
                                                                        </p>
                                                                        <p class="dropdown-item d-flex align-items-center small text-gray-500 m-0 pb-0 pt-0">
                                                                            <b>- Thời gian làm chính thức:</b>
                                                                            @if($ns->ngay_lam_chinh_thuc !== null)
                                                                                {{'__Từ '.$ns->ngay_lam_chinh_thuc.' '}}
                                                                            @endif
                                                                            @if($ns->ngay_lam_ket_thuc !== null)
                                                                                {{' đến'.$ns->ngay_lam_ket_thuc}}
                                                                            @endif
                                                                        </p>
                                                                        @foreach($lamviec as $lv)
                                                                            <p class="dropdown-item d-flex align-items-center small text-gray-500 m-0 pb-0 pt-0">
                                                                                <b class="mr-1">- Vị
                                                                                    trí: </b>{{$lv->ten_vi_tri}}
                                                                                <b>__</b>{{$lv->ten_phong}}
                                                                                <b class="ml-3">Thời gian làm:</b>
                                                                                @if($lv->ngay_lam !== null)
                                                                                    {{'__Từ '.$lv->ngay_lam.' '}}
                                                                                @endif
                                                                                @if($lv->ngay_ket_thuc !== null)
                                                                                    {{' đến'.$lv->ngay_ket_thuc}}
                                                                                @endif
                                                                            </p>
                                                                        @endforeach
                                                                        <a class="dropdown-item text-center small"
                                                                           style="color: #0c5460"
                                                                           href="admin/nhansu/lich-su-cong-tac/{{$ns->id}}">
                                                                            xem lịch sử công tác</a>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </nav>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <div class="dataTables_info" id="sampleTable_info" role="status" aria-live="polite">
                                        Showing 1 to 10 of 57 entries
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-7">
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

