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
                                <div class="col-sm-12 col-md-11">
                                    <div id="sampleTable_filter" class="dataTables_filter text-left">
                                        <form id="search" action="admin/nhansu/lich-su-cong-tac" method="post">
                                            @csrf
                                            <input value="{{$id}}" type="search" class="form-control form-control-sm"
                                                   name="id" placeholder="ID" aria-controls="sampleTable">
                                            <button class="btn btn-sm btn-primary" type="submit">Tìm kiếm</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-1 pl-md-0 data-modal">
                                    {{--admin/nhansu/them--}}
                                    <a class="btn btn-sm btn-info text-center btn-them mb-2" style="color: white">
                                        Thêm mới</a>
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
                                                aria-label="Name: activate to sort column descending"
                                                style="width:10px;">STT
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
                                                style="width: 50px;">Thời gian làm việc
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 50px;">Thực hiện
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($nhansu as $ns)
                                            <tr>
                                                <td class="text-center">{{$stt++}}</td>
                                                <td>{{$ns->ho_ten}}</td>
                                                <td>{{$ns->ten_vi_tri}}</td>
                                                <td>{{$ns->ten_phong}}</td>
                                                <td>{{$ns->ngay_lam}}</td>
                                                <td>
                                                    @if($ns->ngay_ket_thuc !== '0')
                                                        {{$ns->ngay_ket_thuc}}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($ns->thang !== 0 && $ns->thang != '')
                                                        {{$ns->thang.' Tháng'}}
                                                    @elseif($ns->nam !== 0 && $ns->nam != '')
                                                        {{$ns->nam.' Năm'}}
                                                    @elseif(date("Y")-date("Y",strtotime($ns->ngay_lam)) > 0)
                                                        {{date("Y")-date("Y",strtotime($ns->ngay_lam)).' Năm '}}
                                                    @elseif(date("m")-date("m",strtotime($ns->ngay_lam))>0)
                                                        {{date("m")-date("m",strtotime($ns->ngay_lam)).' Tháng'}}
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <a class="btn btn-suaCV badge badge-warning"
                                                       id="{{$ns->id}}">Sửa</a>
                                                    <a href="admin/nhansu/xoa-chuc-vu/{{$ns->id}}/{{$id}}"
                                                       class="btn badge badge-danger">Xóa</a>
                                                </td>
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
