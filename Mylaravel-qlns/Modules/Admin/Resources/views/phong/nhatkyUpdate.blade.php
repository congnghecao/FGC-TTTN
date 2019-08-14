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
                <li class="breadcrumb-item"><a href="#">Cập nhật</a></li>
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
                    <p><b>Mã phòng ban:</b></p>
                    <input class="form-control" id="readOnlyInput" type="text"  readonly="" value="{{old('idphongban',$lamviec->id_phong_ban)}}"
                           name="idphongban" style="width: 30%;">
                            {{--<select class="form-control" id="exampleSelect1" name="idphongban">--}}
                                    {{--<option value="{{old('idphongban',$lamviec->id_phong_ban)}}">{{$phongban->tenphong}}</option>--}}
                            {{--</select>--}}
                    <br>

                    <p><b>Mã nhân sự:</b></p>
                    <input class="form-control" id="readOnlyInput" type="text" readonly="" value="{{old('idnhansu',$lamviec->id_nhan_su)}}"
                           name="idnhansu" style="width: 40%;">

                    <br>

                    <p><b>Mã vị trí:</b></p>
                    <input class="form-control" id="readOnlyInput" type="text" readonly="" value="{{old('idvitri',$lamviec->id_vi_tri)}}"
                           name="idvitri" style="width: 30%;">

                    <br>
                        </div>

                        <div class="col-md-5 tile" style="height: 420px;margin-top: 130px;margin-left: 50px">
                            {{--<p style="margin-top: 30px;"><b>Ngày làm:</b></p>--}}
                    {{--<input class="form-control is-valid" id="inputValid" type="date" value="{{old('ngaylam',$lamviec->ngay_lam)}}"--}}
                           {{--name="ngaylam">--}}

                    <br>

                    <p><b>Ngày kết thúc:</b></p>
                    <input class="form-control is-valid" id="inputValid" type="date" value="{{old('ngayketthuc',$lamviec->ngay_ket_thuc)}}"
                           name="ngayketthuc" style="width: 50%;">
                    @if($errors->has('ngayketthuc'))
                        <span style="font-size: 12px;color: red">
                            <i>{{$errors->first('ngayketthuc')}}</i>
                        </span>
                    @endif
                    <br>
                    <p><b>Ghi chú:</b></p>
                            <textarea name="ghichu" id="inputValid" cols="20" rows="3" class="form-control">{{old('ghichu',$lamviec->ghi_chu)}}</textarea>
                    {{--<input class="form-control is-valid" id="inputValid" type="text" value="{{old('ghichu',$lamviec->ghi_chu)}}"--}}
                           {{--name="ghichu">--}}
                    @if($errors->has('ghichu'))
                        <span style="font-size: 12px;color: red">
                            <i>{{$errors->first('ghichu')}}</i>
                        </span>
                    @endif
                    <br>
                    <center>
                        <button class="btn btn-primary" type="submit">Cập nhật</button>
                    </center>
                        </div>
                        </div>
                </form>
            </div>
            <div class="col-md-3">

            </div>
        </div>
    </main>
    <!---->
    <!---->
@stop
