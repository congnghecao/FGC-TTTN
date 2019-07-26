@extends('admin::layouts.master')

@section('content')
    <!---->
    <!--Main main-->
    <main class="app-content">
        <div class="app-title">
            <div class="row">

                <h1><i class="app-menu__icon fa fa-laptop"></i> Thêm mới chỉ tiêu theo nhân sự</h1>


            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.trangchu')}}"><i class="fa fa-home fa-lg"></i></a>
                </li>
                <li class="breadcrumb-item"><a href="{{route('admin.get.list.chitieu')}}">Chỉ tiêu</a></li>

                <li class="breadcrumb-item"><a href="{{route('admin.get.danhsachchitieunhansu.chitieu')}}">Chỉ tiêu theo
                        nhân sự</a></li>
                <li class="breadcrumb-item"><a href="#">Thêm mới chỉ tiêu theo nhân sự</a></li>
            </ul>
        </div>
        <div class="row">

            <div class="col-md-12">

                <form action="" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-5 tile" style="height: 550px;margin-top: 20px;margin-left: 80px">
                            <h3 style="text-shadow: 1px 1px 1px #2a383e;margin-top: 30px;margin-bottom: 45px;font-size: 30px;font-weight: 100;">
                                <span style="color: red;font-size: 40px;">|</span>Điền thông tin Chỉ tiêu:</h3>

                            <p><b>Mã chỉ tiêu:</b></p>
                            <select class="form-control" id="exampleSelect1" name="idchitieu">
                                <option>--Chọn chỉ tiêu--</option>
                                @foreach($chitieu as $ct)
                                    <option value="{{$ct->id}}">{{$ct->ten_chi_tieu}}</option>
                                @endforeach
                            </select>

                            <br>
                            <p><b>Mã nhân sự:</b></p>
                            <select class="form-control" id="exampleSelect1" name="idnhansu" >
                                <option>--Chọn nhân sự--</option>
                                @foreach($nhansu as $ns)
                                    <option value="{{$ns->idnhansu}}">{{$ns->hoten}} - {{$ns->tenphong}}</option>
                                @endforeach
                            </select>

                            <br>
                            <p><b>Điểm chỉ tiêu:</b></p>
                            <input class="form-control is-valid" id="inputValid" type="text"
                                   value="{{old('diemchitieu')}}"
                                   name="diemchitieu">
                            @if($errors->has('diemchitieu'))
                                <span style="font-size: 12px;color: red">
                            <i>{{$errors->first('diemchitieu')}}</i>
                        </span>
                            @endif
                            <br>

                            <p><b>Điểm đạt được:</b></p>
                            <input class="form-control" id="readOnlyInput" type="text" readonly=""
                                   value="{{old('diemdatduoc','0')}}"
                                   name="diemdatduoc">
                            <br>
                        </div>
                        <div class="col-md-5 tile" style="height: 550px;margin-top: 20px;margin-left: 50px">
                            <p><b>Tháng:</b></p>
                            <input class="form-control is-valid" id="inputValid" type="text" value="{{old('thang')}}"
                                   name="thang">
                            @if($errors->has('thang'))
                                <span style="font-size: 12px;color: red">
                            <i>{{$errors->first('thang')}}</i>
                        </span>
                            @endif
                            <br>
                            <p><b>Năm:</b></p>
                            <input class="form-control is-valid" id="inputValid" type="text" value="{{old('nam')}}"
                                   name="nam">
                            @if($errors->has('nam'))
                                <span style="font-size: 12px;color: red">
                            <i>{{$errors->first('nam')}}</i>
                        </span>
                            @endif
                            <br>
                            <p><b>Kết quả:</b></p>
                            <input class="form-control" id="readOnlyInput" type="text" readonly=""
                                   value="{{old('ketqua','Chưa xét')}}"
                                   name="ketqua">
                            <br>
                            <p><b>Khen thưởng:</b></p>
                            <input class="form-control" id="readOnlyInput" type="text" readonly=""
                                   value="{{old('khenthuong','Chưa xét')}}"
                                   name="khenthuong">
                            <br>
                            <p><b>Cảnh báo:</b></p>
                            <input class="form-control" id="readOnlyInput" type="text" readonly=""
                                   value="{{old('canhbao','Chưa xét')}}"
                                   name="canhbao">
                            <br>
                            <center>
                                <button class="btn btn-primary" type="submit">Thêm</button>
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
