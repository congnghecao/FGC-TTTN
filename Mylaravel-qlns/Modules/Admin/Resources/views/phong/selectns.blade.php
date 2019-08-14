@extends('admin::layouts.master')

@section('content')
    <!---->
    <main class="app-content">
        <div class="app-title">
            <div class="row">
                <div class="col-md-12">
                    <h1><i class="app-menu__icon fa fa-laptop"></i> Danh sách phòng ban</h1>
                </div>


            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.trangchu')}}"> <i class="fa fa-home fa-lg"></i></a></li>
                <li class="breadcrumb-item"><a href="{{route('admin.get.list.phong')}}">Phòng ban</a></li>
                <li class="breadcrumb-item"><a href="{{route('admin.get.selectns.phong')}}">Danh sách Phòng ban</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    <div class="tile-body">
                        <div id="sampleTable_wrappe" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                            <div class="row">
                                @foreach($phongban as $p)
                                    <div class="col-md-6 col-lg-3">
                                        <div class="widget-small info coloured-icon">
                                            <a href="{{route('admin.get.selectns1.phong',$p->id_phong)}}">
                                                <i class="icon fa fa-users fa-3x"></i>
                                            </a>
                                            <div class="post">
                                                <div class="back info">
                                                    <h4>{{$p->ten}}</h4>
                                                </div>
                                                <div class="post-s">
                                                    <div class="row ">
                                                        <div class="col-sm-12">

                                                            <br>
                                                            <h2>Có {{$p->sons}} nhân sự đang làm việc</h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!---->
@stop
