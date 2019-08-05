@extends('admin::layouts.master')

@section('content')
    <!---->
    <main class="app-content">
        <div class="app-title">
            <div class="row">
                <div class="col-md-9">
                    <h1><i class="app-menu__icon fa fa-laptop"></i> Danh sách Phòng ban</h1>
                </div>
                <div class="col-md-3">
                    <a data-toggle="tooltip" title="add" data-placement="left">
                        <button class="btn btn-primary" style="border-radius: 10px;" type="button" data-toggle="modal"
                                data-target="#myModal">Thêm Mới
                        </button>
                    </a>
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="pd" style="margin: 20px;">
                                    <h3 style="text-shadow: 1px 1px 1px #2a383e;margin-top: 45px;margin-bottom: 45px;font-size: 30px;font-weight: 100;">
                                        <span style="color: red;font-size: 40px;">|</span>Điền thông tin Phòng ban:</h3>
                                    <form action="{{route('admin.post.create.phong')}}" method="POST">
                                        {{--@method('POST')--}}
                                        @csrf
                                        <p><b>Tên phòng:</b></p>
                                        <input class="form-control is-valid" id="inputValid" type="text"
                                               value="{{old('tenphong')}}"
                                               name="tenphong" style="width: 300px">
                                        @if($errors->has('tenphong'))
                                            <span style="font-size: 12px;color: red">
                                                <i>{{$errors->first('tenphong')}}</i>
                                            </span>
                                        @endif
                                        <br>
                                        <p><b>Mô tả:</b></p>
                                        <textarea class="form-control" id="exampleTextarea" rows="3" type="text"
                                                  value="{{old('mota')}}"
                                                  name="mota"></textarea>
                                        {{--<input class="form-control is-valid" id="inputValid" type="text" value="{{old('mota')}}" name="mota">--}}
                                        @if($errors->has('mota'))
                                            <span style="font-size: 12px;color: red">
                                                <i>{{$errors->first('mota')}}</i>
                                            </span>
                                        @endif
                                        <br>
                                        <center>
                                            <button class="btn btn-primary" type="submit">Thêm</button>
                                        </center>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <div style="position: absolute;top: 70px;right: 180px;">
                    @if (session('statusadd'))
                        <div class="chuthich right wow slideInRight" data-wow-duration="0.5s" style="width: 300px;display: block;">
                            <div class="arroww" style="top: 50%;"></div>
                            <h3 class="chuthich-title" style="color:red;">Thông báo!</h3>
                            <div class="chuthich-content">{{ session('statusadd') }}</div>
                        </div>
                    @elseif (session('statusupdate'))
                        <div class="chuthich right wow slideInRight" style="width: 300px;display: block;" data-wow-duration="0.5s">
                            <div class="arroww" style="top: 50%;"></div>
                            <h3 class="chuthich-title" style="color:red;">Thông báo!</h3>

                            <div class="chuthich-content">{{ session('statusupdate') }}</div>
                        </div>
                    @elseif (session('statusdelete'))
                        <div class="chuthich right wow slideInRight" data-wow-duration="0.5s" style="width: 300px;display: block;">
                            <div class="arroww" style="top: 50%;"></div>
                            <h3 class="chuthich-title" style="color:red;">Thông báo!</h3>

                            <div class="chuthich-content">{{ session('statusdelete') }}</div>
                        </div>
                        @else
                        <div class="chuthich right " style="width: 300px;display: block;">
                            <div class="arroww" style="top: 50%;"></div>
                            <h3 class="chuthich-title" style="color:red;">Thông báo!</h3>

                            <div class="chuthich-content">Không có thông báo!</div>
                        </div>
                    @endif
                </div>
                <li class="breadcrumb-item"><a><i class="fa fa-bell-o fa-lg"></i></a></li>
                <li class="breadcrumb-item"><a href="{{route('admin.trangchu')}}"><i class="fa fa-home fa-lg"></i></a>
                </li>
                <li class="breadcrumb-item"><a href="{{route('admin.get.list.phong')}}">Phòng ban</a></li>

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

                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div id="sampleTable_filter" class="dataTables_filter">
                                        {{--<form action="" method="post">--}}
                                        {{--@csrf--}}
                                        {{--<label>Tìm kiếm:--}}
                                        {{--<input--}}
                                        {{--type="search" class="form-control form-control-sm" placeholder=""--}}
                                        {{--aria-controls="sampleTable" name="timkiem"></label>--}}
                                        {{--</form>--}}
                                    </div>
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
                                                aria-label="" style="width: 5%;">
                                                Mã
                                            </th>
                                            <th class="sorting_asc" tabindex="" aria-controls="" rowspan=""
                                                colspan="" aria-sort=""
                                                aria-label="" style="width: 15%;">
                                                Tên phòng ban
                                            </th>
                                            <th class="sorting" tabindex="" aria-controls="" rowspan=""
                                                colspan="" aria-label=""
                                                style="width: 68%;">Mô tả
                                            </th>
                                            <th class="sorting" tabindex="" aria-controls="" rowspan=""
                                                colspan="" aria-label=""
                                                style="width: 12%;">Thao tác
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($phongban as $pb)
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">{{$pb->id}}</td>
                                                <td>{{$pb->ten_phong}}</td>
                                                <td>{{$pb->mo_ta}}</td>
                                                <td>
                                                    <a data-toggle="tooltip" title="update" data-placement="top">
                                                        <button data-catid="{{$pb->id}}"
                                                                data-mytitle="{{$pb->ten_phong}}"
                                                                data-mydescriptiton="{{$pb->mo_ta}}"
                                                                class="btn btn-primary"
                                                                style="color: white;font-size: 10px;border: 20px;"
                                                                type="button" data-toggle="modal" data-target="#edit">
                                                            Cập
                                                            nhật
                                                        </button>
                                                    </a>
                                                    <a href="{{route('admin.get.delete.phong',$pb->id)}}"
                                                       style="color: white;font-size: 10px;border: 20px;"
                                                       class="btn btn-danger" type="button" data-toggle="tooltip"
                                                       title="delete" data-placement="top">Xóa</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-5"></div>
                                <div class="col-sm-12 col-md-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="sampleTable_paginate">
                                        <ul class="pagination">
                                            <li class="paginate_button page-item active"
                                                style="margin-left: 10px;">{{$phongban->links()}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="edit" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-body pd" style="margin: 20px;">
                                            <h3 style="text-shadow: 1px 1px 1px #2a383e;margin-top: 30px;margin-bottom: 45px;font-size: 30px;font-weight: 100;">
                                                <span style="color: red;font-size: 40px;">|</span>Điền thông tin Phòng
                                                ban:</h3>
                                            <form action="{{route('admin.get.update.phong')}}" method="post">
                                                {{--{{method_field('patch')}}--}}
                                                {{csrf_field()}}
                                                <input type="hidden" name="phongban_id" id="cat_id" value="">
                                                <p><b>Tên phòng:</b></p>
                                                <input class="form-control is-valid" id="title" type="text"
                                                       value=""
                                                       name="ten" style="width: 300px">
                                                <br>
                                                <p><b>Mô tả:</b></p>
                                                <textarea name="mo" id="des" cols="20" rows="3"
                                                          class="form-control"></textarea>
                                                <br>
                                                <center>
                                                    <button class="btn btn-primary" type="submit">Cập nhật</button>
                                                </center>
                                            </form>
                                        </div>
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
