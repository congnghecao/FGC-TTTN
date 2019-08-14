@extends('admin::layouts.master')

@section('content')

    <main class="app-content">
        <div class="app-title">
            <div class="row">
                <div class="col-md-9">
                    <h1><i class="app-menu__icon fa fa-laptop"></i>Chỉ tiêu của nhân sự</h1>
                </div>
                <div class="col-md-3">
<<<<<<< HEAD
                    <a href="{{route('admin.get.AddNhansuChitieu.chitieu',['id'=>$id,'thang'=>$thang,'nam'=>$nam])}}" class="btn btn-primary" style="border-radius: 10px;" type="button">Thêm Mới</a>
=======
                    <a href="" class="btn btn-primary" style="border-radius: 10px;" type="button" data-toggle="modal"
                       data-target="#add">Thêm Mới</a>
                    <div class="modal fade" id="add" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="pd" style="margin: 20px;">
                                    <h3 style="text-shadow: 1px 1px 1px #2a383e;margin-top: 45px;margin-bottom: 45px;font-size: 30px;font-weight: 100;">
                                        <span style="color: red;font-size: 40px;">|</span>Điền thông tin:</h3>
                                    <form action="{{route('admin.post.CreateNhansuChitieu.chitieu')}}" method="post">
                                        @csrf
                                        <p><b>Chỉ tiêu:</b></p>
                                        <br>
                                        <select class="form-control" id="readOnlyInput" type="text"
                                                name="idchitieu"
                                                style="width: 50%;">
                                            @foreach($chitieu as $ct)
                                                <option value="{{$ct->id}}">{{$ct->ten_chi_tieu}}</option>
                                            @endforeach
                                        </select>
                                        <br>
                                        <p><b>Điểm chỉ tiêu:</b></p>
                                        <br>
                                        <input class="form-control is-valid" id="inputValid" type="text"
                                               value="{{old('diemchitieu')}}"
                                               name="diemchitieu" style="width: 30%;">
                                        @if($errors->has('diemchitieu'))
                                            <span style="font-size: 12px;color: red">
                                         <i>{{$errors->first('diemchitieu')}}</i>
                                        </span>
                                        @endif
                                        <br>
                                        {{--<p><b>Nhân sự:</b></p>--}}
                                        @foreach($chitietchitieu as $ctct)
                                        <input class="form-control" id="readOnlyInput" type="hidden" readonly=""
                                               value="{{$ctct->idnhansu}}"
                                               name="idnhansu" style="width: 70%;">
                                        @endforeach
                                        <br>
                                        {{--<p><b>Thangs:</b></p>--}}
                                        <input class="form-control" id="readOnlyInput" type="hidden" readonly=""
                                               value="{{$thang}}"
                                               name="thang" style="width: 70%;">
                                        {{--<p><b>nam:</b></p>--}}
                                        <input class="form-control" id="readOnlyInput" type="hidden" readonly=""
                                               value="{{$nam}}"
                                               name="nam" style="width: 70%;">
                                        <center>
                                            <button class="btn btn-primary" type="submit">Thêm</button>
                                        </center>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
>>>>>>> 822f03cc2f1d6660b5353e5a26165140ea09fb01
                </div>


            </div>
            <ul class="app-breadcrumb breadcrumb">
<<<<<<< HEAD
                <div style="position: absolute;top: 70px;right: 310px;">
                    @if (session('statusupdate'))
                        <div class="chuthich right wow slideInRight" style="width: 300px;display: block;" data-wow-duration="1s">
                            <div class="arroww" style="top: 50%;"></div>
                            <h3 class="chuthich-title" style="color:red;">Thông báo!</h3>
                            <div class="chuthich-content">{{ session('statusupdate') }}</div>
                        </div>
                    @elseif (session('statusdelete'))
                        <div class="chuthich right wow slideInRight" data-wow-duration="1s" style="width: 300px;display: block;">
                            <div class="arroww" style="top: 50%;"></div>
                            <h3 class="chuthich-title" style="color:red;">Thông báo!</h3>
                            <div class="chuthich-content">{{ session('statusdelete') }}</div>
                        </div>
                    @else
                        <div class="chuthich right " style="width: 300px;display: block;">
                            <div class="arroww" style="top: 50%;"></div>
                            <h3 class="chuthich-title" style="color:red;">Thông báo!</h3>
                            <div class="chuthich-content">Không có thông báo!</div>
                        </div>
                    @endif
                </div>
                <li class="breadcrumb-item"><a><i class="fa fa-bell-o fa-lg"></i></a></li>
                <li class="breadcrumb-item"><a href="{{route('admin.trangchu')}}"> <i class="fa fa-home fa-lg"></i></a></li>
=======
                <li class="breadcrumb-item"><a href="{{route('admin.trangchu')}}"> <i class="fa fa-home fa-lg"></i></a>
                </li>
>>>>>>> 822f03cc2f1d6660b5353e5a26165140ea09fb01
                <li class="breadcrumb-item"><a href="{{route('admin.get.list.chitieu')}}">Chỉ tiêu</a></li>
                <li class="breadcrumb-item"><a href="{{route('admin.get.IndexNhansu.chitieu')}}">Chỉ tiêu của nhân
                        sự</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-4 tile">
                <div class="row">
                    <div class="col-md-5">
                        <h6>
                            @foreach($nhansu as $ns)
                                Nhân sự: {{$ns->ho_ten}}
                            @endforeach
                        </h6>
                    </div>
                    <div class="col-md-7">
                        <h6>
                            Thời gian: {{$thang}} - {{$nam}}
                        </h6>
                    </div>
                </div>


            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div id="sampleTable_wrapper"
                             class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
