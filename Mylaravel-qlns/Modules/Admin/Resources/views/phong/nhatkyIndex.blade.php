@extends('admin::layouts.master')

@section('content')
    <!---->
    <main class="app-content">
        <div class="app-title">
            <div class="row">
                <div class="col-md-9">
                    <h1><i class="app-menu__icon fa fa-laptop"></i> Nhật ký nhân viên</h1>
                </div>

                <div class="col-md-3">
                    <a href="{{route('admin.get.nhatkyCreate.phong')}}" class="btn btn-primary" style="border-radius: 10px;" type="button">Thêm Mới</a>
                </div>

            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.trangchu')}}"><i class="fa fa-home fa-lg"></i></a> </li>
                <li class="breadcrumb-item"><a href="{{route('admin.get.list.phong')}}">Phòng ban</a></li>
                <li class="breadcrumb-item"><a href="{{route('admin.get.nhatkyIndex.phong')}}">Nhật ký nhân viên</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div id="sampleTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">

                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <form action="{{route('admin.post.nhatkyIndex.phong')}}" method="post">
                                        @csrf
                                        <div id="sampleTable_filter" class="dataTables_filter">
                                            <label>
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <select  name="name" type="text" class="form-control form-control-sm"  aria-controls="sampleTable" style="margin-top: 5px;margin-right: 10px;">

                                                            @foreach($phong as $p)
                                                                <option>
                                                                    {{$p->ten_phong}}
                                                                </option>
                                                            @endforeach

                                                        </select>
                                                    </div>

                                                  <div class="col-md-3" style="padding: 0;">
                                                      <button class="btn-success" type="submit" style="border-radius: 50%;margin-top: 6px;"><i class="fa fa-search"></i></button>
                                                  </div>

                                                </div>

                                            </label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-hover table-bordered dataTable no-footer" id="sampleTable"
                                           role="grid" aria-describedby="sampleTable_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="" aria-controls="" rowspan=""
                                                colspan="" aria-sort=""
                                                aria-label="" style="width: 199px;">
                                                Tên phòng ban
                                            </th>
                                            <th class="sorting_asc" tabindex="" aria-controls="" rowspan=""
                                                colspan="" aria-sort=""
                                                aria-label="" style="width: 199px;">
                                                Tên nhân sự
                                            </th>
                                            <th class="sorting" tabindex="" aria-controls="" rowspan=""
                                                colspan="" aria-label=""
                                                style="width: 322px;">Tên vị trí
                                            </th>
                                            <th class="sorting" tabindex="" aria-controls="" rowspan=""
                                                colspan="" aria-label=""
                                                style="width: 322px;">Ngày làm
                                            </th>
                                            <th class="sorting" tabindex="" aria-controls="" rowspan=""
                                                colspan="" aria-label=""
                                                style="width: 322px;">Ngày kết thúc
                                            </th>
                                            <th class="sorting" tabindex="" aria-controls="" rowspan=""
                                                colspan="" aria-label=""
                                                style="width: 322px;">Ghi chú
                                            </th>
                                            <th class="sorting" tabindex="" aria-controls="" rowspan=""
                                                colspan="" aria-label=""
                                                style="width: 100px;">Thao tác
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($lamviec as $lv)
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">{{$lv->tenphong}}</td>
                                                <td>{{$lv->hoten}}</td>
                                                <td>{{$lv->tenvitri}}</td>
                                                <td>{{$lv->ngaylam}}</td>
                                                <td>{{$lv->ngayketthuc}}</td>
                                                <td>{{$lv->ghichu}}</td>

                                                <td>
                                                    <a href="{{route('admin.get.nhatkyUpdate.phong',$lv->idlamviec)}}" style="color: white;font-size: 10px;border: 20px;" class="btn btn-info" type="button">Cập nhật</a>
                                                </td>

                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-5">

                                </div>
                                <div class="col-sm-12 col-md-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="sampleTable_paginate">
                                        <ul class="pagination">
                                            <li class="paginate_button page-item active" style="margin-left: 10px;">{{$lamviec->links()}}</li>
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
@stop
