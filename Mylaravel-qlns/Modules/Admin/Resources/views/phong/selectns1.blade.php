@extends('admin::layouts.master')

@section('content')
    <!---->
    <main class="app-content">
        <div class="app-title">
            <div class="row">
                <div class="col-md-12">
                    <h1><i class="app-menu__icon fa fa-laptop"></i> Nhân viên
                        {{--@dd($phongban)--}}
                     @foreach($phongban as $pb)
                        {{$pb->ten_phong}}
                         @endforeach
                    </h1>
                </div>



            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.trangchu')}}"><i class="fa fa-home fa-lg"></i></a></li>
                <li class="breadcrumb-item"><a href="{{route('admin.get.list.phong')}}">Phòng ban</a></li>
                <li class="breadcrumb-item"><a href="{{route('admin.get.selectns.phong')}}">Danh sách Phòng ban</a></li>
                <li class="breadcrumb-item"><a href="{{route('admin.get.selectns.phong')}}">Chi tiết Phòng ban</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div id="sampleTable_wrappe" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                            <div class="row">


                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-hover table-bordered dataTable no-footer" id="sampleTable"
                                       role="grid" aria-describedby="sampleTable_info">
                                    <thead>
                                    <tr role="row">
                                        {{--<th class="sorting_asc" tabindex="" aria-controls="" rowspan=""--}}
                                        {{--colspan="" aria-sort=""--}}
                                        {{--aria-label="" style="width: 100px;">--}}
                                        {{--id--}}
                                        {{--</th>--}}
                                        <th class="sorting_asc" tabindex="" aria-controls="" rowspan=""
                                            colspan="" aria-sort=""
                                            aria-label="" style="width: 322px;">
                                            Họ tên nhân sự
                                        </th>

                                        <th class="sorting" tabindex="" aria-controls="" rowspan=""
                                            colspan="" aria-label=""
                                            style="width: 322px;">Ngày sinh
                                        </th>
                                        <th class="sorting" tabindex="" aria-controls="" rowspan=""
                                            colspan="" aria-label=""
                                            style="width: 322px;">Tên chức vụ
                                        </th>

                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($phongban1 as $p)
                                    <tr role="row" class="odd">
                                    <td class="sorting_1">{{$p->ho}}</td>
                                    <td>{{$p->ngay}}</td>

                                    <td>{{$p->vi}}</td>
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
                        {{--<li class="paginate_button page-item active" style="margin-left: 10px;">{{$phongban->links()}}</li>--}}
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
