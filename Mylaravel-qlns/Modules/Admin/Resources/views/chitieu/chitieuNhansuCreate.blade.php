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

                <form action="{{route('admin.post.danhsachchitieunhansuCreate.chitieu')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-5 tile" style="height: 550px;margin-top: 20px;margin-left: 80px">
                            <h3 style="text-shadow: 1px 1px 1px #2a383e;margin-top: 30px;margin-bottom: 45px;font-size: 30px;font-weight: 100;">
                                <span style="color: red;font-size: 40px;">|</span>Điền thông tin Chỉ tiêu:</h3>

                            <p><b>Chỉ tiêu:</b></p>
                            <select class="form-control" id="readOnlyInput" type="text" readonly="" name="idchitieu"
                                    style="width: 50%;">
                                @foreach($chitieu as $ct)
                                    <option value="{{$ct->id}}">{{$ct->ten_chi_tieu}}</option>
                                @endforeach
                            </select>

                            {{--<input type="checkbox" id="select_all"/> Chọn tất cả<br>--}}
                            {{--@foreach($nhansu as $ns)--}}
                            {{--<input class="checkbox" type="checkbox" name="check[]"> {{$ns->tenphong}}<br>--}}
                            {{--@endforeach--}}

                            <br>
                            <p><b>Họ tên nhân sự:</b></p>
                            <select class="form-control" id="exampleSelect1" name="idnhansu" style="width: 80%;">
                                <option>--Chọn nhân sự--</option>

                                @foreach($nhansu as $ns)

                                    {{--@if($kiemtra1->id_nhan_su == $ns->idnhansu )--}}
                                    {{--<option style="color: red;" value="{{$ns->idnhansu}}">{{$ns->tenphong}}--}}
                                    {{--- {{$ns->hoten}}</option>--}}
                                    {{--@else--}}
                                    <option value="{{$ns->idnhansu}}">{{$ns->tenphong}}
                                        - {{$ns->hoten}}</option>
                                    {{--@endif--}}

                                @endforeach

                            </select>


                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <p><b>Điểm chỉ tiêu:</b></p>
                                    <input class="form-control is-valid" id="inputValid" type="text"
                                           value="{{old('diemchitieu')}}"
                                           name="diemchitieu" style="width: 70%;">
                                    @if($errors->has('diemchitieu'))
                                        <span style="font-size: 12px;color: red">
                            <i>{{$errors->first('diemchitieu')}}</i>
                        </span>
                                    @endif
                                    <br>
                                </div>
                                <div class="col-md-6">
                                    <p><b>Kết quả:</b></p>
                                    <input class="form-control" id="readOnlyInput" type="text" readonly=""
                                           value="{{old('ketqua','Không có điểm')}}"
                                           name="ketqua" style="width: 70%;">
                                </div>
                            </div>

                            <p><b>Điểm đạt được:</b></p>
                            <input class="form-control" id="readOnlyInput" type="text" readonly=""
                                   value="{{old('diemdatduoc','0')}}"
                                   name="diemdatduoc" style="width: 30%;">
                            <br>
                        </div>
                        <div class="col-md-5 tile" style="height: 550px;margin-top: 20px;margin-left: 50px">
                            <br>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <p><b>Tháng kết thúc:</b></p>
                                    <select class="form-control" id="inputValid" style="width: 50%;" name="thang">
                                        @for($j=1;$j<13;$j++)
                                            <option value="{{$j}}">Tháng {{$j}}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <p><b>Năm kết thúc:</b></p>
                                    <select class="form-control" id="inputValid" style="width: 50%;" name="nam">
                                        @for($i=1980;$i<2100;$i++)
                                            <option value="{{$i}}">Năm {{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <br>
                            <p><b>Khen thưởng:</b></p>
                            <textarea class="form-control" id="readOnlyInput" rows="3" type="text" readonly=""

                                      name="khenthuong">{{old('khenthuong','Chưa có quyết định khen thưởng')}}</textarea>
                            {{--<input class="form-control" id="readOnlyInput" rows="3" type="text" readonly=""--}}
                                   {{--value="{{old('khenthuong','Chưa xét')}}"--}}
                                   {{--name="khenthuong">--}}
                            <br>
                            <p><b>Cảnh báo:</b></p>
                            <textarea class="form-control" id="readOnlyInput" rows="3" type="text" readonly=""

                                      name="canhbao">{{old('canhbao','Chưa có quyết định cảnh báo')}}</textarea>
                            {{--<input class="form-control" id="readOnlyInput" type="text" readonly=""--}}
                                   {{--value="{{old('canhbao','Chưa xét')}}"--}}
                                   {{--name="canhbao">--}}
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
