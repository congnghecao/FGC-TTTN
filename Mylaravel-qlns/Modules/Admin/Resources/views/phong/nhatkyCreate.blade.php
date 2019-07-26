@extends('admin::layouts.master')

@section('content')
    <!---->
    <!--Main main-->
    <main class="app-content">
        <div class="app-title">
            <div class="row">

                <h1><i class="app-menu__icon fa fa-laptop"></i> Thêm mới nhật ký nhân viên theo phòng</h1>


            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.trangchu')}}"><i class="fa fa-home fa-lg"></i></a>
                </li>
                <li class="breadcrumb-item"><a href="{{route('admin.get.list.phong')}}">Phòng ban</a></li>
                <li class="breadcrumb-item"><a href="{{route('admin.get.nhatkyIndex.phong')}}">Nhật ký</a></li>
                <li class="breadcrumb-item"><a href="#">Thêm mới</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-5 tile" style="height: 500px;margin-top: 50px;margin-left: 80px">
                            <h3 style="text-shadow: 1px 1px 1px #2a383e;margin-top: 30px;margin-bottom: 45px;font-size: 30px;font-weight: 100;">
                                <span style="color: red;font-size: 40px;">|</span>Điền thông tin Nhật ký:</h3>
                            <p><b>Tên phòng ban:</b></p>
                            <select class="form-control" id="exampleSelect1" name="idphongban">
                                @foreach($phongban as $pb)
                                    <option value="{{$pb->id}}">{{$pb->ten_phong}}</option>
                                @endforeach
                            </select>
                            <br>
                            <p><b>Họ tên nhân sự:</b></p>
                            <select class="form-control" id="exampleSelect1" name="idnhansu">
                                @foreach($nhansu as $ns)
                                    <option value="{{$ns->id}}">{{$ns->ho_ten}}</option>
                                @endforeach
                            </select>
                            <br>
                            <p><b>Tên vị trí:</b></p>
                            <select class="form-control" id="exampleSelect1" name="idvitri">
                                @foreach($vitri as $vt)
                                    <option value="{{$vt->id}}">{{$vt->ten_vi_tri}}</option>
                                @endforeach
                            </select>

                            <br>
                        </div>

                        <div class="col-md-5 tile" style="height: 420px;margin-top: 130px;margin-left: 50px">
                            {{--<p style="margin-top: 30px;"><b>Ngày làm:</b></p>--}}
                            {{--<input class="form-control is-valid" id="inputValid" type="date" value="{{old('ngaylam')}}"--}}
                                   {{--name="ngaylam">--}}
                            {{--@if($errors->has('ngaylam'))--}}
                                {{--<span style="font-size: 12px;color: red">--}}
                            {{--<i>{{$errors->first('ngaylam')}}</i>--}}
                        {{--</span>--}}
                            {{--@endif--}}
                            <br>
                            <p><b>Ngày kết thúc:</b></p>
                            <input class="form-control is-valid" id="inputValid" type="date"
                                   value="{{old('ngayketthuc')}}"
                                   name="ngayketthuc">
                            {{--@if($errors->has('ngayketthuc'))--}}
                                {{--<span style="font-size: 12px;color: red">--}}
                            {{--<i>{{$errors->first('ngayketthuc')}}</i>--}}
                        {{--</span>--}}
                            {{--@endif--}}
                            <br>
                            <p><b>Ghi chú:</b></p>
                            <input class="form-control is-valid" id="inputValid" type="text" value="{{old('ghichu')}}"
                                   name="ghichu">
                            @if($errors->has('ghichu'))
                                <span style="font-size: 12px;color: red">
                            <i>{{$errors->first('ghichu')}}</i>
                        </span>
                            @endif
                            <center style="margin-top: 40px;">
                                <button class="btn btn-primary" type="submit">Thêm</button>
                            </center>
                        </div>
                        <div class="col-md-1"></div>
                    </div>


                    <br>



                </form>
            </div>
            <div class="col-md-1">

            </div>
        </div>
    </main>
    <!---->
    <!---->
@stop
