
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
                <li class="breadcrumb-item"><a href="{{route('admin.get.index.xinnghi','1')}}">Xin nghỉ</a></li>
                <li class="breadcrumb-item"><a href="">Thêm</a></li>

            </ul>
        </div>
        <div class="tile">
            <h3 class="tile-title text-center">Thêm đơn xin nghỉ</h3>
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
                <form action="" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Mã nhân sự</label>
                                <input class="form-control" type="text" placeholder="vd: 1" name="id_nhan_su">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Số buổi nghỉ</label>
                                <input class="form-control" type="number" name="sbn" placeholder="vd: 1">
                            </div>
                            <div class="row">
                                <h6 class="text-center col-md-12">----- Thời gian nghỉ -----</h6>
                                <div class="form-group col-md-6">
                                    <label class="control-label">Ngày bắt đầu</label>
                                    <input class="form-control" type="date" name="nbd">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label">Ngày kết thúc</label>
                                    <input class="form-control" type="date" name="nkt">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">lý do nghỉ</label>
                                <textarea class="form-control" rows="2" name="ldn"></textarea>
                            </div>
                        </div>
                        {{--//--}}
                        <div class="col-md-4 offset-md-1">
                            <div class="form-group">
                                <label class="control-label">Gửi tới ai</label>
                                @foreach($vitri as $vt)
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="vitri"
                                                   value="{{$vt->ten_vi_tri}}">{{$vt->ten_vi_tri}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>

                            <div class="form-group">
                                <label class="control-label">Loại nghỉ</label>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="loainghi"
                                               value="Nghỉ ngày">Nghỉ ngày
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="loainghi"
                                               value="Nghỉ phép">Nghỉ phép
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="loainghi"
                                               value="Nghỉ việc">Nghỉ việc
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Trạng thái</label>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="tt"
                                               value="0">Chưa phê duyệt
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="tt"
                                               value="1">Đã phê duyệt
                                    </label>
                                </div>
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

