
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
                <li class="breadcrumb-item"><a href="{{route('admin.trangchu')}}"><i class="fa fa-home fa-lg"></i></a></li>
                <li class="breadcrumb-item"><a href="{{route('admin.get.index.nhansu')}}">Nhân sự</a></li>
                <li class="breadcrumb-item"><a href="">Xin nghỉ</a></li>

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
                                    <form action="" method="post">
                                        @csrf
                                        <div id="sampleTable_filter" class="dataTables_filter"><label>Search:
                                                <input type="search" class="form-control form-control-sm" name="id"
                                                       placeholder="ID" aria-controls="sampleTable"></label></div>
                                    </form>
                                </div>
                                <div class="col-sm-12 col-md-1 pl-md-0 text-center">
                                    <a href="{{route('admin.get.them.xinnghi')}}" class="btn btn-sm btn-info">Thêm mới</a>
                                </div>
                            </div>
                            @if(session('thongbao'))
                                <div class="alert alert-success text-center">
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
                                                style="width:10px;">ID
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 150px;">Họ tên
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1"
                                                colspan="1" aria-label="Office: activate to sort column ascending"
                                                style="width: 60px;">Số buổi nghỉ
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1"
                                                colspan="1" aria-label="Age: activate to sort column ascending"
                                                style="width: 100px;">Thời gian nghỉ
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 70px;">Chuyển tới ai
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 50px;">Loại nghỉ
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 50px;">Phê duyệt
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($nhansu as $ns)
                                            <tr>
                                                <td>{{$ns->id_nhan_su}}</td>
                                                <td>{{$ns->ho_ten}}</td>
                                                <td>{{$ns->so_buoi_nghi}}</td>
                                                <td>{{$ns->thoi_gian_nghi}}</td>
                                                <td>{{$ns->chuyen_toi_ai}}</td>
                                                <td>{{$ns->loai_nghi}}</td>
                                                <td class="text-center">
                                                    @if(($ns->phe_duyet) === 1)
                                                        <a class="badge badge-success" style="color: white">Đã phê duyệt</a>
                                                        <br>
                                                    @else
                                                        <a href="admin/xinnghi/phe-duyet/{{$ns->id}}"
                                                           class="badge badge-success">Phê duyệt</a><br>
                                                    @endif
                                                    <nav class="navbar navbar-expand-lg navbar-light p-0">
                                                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                                            <ul class="navbar-nav ml-auto mr-auto">
                                                                <li class="nav-item active">
                                                                    <a href="admin/xinnghi/sua/{{$ns->id}}"
                                                                       class="badge badge-warning">Sửa</a>
                                                                </li>
                                                                <li class="nav-item mr-1 ml-1">
                                                                    <a href="admin/xinnghi/xoa/{{$ns->id}}"
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

