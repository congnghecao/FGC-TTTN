@extends('admin::layouts.master')

@section('content')
    <!---->
    <!--Main main-->
    <main class="app-content">
        <div class="app-title">
            <div class="row">
                <h1><i class="app-menu__icon fa fa-laptop"></i>Quản lý Nhân sự</h1>
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
                                <div class="col-sm-9 col-md-9 col-lg-9 col-9">
                                    <div class="dataTables_filter text-left">
                                        <form action="admin/nhansu/danh-sach/{{$page}}" method="post">
                                            @csrf
                                            <input type="search" class="form-control form-control-sm m-0"
                                                   title="Mời nhật ID nhân sự."
                                                   placeholder="Nhập ID" aria-controls="sampleTable" name="id">
                                            <button class="btn btn-sm btn-primary" type="submit">Tìm kiếm</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-md-3 col-3 col-lg-3 data-modal">
                                    {{--admin/nhansu/them--}}
                                    <div class="dataTables_filter">
                                        <a class="btn btn-sm btn-info btn-them" style="color: white">Thêm
                                            mới</a>
                                    </div>
                                    <!-- The Modal -->
                                    <div id="themModal" class="modal">
                                        <!-- Nội dung modal -->
                                        <div class="modal-content">
                                            <div class="modal-header pt-0 pb-0">
                                                <h3>Thêm nhân sự mới</h3>
                                                <span class="close-them">&times;</span>
                                            </div>
                                            <div class="modal-body pb-0">
                                                <form id="themNS" action="admin/nhansu/them" method="post">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label">Họ tên</label>
                                                                <span class="erro pl-1">*</span>
                                                                <input id="hoten" autocomplete="true"
                                                                       class="form-control"
                                                                       type="text" placeholder="VD: Nguyễn Xuân Hạnh"
                                                                       name="hoten">
                                                                <span class="erro erroHoten"></span>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-7">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Ngày sinh</label>
                                                                        <span class="erro pl-1">*</span>
                                                                        <input class="form-control" type="date"
                                                                               name="ngaysinh"
                                                                               placeholder="22/07/1997">
                                                                        <span class="erro erroNgaysinh"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-5">
                                                                    <div class="form-group">
                                                                        <label class="control-label">CMND</label>
                                                                        <span class="erro pl-1">*</span>
                                                                        <input class="form-control"
                                                                               placeholder="187701990"
                                                                               name="cmnd">
                                                                        <span class="erro erroCmnd"></span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label">Nơi thường trú</label>
                                                                <span class="erro pl-1">*</span>
                                                                <textarea class="form-control" rows="4" name="ntt"
                                                                          placeholder="VD: Khối/xóm - phường/xã - Tỉnh/Thành phố"></textarea>
                                                                <span class="erro erroNtt"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="row">
                                                                <div class="form-group col-md-6">
                                                                    <label class="control-label" for="phongban">
                                                                        Phòng ban</label>
                                                                    <span class="erro pl-1">*</span>
                                                                    <select class="form-control" id="phongban"
                                                                            name="phongban" multiple>
                                                                        @foreach($phongban as $pb)
                                                                            <option value="{{$pb->id}}">{{$pb->ten_phong}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <span class="erro erroPhongban"></span>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label class="control-label" for="vitri">Vị
                                                                        trí</label>
                                                                    <span class="erro pl-1">*</span>
                                                                    <select class="form-control" id="vitri" name="vitri"
                                                                            multiple>
                                                                        @foreach($vitri as $vt)
                                                                            <option value="{{$vt->id}}">{{$vt->ten_vi_tri}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <span class="erro erroVitri"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <h6 class="text-center mt-2">
                                                                <mark>----- Thời gian học việc
                                                                    -----
                                                                </mark>
                                                            </h6>
                                                            <div class="row">
                                                                <div class="form-group col-md-6"
                                                                     style="padding-right: 1px">
                                                                    <label class="control-label">Ngày bắt đầu</label>
                                                                    <input class="form-control" type="date"
                                                                           name="ngayhv"
                                                                           placeholder="22/07/1997">
                                                                </div>
                                                                <div class="form-group col-md-6"
                                                                     style="padding-left: 1px">
                                                                    <label class="control-label">Ngày kết thúc</label>
                                                                    <input class="form-control" disabled="disabled"
                                                                           type="date"
                                                                           name="ngaykthv"
                                                                           placeholder="22/07/1997">
                                                                </div>
                                                                <span class="col-md-12 erro erroNgaykthv"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <h6 class="text-center mt-2">
                                                                <mark>----- Thời gian thử việc
                                                                    -----
                                                                </mark>
                                                            </h6>
                                                            <div class="row">
                                                                <div class="form-group col-md-6"
                                                                     style="padding-right: 1px">
                                                                    <label class="control-label">Ngày bắt đầu</label>
                                                                    <input class="form-control" type="date"
                                                                           name="ngaytv"
                                                                           placeholder="22/07/1997">
                                                                </div>
                                                                <div class="form-group col-md-6"
                                                                     style="padding-left: 1px">
                                                                    <label class="control-label">Ngày kết thúc</label>
                                                                    <input class="form-control" disabled="disabled"
                                                                           type="date"
                                                                           name="ngaykttv"
                                                                           placeholder="22/07/1997">
                                                                </div>
                                                                <span class="col-md-12 erro erroNgaykttv"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <h6 class="text-center mt-2">
                                                                <mark> ----- Thời gian làm chính thức
                                                                    -----
                                                                </mark>
                                                            </h6>
                                                            <div class="row">
                                                                <div class="form-group col-md-6"
                                                                     style="padding-right: 1px">
                                                                    <label class="control-label">Ngày bắt đầu</label>
                                                                    <input class="form-control" type="date"
                                                                           name="ngaylct"
                                                                           placeholder="22/07/1997">
                                                                </div>
                                                                <div class="form-group col-md-6"
                                                                     style="padding-left: 1px">
                                                                    <label class="control-label">Ngày kết thúc</label>
                                                                    <input class="form-control" disabled="disabled"
                                                                           type="date"
                                                                           name="ngaylkt"
                                                                           placeholder="22/07/1997">
                                                                </div>
                                                                <span class="col-md-12 erro erroNgaylkt"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row tile-footer pt-0">
                                                        <div class="col-md-6">
                                                            <span class="erro">Chú ý: Trường * không được để trống !</span>
                                                        </div>
                                                        <div class="col-md-6 text-right">
                                                            <button class="btn btn-primary mt-1">
                                                                <i class="fa fa-fw fa-lg fa-check-circle"></i>Thêm mới
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if(session('thongbao'))
                                <div class="text-center alert alert-success">
                                    {{session('thongbao')}}
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-hover table-bordered dataTable no-footer" id="sampleTable"
                                           role="grid" aria-describedby="sampleTable_info">
                                        <thead>
                                        <tr role="row" class="text-center"
                                            style="background-color: #009688;color: white">
                                            <th class="sorting_asc" tabindex="0" aria-controls="sampleTable" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending">ID
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending">
                                                Họ tên
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1"
                                                colspan="1" aria-label="Office: activate to sort column ascending">
                                                Ngày sinh
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1"
                                                colspan="1" aria-label="Start date: activate to sort column ascending">
                                                CMND
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending">
                                                Ngày vào làm
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending">
                                                Thời gian làm việc
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending">
                                                Chức vụ
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending">
                                                Thực hiện
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($nhansu as $ns)
                                            <tr class="abc">
                                                <td class="text-center">{{$ns->id}}</td>
                                                <td>{{$ns->ho_ten}}</td>
                                                <td class="text-center">{{$ns->ngay_sinh}}</td>
                                                {{--<td>{{$ns->noi_thuong_tru}}</td>--}}

                                                <td class="text-center">{{$ns->cmnd}}</td>
                                                <td class="text-center">{{$ns->ngay_vao}}</td>
                                                <td class="text-center">
                                                    @if($ns->ngayct !== null)
                                                        @if($ns->ngayct < 365 && $ns->ngayct >= 30)
                                                            {{FLOOR($ns->ngayct/30).' Tháng'}}
                                                            @if($ns->ngayct%30 > 0)
                                                                {{' '. ($ns->ngayct%30).' Ngày'}}
                                                            @endif
                                                        @elseif($ns->ngayct >= 365)
                                                            {{FLOOR($ns->ngayct/365).' Năm'}}
                                                            @if($ns->ngayct%365 >= 30)
                                                                {{' '. FLOOR(($ns->ngayct%365)/30).' Tháng'}}
                                                            @endif
                                                        @endif
                                                    @else
                                                        @if($ns->ngayht < 365 && $ns->ngayht >= 30)
                                                            {{FLOOR($ns->ngayht/30).' Tháng'}}
                                                            @if($ns->ngayct%30 > 0)
                                                                {{' '. ($ns->ngayct%30).' Ngày'}}
                                                            @endif
                                                        @elseif($ns->ngayht >= 365)
                                                            {{FLOOR($ns->ngayht/365).' Năm'}}
                                                            @if($ns->ngayht%365 >= 30)
                                                                {{' '. FLOOR(($ns->ngayht%365)/30).' Tháng'}}
                                                            @endif
                                                        @endif
                                                    @endif
                                                </td>
                                                <td>
                                                    @foreach($lamviec as $lv)
                                                        @if($lv->id === $ns->id)
                                                            {{'- '.$lv->ten_vi_tri.' '.$lv->ten_phong}}<br>
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td class="abc">
                                                    <nav class="navbar navbar-expand-lg navbar-light pl-0 pr-0">
                                                        <div class="collapse navbar-collapse"
                                                             id="navbarSupportedContent">
                                                            <ul class="navbar-nav ml-auto mr-auto">
                                                                <li class="nav-item">
                                                                    <a class="btn btn-suaNS badge badge-warning"
                                                                       value="{{$ns->id}}">Sửa</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a href="admin/nhansu/xoa/{{$ns->id}}"
                                                                       class="btn badge badge-danger">Xóa</a>
                                                                </li>
                                                                <li class="nav-item dropdown">
                                                                <span class="btn badge badge-pill badge-dark chi-tiet"
                                                                      data-toggle="dropdown"
                                                                      aria-haspopup="true" value="{{$ns->id}}"
                                                                      aria-expanded="false">!</span>
                                                                    <div class="dropdown-menus data-chitiet{{$ns->id}}"
                                                                         aria-labelledby="dropdown">
                                                                        {{--ajax data--}}
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
                                <div class="col-sm-12 col-md-6 col-lg-6 col-12">
                                    <div class="dataTables_length text-left">
                                        <label>Hiển thị: <select name="pageNhanSu" aria-controls="sampleTable"
                                                                 class="form-control form-control-sm">
                                                @if($page == 10)
                                                    <option selected value="10">10</option>
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                @elseif($page == 25)
                                                    <option value="10">10</option>
                                                    <option selected value="25">25</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                @elseif($page == 50)
                                                    <option value="10">10</option>
                                                    <option value="25">25</option>
                                                    <option selected value="50">50</option>
                                                    <option value="100">100</option>
                                                @elseif($page == 100)
                                                    <option value="10">10</option>
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                    <option selected value="100">100</option>
                                                @endif
                                            </select></label></div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6 col-12">
                                    <div class="dataTables_paginate paging_simple_numbers" id="sampleTable_paginate">
                                        <ul class="pagination">
                                            <li class="paginate_button page-item previous active">
                                                {{$nhansu->links()}}
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
    <!-- The Modal -->
    <div class="data-modal">
        <div id="suaModal" class="modal">
            <!-- Nội dung form đăng nhập -->
            <div class="modal-content">
                <div class="modal-header pt-0 pb-0">
                    <h3>Cập nhật thông tin nhân sự</h3>
                    <span class="close-sua">&times;</span>
                </div>
                <div class="modal-body pb-0" id="data-sua">
                    {{--data-ajax--}}
                </div>
            </div>
        </div>
    </div>
@stop