<<<<<<< HEAD

=======
                            <div class="row">
                                <div class="col-sm-12 col-md-6">

                                </div>
                            </div>
>>>>>>> 822f03cc2f1d6660b5353e5a26165140ea09fb01
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-hover table-bordered dataTable no-footer" id="sampleTable"
                                           role="grid" aria-describedby="sampleTable_info">
                                        <thead>
                                        <tr role="row">

                                            <th class="sorting" tabindex="" aria-controls="" rowspan=""
                                                colspan="" aria-label=""
                                                style="width: 14%;">Tên chỉ tiêu
                                            </th>
                                            <th class="sorting" tabindex="" aria-controls="" rowspan=""
                                                colspan="" aria-label=""
                                                style="width: 10%;">Điểm chỉ tiêu
                                            </th>
                                            <th class="sorting" tabindex="" aria-controls="" rowspan=""
                                                colspan="" aria-label=""
                                                style="width: 10%;">Điểm đạt được
                                            </th>
                                            <th class="sorting" tabindex="" aria-controls="" rowspan=""
                                                colspan="" aria-label=""
                                                style="width: 5%;">Thao tác
                                            </th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($chitietchitieu as $ctct)
                                            @if($ctct->thang != null)
                                            <tr>
                                                <td>
                                                    {{$ctct->ten_chi_tieu}}

                                                </td>
                                                <td>
                                                    <input class="form-control"  type="text"  value="{{$ctct->diem_chi_tieu}}" >
                                                </td>
                                                <td>
                                                    <input class="form-control"  type="text"  value="{{$ctct->diem_dat_duoc}}" >

                                                </td>
                                                <td>@if($ctct->id != null)
                                                    <button data-idid="{{$ctct->id}}"
                                                            data-idchitieu="{{$ctct->idchitieu}}"
                                                            data-idnhansu="{{$ctct->idnhansu}}"
                                                            data-diemct="{{$ctct->diem_chi_tieu}}"
                                                            data-diemdd="{{$ctct->diem_dat_duoc}}"
                                                            data-thag="{{$thang}}" data-namm="{{$nam}}"
                                                            class="btn btn-primary"
                                                            style="color: white;font-size: 10px;border: 20px;"
                                                            type="button" data-toggle="modal"
                                                            data-target="#updateChitieuNhansu">Cập nhật
                                                    </button>

                                                    <a href="{{route('admin.get.DeleteNhansuChitieu.chitieu',$ctct->id)}}"
                                                       style="color: white;font-size: 10px;border: 20px;"
                                                       class="btn btn-danger" type="button">Xóa</a></td>
                                                @endif
                                            </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{--<div class="row">--}}
                            {{--<div class="col-sm-12 col-md-5">--}}

                            {{--</div>--}}
                            {{--<div class="col-sm-12 col-md-7">--}}
                            {{--<div class="dataTables_paginate paging_simple_numbers" id="sampleTable_paginate">--}}
                            {{--<ul class="pagination">--}}
                            {{--<li class="paginate_button page-item active"--}}
                            {{--style="margin-left: 10px;">{{$chitieuchitieu->links()}}</li>--}}
                            {{--</ul>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            <div class="modal fade" id="updateChitieuNhansu" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-body pd" style="margin: 20px;">
                                            <h3 style="text-shadow: 1px 1px 1px #2a383e;margin-top: 30px;margin-bottom: 45px;font-size: 30px;font-weight: 100;">
                                                <span style="color: red;font-size: 40px;">|</span>Điền thông tin :</h3>
                                            <form action="{{route('admin.post.UpdateNhansuChitieu.chitieu')}}"
                                                  method="post">

                                                {{csrf_field()}}
                                                <input type="hidden" name="chitieuNhansu_id" id="id_id" value="">


                                                <input class="form-control" id="id_chitieu" type="hidden" readonly=""
                                                       value=""
                                                       name="idchitieu">

                                                <input class="form-control" id="id_nhansu" type="hidden" readonly=""
                                                       value=""
                                                       name="idnhansu">

                                                <input class="form-control" id="diemct" type="hidden" readonly=""
                                                       value=""
                                                       name="diemchitieu">
                                                <p><b>Điểm đạt được:</b></p>
                                                <input class="form-control is-valid" id="diemdd" type="text" value=""
                                                       name="diemdatduoc" style="width: 30%">
                                                <br>

                                                <input class="form-control is-valid" id="khen_thuong" type="hidden"
                                                       value=""
                                                       name="khenthuong">
                                                <input class="form-control" id="thag" type="hidden" readonly=""
                                                       value=""
                                                       name="thang">
                                                <input class="form-control" id="namm" type="hidden" readonly=""
                                                       value=""
                                                       name="nam">
                                                <input class="form-control" id="kq" type="hidden" readonly="" value=""
                                                       name="ketqua">

                                                <input class="form-control is-valid" id="canh_bao" type="hidden"
                                                       value=""
                                                       name="canhbao">
                                                <br>
                                                <center>
                                                    <button class="btn btn-primary" type="submit">Cập nhật</button>
                                                </center>

                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </main>
@stop
