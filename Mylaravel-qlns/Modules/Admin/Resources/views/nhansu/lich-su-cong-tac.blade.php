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
                <li class="breadcrumb-item"><a href="{{route('admin.trangchu')}}"><i class="fa fa-home fa-lg"></i></a>
                </li>
                <li class="breadcrumb-item"><a href="{{route('admin.get.index.nhansu','10')}}">Nhân sự</a></li>
                <li class="breadcrumb-item"><a href="">Lịc sử công tác</a></li>
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
                                        <div class="dataTables_filter text-left">
                                            <form id="search" action="admin/nhansu/lich-su-cong-tac/{{$page}}"
                                                  method="post">
                                                @csrf
                                                <input value="{{$id}}" type="search"
                                                       class="form-control form-control-sm"
                                                       title="Mời nhật ID nhân sự."
                                                       name="id" placeholder="ID" aria-controls="sampleTable">
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
                                            <div class="modal-content" style="width: 40%">
                                                <div class="modal-header pt-0 pb-0">
                                                    <h3>Thêm chức vụ mới</h3>
                                                    <span class="close-them">&times;</span>
                                                </div>
                                                <div class="modal-body pb-0">
                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <label class="control-label" for="phongban">Phòng
                                                                ban</label>
                                                            <span class="erro pl-1">*</span>
                                                            <select class="form-control" id="phongban"
                                                                    name="phongban">
                                                                @foreach($phongban as $pb)
                                                                    <option value="{{$pb->id}}">{{$pb->ten_phong}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="control-label" for="vitri">Vị trí</label>
                                                            <span class="erro pl-1">*</span>
                                                            <select class="form-control" id="vitri" name="vitri">
                                                                @foreach($vitri as $vt)
                                                                    <option value="{{$vt->id}}">{{$vt->ten_vi_tri}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="text-center">
                                                        <span class="erro" id="erroThem"></span><span
                                                                class="alert-success" id="okThem"></span><br>
                                                        <button class="btn btn-primary mt-1" id="themChucvu"
                                                                value="{{$id}}">
                                                            <i class="fa fa-fw fa-lg fa-check-circle"></i>Thêm mới
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if(session('thongbao'))
                                <div class="text-center alert alert-success mb-1 mt-1 p-1">
                                    {{session('thongbao')}}
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-hover table-bordered dataTable no-footer" id="sampleTable"
                                           role="grid" aria-describedby="sampleTable_info">
                                        <thead>
                                        <tr role="row" class="text-center" style="background: #009688;color: white">
                                            <th class="sorting_asc" tabindex="0" aria-controls="sampleTable" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending">STT
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending">
                                                Họ tên
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1"
                                                colspan="1" aria-label="Office: activate to sort column ascending"
                                                style="width: 60px;">Vị trí
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1"
                                                colspan="1" aria-label="Age: activate to sort column ascending">
                                                Phòng ban
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending">
                                                Ngày vào làm
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending">
                                                Ngày kết thúc
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending">
                                                Thời gian làm việc
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending">
                                                Thực hiện
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($nhansu as $ns)
                                            <tr>
                                                <td class="text-center">{{$stt++}}</td>
                                                <td>{{$ns->ho_ten}}</td>
                                                <td class="text-center">{{$ns->ten_vi_tri}}</td>
                                                <td class="text-center">{{$ns->ten_phong}}</td>
                                                <td class="text-center">{{$ns->ngay_lam}}</td>
                                                <td class="text-center">
                                                    @if($ns->ngay_ket_thuc !== '0')
                                                        {{$ns->ngay_ket_thuc}}
                                                    @endif
                                                </td>
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
                                                <td class="text-center">
                                                    <a class="btn btn-suaCV badge badge-warning"
                                                       style="margin-right: -3px" title="Sửa"
                                                       id="{{$ns->id}}">Sửa</a>
                                                    @if(Auth::user()->name === 'Admin')
                                                        <a href="admin/nhansu/xoa-chuc-vu/{{$ns->id}}" title="Xóa"
                                                           class="btn badge badge-danger">Xóa</a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @if(Auth::user()->name === 'Admin')
                                <div class="row">
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-12">
                                        <div class="dataTables_length text-left">
                                            <label>Hiển thị: <select name="pageLichSu" id="{{$id}}"
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
                                                </select></label></div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-12">
                                        <div class="dataTables_paginate paging_simple_numbers"
                                             id="sampleTable_paginate">
                                            <ul class="pagination">
                                                <li class="paginate_button page-item previous active">
                                                    {{$nhansu->links()}}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- The Modal -->
        <div class="data-modal">
            <div id="suaModal" class="modal">
                <!-- Nội dung form đăng nhập -->
                <div class="modal-content" style="width: 40%">
                    <div class="modal-header pt-0 pb-0">
                        <h3>Cập nhật chức vụ nhân sự</h3>
                        <span class="close-sua">&times;</span>
                    </div>
                    <div class="modal-body pb-0" id="data-sua">
                        {{--data-ajax--}}
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!---->
    <!---->
@stop
