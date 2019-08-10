@extends('admin::layouts.master')
@section('content')
    <!---->
    <main class="app-content">
        <div class="app-title">
            <div class="row">
                <div class="col-md-12">
                    <h1><i class="app-menu__icon fa fa-laptop"></i> Danh sách chỉ tiêu</h1>
                </div>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="{{route('admin.get.list.chitieu')}}">Chỉ tiêu</a></li>
                <li class="breadcrumb-item"><a href="#">Danh sách Chỉ tiêu</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    <div class="tile-body">
                        <div id="sampleTable_wrappe" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-md-12"></div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($chitieu as $ct)
                                <div class="col-md-6 col-lg-3">
                                    <a href="{{route('admin.get.danhsachchitieuphong.chitieu',$ct->id)}}" style="text-decoration: none">
                                        <div class="widget-small danger coloured-icon" style="margin-top: 60px;"><i class="icon fa fa-star fa-3x"></i>
                                            <div class="info">
                                                <h4 style="font-size: 15px;">{{$ct->ten_chi_tieu}}</h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!---->
@stop
