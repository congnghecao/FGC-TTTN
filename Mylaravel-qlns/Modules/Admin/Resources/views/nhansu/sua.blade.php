
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
                <li class="breadcrumb-item"><a href="">Cập nhật</a></li>

            </ul>
        </div>
        <div class="tile">
            <h3 class="tile-title text-center">Sửa nhân sự</h3>
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
                <form action="admin/nhansu/sua/{{$nhansu->id}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Họ tên</label>
                                <input class="form-control" type="text" placeholder="vd: Nguyễn Xuân Hạnh" name="hoten" value="{{$nhansu->ho_ten}}">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Ngày sinh</label>
                                <input class="form-control" type="date" name="ngaysinh" placeholder="22/07/1997" value="{{$nhansu->ngay_sinh}}">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Nơi thường trú</label>
                                <textarea class="form-control" rows="4" name="ntt"
                                          placeholder="khối/xóm - phường/xã - Tỉnh/Thành phố">{{$nhansu->noi_thuong_tru}}</textarea>
                            </div>
                            <div class="form-group">
                                <label class="control-label">CMND</label>
                                <input class="form-control" type="number" placeholder="vd: 187701990" name="cmnd" value="{{$nhansu->cmnd}}">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Ngày vào</label>
                                <input disabled class="form-control" type="datetime-local" placeholder="22/07/1997"
                                       value="{{$nhansu->ngay_vao}}">
                            </div>
                        </div>
                        {{--//--}}
                        <div class="col-md-4 offset-md-1">
                            <div class="form-group">
                                <label class="control-label">Ngày học việc</label>
                                <input class="form-control" type="date" name="ngayhv" placeholder="22/07/1997" value="{{$nhansu->ngay_hoc_viec}}">
                            </div>
                            <div class="form-group">
                                <label class="control-label">ngày kết thức học việc</label>
                                <input class="form-control" type="date" name="ngaykthv" placeholder="22/07/1997" value="{{$nhansu->ngay_kt_ho_viec}}">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Ngày thử việc</label>
                                <input class="form-control" type="date" name="ngaytv" placeholder="22/07/1997" value="{{$nhansu->ngay_thu_viec}}">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Ngày kết thúc thử việc</label>
                                <input class="form-control" type="date" name="ngaykttv" placeholder="22/07/1997" value="{{$nhansu->ngay_kt_thu_viec}}">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Ngày làm chính thức</label>
                                <input class="form-control" type="date" name="ngaylct" placeholder="22/07/1997" value="{{$nhansu->ngay_lam_chinh_thuc}}">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Ngày làm kết thúc</label>
                                <input class="form-control" type="date" name="ngaylkt" placeholder="22/07/1997" value="{{$nhansu->ngay_lam_ket_thuc}}">
                            </div>
                        </div>
                    </div>
                    <div class="tile-footer text-center">
                        <button class="btn btn-primary" type="submit">
                            <i class="fa fa-fw fa-lg fa-check-circle"></i>sửa
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <!---->
    <!---->
@stop

