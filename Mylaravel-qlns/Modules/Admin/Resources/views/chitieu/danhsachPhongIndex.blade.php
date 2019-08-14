@extends('admin::layouts.master')

@section('content')
    <!---->
    <main class="app-content">
        <div class="app-title">
            <div class="row">
                <div class="col-md-12">
                    <h1><i class="app-menu__icon fa fa-laptop"></i> Phòng thuộc chỉ tiêu  </h1>
                </div>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="{{route('admin.get.danhsachchitieu.chitieu')}}">Danh sách chỉ tiêu</a></li>
                <li class="breadcrumb-item"><a href="">Danh sách nhân sự nhận chỉ tiêu</a></li>
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
                                {{--<div class="col-sm-12 col-md-6">--}}
                                    {{--<form action="{{route('admin.post.danhsachchitieuphong.chitieu')}}" method="post">--}}
                                        {{--@csrf--}}
                                        {{--<div id="sampleTable_filter" class="dataTables_filter">--}}
                                            {{--<label>Tìm kiếm:--}}
                                                {{--<div class="row">--}}
                                                    {{--<div class="col-md-9">--}}
                                                        {{--<select  name="name" type="text" class="form-control form-control-sm"  aria-controls="sampleTable" style="margin-top: 5px;margin-right: 10px;">--}}

                                                            {{--@foreach($phong as $p)--}}
                                                                {{--<option>--}}
                                                                    {{--{{$p->ten_phong}}--}}
                                                                {{--</option>--}}
                                                            {{--@endforeach--}}

                                                        {{--</select>--}}
                                                    {{--</div>--}}

                                                    {{--<div class="col-md-3" style="padding: 0;">--}}
                                                        {{--<button class="btn-success" type="submit" style="border-radius: 50%;margin-top: 6px;"><i class="fa fa-search"></i></button>--}}
                                                    {{--</div>--}}

                                                {{--</div>--}}

                                            {{--</label>--}}
                                        {{--</div>--}}
                                    {{--</form>--}}
                                {{--</div>--}}
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-hover table-bordered dataTable no-footer" id="sampleTable"
                                           role="grid" aria-describedby="sampleTable_info">
                                        <thead>
                                        <tr role="row">
                                            {{--<th class="sorting_asc" tabindex="" aria-controls="" rowspan=""--}}
                                                {{--colspan="" aria-sort=""--}}
                                                {{--aria-label="" style="width: 30%;">--}}
                                                {{--Mã chỉ tiêu--}}
                                            {{--</th>--}}
                                            <th class="sorting_asc" tabindex="" aria-controls="" rowspan=""
                                                colspan="" aria-sort=""
                                                aria-label="" style="width: 40%;">
                                                Tên chỉ tiêu
                                            </th>
                                            <th class="sorting" tabindex="" aria-controls="" rowspan=""
                                                colspan="" aria-label=""
                                                style="width: 30%;">Tên nhân sự
                                            </th>
                                            <th class="sorting" tabindex="" aria-controls="" rowspan=""
                                                colspan="" aria-label=""
                                                style="width: 30%;">Tên phòng ban
                                            </th>

                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($chitieu as $ct)
                                            <tr role="row" class="odd">
                                                {{--<td class="sorting_1">{{$ct->idchitieu}}</td>--}}
                                                <td>{{$ct->tenchitieu}}</td>
                                                <td>{{$ct->hoten}}</td>
                                                <td>{{$ct->tenphong}}</td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{--<div class="row">--}}
                                {{--<div class="col-sm-12 col-md-5">--}}

                                {{--</div>--}}
                                {{--<div class="col-sm-12 col-md-7">--}}
                                    {{--<div class="dataTables_paginate paging_simple_numbers" id="sampleTable_paginate">--}}
                                        {{--<ul class="pagination">--}}
                                            {{--<li class="paginate_button page-item active" style="margin-left: 10px;">{{$chitieu->links()}}</li>--}}
                                        {{--</ul>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!---->
@stop
