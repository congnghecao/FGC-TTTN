@extends('admin::layouts.master')

@section('content')
    <!---->
    <main class="app-content">
        <div class="app-title">
            <div class="row">
                <div class="col-md-9">
                    <h1><i class="app-menu__icon fa fa-laptop"></i> Danh sách Chỉ tiêu</h1>
                </div>
                <div class="col-md-3">
                    {{--<a href="{{route('admin.get.create.chitieu')}}" class="btn btn-primary" style="border-radius: 10px;" type="button">Thêm Mới</a>--}}
                    <a href="" class="btn btn-primary" style="border-radius: 10px;" type="button" data-toggle="modal"
                       data-target="#add">Thêm Mới</a>
                    <div class="modal fade" id="add" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="pd" style="margin: 20px;">
                                    <h3 style="text-shadow: 1px 1px 1px #2a383e;margin-top: 45px;margin-bottom: 45px;font-size: 30px;font-weight: 100;"><span style="color: red;font-size: 40px;">|</span>Điền thông tin Chỉ tiêu:</h3>
                                    <form action="{{route('admin.get.create.chitieu')}}" method="post">
                                        @csrf
                                        <p><b>Tên chỉ tiêu:</b></p>
                                        <input class="form-control is-valid" id="inputValid" type="text" value="{{old('tenchitieu')}}" name="tenchitieu">
                                        @if($errors->has('tenchitieu'))
                                            <span style="font-size: 12px;color: red"><i>{{$errors->first('tenchitieu')}}</i></span>
                                        @endif
                                        <br>
                                        <p><b>Mô tả:</b></p>
                                        <input class="form-control is-valid" id="inputValid" type="text" value="{{old('mota')}}" name="mota">
                                        @if($errors->has('mota'))
                                            <span style="font-size: 12px;color: red"><i>{{$errors->first('mota')}}</i></span>
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
                <li class="breadcrumb-item"><a href="{{route('admin.trangchu')}}"> <i class="fa fa-home fa-lg"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Chỉ tiêu</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div id="sampleTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                            <div class="row">
                                {{--<div class="col-sm-12 col-md-6">--}}
                                {{--</div>--}}
                                {{--<div class="col-sm-12 col-md-6">--}}
                                    {{--<div id="sampleTable_filter" class="dataTables_filter"><label>Tìm kiếm:<input--}}
                                                    {{--type="search" class="form-control form-control-sm" placeholder=""--}}
                                                    {{--aria-controls="sampleTable"></label></div>--}}
                                {{--</div>--}}
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
                                            {{--<th class="sorting_asc" tabindex="" aria-controls="" rowspan=""--}}
                                                {{--colspan="" aria-sort=""--}}
                                                {{--aria-label="" style="width: 12%;">--}}
                                                {{--Mã phòng ban--}}
                                            {{--</th>--}}
                                            <th class="sorting" tabindex="" aria-controls="" rowspan=""
                                                colspan="" aria-label=""
                                                style="width: 30%;">Tên chỉ tiêu
                                            </th>
                                            <th class="sorting" tabindex="" aria-controls="" rowspan=""
                                                colspan="" aria-label=""
                                                style="width: 40%;">Mô tả
                                            </th>
                                            <th class="sorting" tabindex="" aria-controls="" rowspan=""
                                                colspan="" aria-label=""
                                                style="width: 13%;">Thao tác
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($chitieu as $ct)
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">{{$ct->id}}</td>
                                                {{--<td>{{$ct->id_phong_ban}}</td>--}}
                                                <td>{{$ct->ten_chi_tieu}}</td>
                                                <td>{{$ct->mo_ta}}</td>
                                                <td>
                                                    <button  data-catid="{{$ct->id}}" data-mytitle="{{$ct->ten_chi_tieu}}" data-mydescriptiton="{{$ct->mo_ta}}" class="btn btn-primary" style="color: white;font-size: 10px;border: 20px;" type="button" data-toggle="modal" data-target="#update">Cập nhật</button>
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
                                            <li class="paginate_button page-item active" style="margin-left: 10px;">{{$chitieu->links()}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="update" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-body pd" style="margin: 20px;">
                                            <h3 style="text-shadow: 1px 1px 1px #2a383e;margin-top: 30px;margin-bottom: 45px;font-size: 30px;font-weight: 100;">
                                                <span style="color: red;font-size: 40px;">|</span>Điền thông tin Chỉ tiêu:</h3>
                                            <form action="{{route('admin.get.update.chitieu')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="chitieu_id" id="cat_id" value="">

                                                <p><b>Tên chỉ tiêu:</b></p>
                                                <input class="form-control is-valid" id="title" type="text" value="" name="ten">
                                                <br>
                                                <p><b>Mô tả:</b></p>
                                                <input class="form-control is-valid" id="des" type="text" value="" name="mo">
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
