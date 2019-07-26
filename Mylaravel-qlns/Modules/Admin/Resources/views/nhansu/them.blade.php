
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
                <li class="breadcrumb-item"><a href="">Thêm mới</a></li>

            </ul>
        </div>
        <div class="tile">
            <h3 class="tile-title text-center">Thêm nhân sự mới</h3>
            {{--@if(count($errors)>0)--}}
            {{--<div class="alert alert-danger">--}}
            {{--@foreach($errors->all() as $err)--}}
            {{--{{$err}}<br>--}}
            {{--@endforeach--}}
            {{--</div>--}}
            {{--@endif--}}
            @if(session('thongbao'))
                <div class="alert alert-success text-center">
                    {{session('thongbao')}}
                </div>
            @endif
            <div class="tile-body">
                <form action="{{url('admin/nhansu/them')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Họ tên</label>
                                <input class="form-control" type="text" placeholder="vd: Nguyễn Xuân Hạnh" name="hoten">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Ngày sinh</label>
                                <input class="form-control" type="date" name="ngaysinh" placeholder="22/07/1997">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Nơi thường trú</label>
                                <textarea class="form-control" rows="4" name="ntt"
                                          placeholder="khối/xóm - phường/xã - Tỉnh/Thành phố"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="control-label">CMND</label>
                                <input class="form-control" type="number" placeholder="vd: 187701990" name="cmnd">
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="control-label">Phòng ban</label>
                                    @foreach($phongban as $pb)
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" name="phongban"
                                                       value="{{$pb->id}}">{{$pb->ten_phong}}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label">Vị trí</label>
                                    @foreach($vitri as $vt)
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" name="vitri"
                                                       value="{{$vt->id}}">{{$vt->ten_vi_tri}}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        {{--//--}}
                        <div class="col-md-4 offset-md-1">
                            <div class="form-group">
                                <label class="control-label">Ngày học việc</label>
                                <input class="form-control" type="date" name="ngayhv" placeholder="22/07/1997">
                            </div>
                            <div class="form-group">
                                <label class="control-label">ngày kết thức học việc</label>
                                <input class="form-control" type="date" name="ngaykthv" placeholder="22/07/1997">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Ngày thử việc</label>
                                <input class="form-control" type="date" name="ngaytv" placeholder="22/07/1997">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Ngày kết thúc thử việc</label>
                                <input class="form-control" type="date" name="ngaykttv" placeholder="22/07/1997">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Ngày làm chính thức</label>
                                <input class="form-control" type="date" name="ngaylct" placeholder="22/07/1997">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Ngày làm kết thúc</label>
                                <input class="form-control" type="date" name="ngaylkt" placeholder="22/07/1997">
                            </div>
                        </div>
                    </div>
                    <div class="tile-footer text-center">
                        <button class="btn btn-primary" type="submit">
                            <i class="fa fa-fw fa-lg fa-check-circle"></i>Thêm mới
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <!---->
    <!---->
@stop

