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
                                <div class="col-sm-12 col-md-6"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-hover table-bordered dataTable no-footer" id="sampleTable"
                                           role="grid" aria-describedby="sampleTable_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="" aria-controls="" rowspan="" colspan="" aria-sort="" aria-label="" style="width: 40%;">Tên chỉ tiêu</th>
                                            <th class="sorting" tabindex="" aria-controls="" rowspan="" colspan="" aria-label="" style="width: 30%;">Tên nhân sự</th>
                                            <th class="sorting" tabindex="" aria-controls="" rowspan="" colspan="" aria-label="" style="width: 30%;">Tên phòng ban</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($chitieu as $ct)
                                            <tr role="row" class="odd">
                                                <td>{{$ct->tenchitieu}}</td>
                                                <td>{{$ct->hoten}}</td>
                                                <td>{{$ct->tenphong}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
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
