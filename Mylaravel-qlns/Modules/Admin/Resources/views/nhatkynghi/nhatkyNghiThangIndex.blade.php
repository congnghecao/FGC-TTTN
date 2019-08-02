

@extends('admin::layouts.master')

@section('content')
    <!---->
    <main class="app-content">
        <div class="app-title">
            <div class="row">
                <div class="col-md-12">
                    <h1><i class="app-menu__icon fa fa-laptop"></i> Nhật ký nghỉ</h1>
                </div>


            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="{{route('admin.get.list.nhatkynghi')}}">Nhật ký nghỉ</a></li>
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
                                    {{--<form action="" method="post">--}}
                                        {{--@csrf--}}
                                        {{--<div id="sampleTable_filter" class="dataTables_filter"><label>Tìm kiếm:<input name="name"--}}
                                                                                                                      {{--type="text" class="form-control form-control-sm" placeholder=""--}}
                                                                                                                      {{--aria-controls="sampleTable"></label></div>--}}
                                    {{--</form>--}}

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
                                                aria-label="" style="width: 100px;">
                                                Tên nhân sự
                                            </th>
                                            <th class="sorting_asc" tabindex="" aria-controls="" rowspan=""
                                                colspan="" aria-sort=""
                                                aria-label="" style="width: 199px;">
                                                Năm
                                            </th>
                                            <th class="sorting" tabindex="" aria-controls="" rowspan=""
                                                colspan="" aria-label=""
                                                style="width: 322px;">Loại nghỉ
                                            </th>
                                            <th class="sorting" tabindex="" aria-controls="" rowspan=""
                                                colspan="" aria-label=""
                                                style="width: 322px;">Số lần xin nghỉ
                                            </th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($xinnghi as $xn)
                                            <tr role="row" class="odd">
                                                <td>{{$xn->hoten}}</td>
                                                <td class="sorting_1"> {{$xn->thang}} - {{$xn->nam}}</td>
                                                <td>{{$xn->loainghi}}</td>
                                                <td>{{$xn->sonhansu}}</td>

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
