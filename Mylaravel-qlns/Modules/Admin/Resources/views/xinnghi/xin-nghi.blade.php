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
                <li class="breadcrumb-item"><a href="{{route('admin.get.index.nhansu','10')}}">Nhân sự</a></li>
                <li class="breadcrumb-item"><a href="">Xin nghỉ</a></li>

            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div id="sampleTable_wrapper"
                             class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                            @if(Auth::user()->name === 'Admin')
                                <div class="row">
                                    <div class="col-sm-9 col-md-9 col-lg-9 col-9">
                                        <div id="sampleTable_filter" class="dataTables_filter text-left">
                                            <form id="search" action="admin/xinnghi/index/{{$page}}" method="post">
                                                @csrf
                                                <input value="{{$id}}" type="search"
                                                       class="form-control form-control-sm m-0" name="id"
                                                       placeholder="Nhập ID" aria-controls="sampleTable"
                                                       title="Mời nhật ID nhân sự.">
                                                <button class="btn btn-sm btn-primary" type="submit">Tìm kiếm</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-md-3 col-3 col-lg-3 data-modal">
                                        <div class="dataTables_filter">
                                            <a class="btn btn-sm btn-info btn-them" style="color: white">Thêm
                                                mới</a>
                                        </div>
                                        <!-- The Modal -->
                                        <div id="themModal" class="modal">
                                            <!-- Nội dung modal -->
                                            <div class="modal-content" style="width: 50%">
                                                <div class="modal-header pt-0 pb-0">
                                                    <h3>Thêm mới đơn xin nghỉ</h3>
                                                    <span class="close-them">&times;</span>
                                                </div>
                                                <div class="modal-body pb-0">
                                                    <form id="themXN" action="admin/xinnghi/them" method="post">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="form-group col-md-6">
                                                                <label class="control-label">Mã nhân sự</label>
                                                                <span class="erro pl-1">*</span>
                                                                <input disabled class="form-control" type="text"
                                                                       placeholder="vd: 1"
                                                                       name="id_nhan_su" value="{{$id}}">
                                                                <span class="erro erroIDns"></span>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label class="control-label">Số buổi nghỉ</label>
                                                                <span class="erro pl-1">*</span>
                                                                <input class="form-control" type="number" name="sbn"
                                                                       placeholder="vd: 1">
                                                                <span class="erro erroSbn"></span>
                                                            </div>
                                                            <h6 class="text-center col-md-12">----- Thời gian nghỉ
                                                                -----</h6>
                                                            <div class="form-group col-md-6">
                                                                <label class="control-label">Ngày bắt đầu</label>
                                                                <span class="erro pl-1">*</span>
                                                                <input class="form-control" type="date" name="nbd">
                                                                <span class="erro erroNbd"></span>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label class="control-label">Ngày kết thúc</label>
                                                                <input class="form-control" type="date" name="nkt">
                                                                <span class="erro erroNkt"></span>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label class="control-label">Lý do nghỉ</label>
                                                                <span class="erro pl-1">*</span>
                                                                <textarea class="form-control" rows="2"
                                                                          name="ldn" placeholder="..."></textarea>
                                                                <span class="erro erroLdn"></span>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label class="control-label" for="vitri">Vị trí</label>
                                                                <span class="erro pl-1">*</span>
                                                                <select class="form-control" id="vitri" name="vitri">
                                                                    @foreach($vitri as $vt)
                                                                        <option value="{{$vt->ten_vi_tri}}">{{$vt->ten_vi_tri}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label class="control-label" for="loainghi">Loại
                                                                    nghỉ</label>
                                                                <span class="erro pl-1">*</span>
                                                                <select class="form-control" id="loainghi"
                                                                        name="loainghi">
                                                                    <option value="Nghỉ ngày">Nghỉ ngày</option>
                                                                    <option value="Nghỉ phép">Nghỉ phép</option>
                                                                    <option value="Nghỉ việc">Nghỉ việc</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group col-md-4">
                                                                <label class="control-label" for="tt">Phê duyệt</label>
                                                                <span class="erro pl-1">*</span>
                                                                <select class="form-control" id="tt" name="tt">
                                                                    <option value="1">Đã phê duyệt</option>
                                                                    <option value="0">Chưa phê duyệt</option>
                                                                </select>
                                                            </div>
                                                            <hr color="#e9ecef" class="m-0" width="100%">
                                                            <div class="col-md-6">
                                                                <span class="erro">Chú ý: Trường * không được để trống !</span>
                                                            </div>
                                                            <div class="text-right col-md-6">
                                                                <button class="btn btn-primary mt-1" id="themXN">
                                                                    <i class="fa fa-fw fa-lg fa-check-circle"></i>Thêm
                                                                    mới
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if(session('thongbao'))
                                <div class="alert alert-success text-center mb-1 mt-1 p-1">
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
                                                aria-label="Name: activate to sort column descending"
                                                style="width:10px;">STT
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 150px;">Họ tên
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1"
                                                colspan="1" aria-label="Office: activate to sort column ascending"
                                                style="width: 80px;">Số buổi nghỉ
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1"
                                                colspan="1" aria-label="Age: activate to sort column ascending"
                                                style="width: 100px;">Thời gian nghỉ
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1"
                                                colspan="1" aria-label="Age: activate to sort column ascending"
                                                style="width: 110px;">Lý do
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 90px;">Chuyển tới ai
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 60px;">Loại nghỉ
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 60px;">Phê duyệt
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($nhansu as $ns)
                                            <tr>
                                                <td class="text-center">{{$stt++}}</td>
                                                <td>{{$ns->ho_ten}}</td>
                                                <td class="text-center">{{$ns->so_buoi_nghi}}</td>
                                                <td>{{'Từ '.$ns->ngay_bat_dau.' đến '.$ns->ngay_ket_thuc}}</td>
                                                <td>{{$ns->ly_do}}</td>
                                                <td>{{$ns->chuyen_toi_ai}}</td>
                                                <td>{{$ns->loai_nghi}}</td>
                                                <td class="text-center">
                                                    <nav class="navbar navbar-expand-lg navbar-light pl-0 pr-0">
                                                        <div class="collapse navbar-collapse"
                                                             id="navbarSupportedContent">
                                                            <ul class="navbar-nav ml-auto mr-auto">
                                                                <li class="nav-item dropdown" title="Chi tiết">
                                                                <span class="btn badge badge-pill badge-dark chi-tiet"
                                                                      data-toggle="dropdown"
                                                                      aria-haspopup="true" value="{{$ns->id_nhan_su}}"
                                                                      aria-expanded="false">@</span>
                                                                    {{--dropdown-menu--}}
                                                                    <div class="dropdown-menus data-chitiet{{$ns->id_nhan_su}}"
                                                                         aria-labelledby="dropdown"></div>
                                                                </li>
                                                                <li class="nav-item active" title="Sửa">
                                                                    <a class="btn btn-suaXN badge badge-warning"
                                                                       value="{{$ns->id}}">Sửa</a>
                                                                </li>
                                                                @if(Auth::user()->name === 'Admin')
                                                                    <li class="nav-item" title="Xóa">
                                                                        <a href="admin/xinnghi/xoa/{{$ns->id}}"
                                                                           class="btn badge badge-danger">Xóa</a>
                                                                    </li>
                                                                    @if(($ns->phe_duyet) === 0)
                                                                        <li class="nav-item" title="Phê duyệt">
                                                                            <a href="admin/xinnghi/phe-duyet/{{$ns->id}}/{{$ns->id_nhan_su}}/{{$page}}"
                                                                               class="btn badge badge-success">
                                                                                <i style="font-size: 9px"
                                                                                   class="fa fa-check"></i>
                                                                            </a><br>
                                                                        </li>
                                                                    @endif
                                                                @endif
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
                                    <div id="sampleTable_filter" class="dataTables_filter text-left">
                                        <div class="dataTables_length text-left">
                                            <label>Hiển thị: <select name="pageXinNghi" id="{{$id}}"
                                                                     aria-controls="sampleTable"
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
                                                </select>
                                            </label>
                                        </div>
                                    </div>
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
            <div class="modal-content" style="width: 50%">
                <div class="modal-header pt-0 pb-0">
                    <h3>Cập nhật đơn xin nghỉ</h3>
                    <span class="close-sua">&times;</span>
                </div>
                <div class="modal-body pb-0" id="data-sua">
                    {{--data-ajax--}}
                </div>
            </div>
        </div>
    </div>
@stop

