@extends('admin::layouts.master')

@section('content')
    <!---->
    <main class="app-content">
        <div class="app-title">
            <div class="row">
                <div class="col-md-9">
                    <h1><i class="app-menu__icon fa fa-laptop"></i>Chỉ tiêu của nhân sự</h1>
                </div>

                <div class="col-md-3">
                    {{--<a href="{{route('admin.get.danhsachchitieunhansuCreate.chitieu')}}" class="btn btn-primary"--}}
                    {{--style="border-radius: 10px;" type="button">Thêm Mới</a>--}}


                    <button
                            class="btn btn-primary"
                            style="border-radius: 10px;"
                            type="button" data-toggle="modal"
                            data-target="#chitieuNhansuCrete">Thêm mới
                    </button>
                </div>

            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.trangchu')}}"> <i class="fa fa-home fa-lg"></i></a>
                </li>
                <li class="breadcrumb-item"><a href="{{route('admin.get.list.chitieu')}}">Chỉ tiêu</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div id="sampleTable_wrapper"
                             class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">

                                </div>
                                {{--<div class="col-sm-12 col-md-6">--}}
                                {{--<div id="sampleTable_filter" class="dataTables_filter"><label>Tìm kiếm:<input--}}
                                {{--type="search" class="form-control form-control-sm" placeholder=""--}}
                                {{--aria-controls="sampleTable"></label></div>--}}
                                {{--</div>--}}
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-hover table-bordered dataTable no-footer" id="sampleTable"
                                           role="grid" aria-describedby="sampleTable_info">
                                        <thead>
                                        <tr role="row">
                                            {{--<th class="sorting_asc" tabindex="" aria-controls="" rowspan=""--}}
                                            {{--colspan="" aria-sort=""--}}
                                            {{--aria-label="" style="width: 30px;">--}}
                                            {{--Mã--}}
                                            {{--</th>--}}
                                            <th class="sorting_asc" tabindex="" aria-controls="" rowspan=""
                                                colspan="" aria-sort=""
                                                aria-label="" style="width: 10%;">
                                                Tên chỉ tiêu
                                            </th>
                                            <th class="sorting" tabindex="" aria-controls="" rowspan=""
                                                colspan="" aria-label=""
                                                style="width: 10%;">Tên nhân sự
                                            </th>
                                            <th class="sorting" tabindex="" aria-controls="" rowspan=""
                                                colspan="" aria-label=""
                                                style="width: 12%;">Điểm chỉ tiêu
                                            </th>
                                            <th class="sorting" tabindex="" aria-controls="" rowspan=""
                                                colspan="" aria-label=""
                                                style="width: 13%;">Điểm đạt được
                                            </th>
                                            <th class="sorting" tabindex="" aria-controls="" rowspan=""
                                                colspan="" aria-label=""
                                                style="width: 5%;">Tháng
                                            </th>
                                            <th class="sorting" tabindex="" aria-controls="" rowspan=""
                                                colspan="" aria-label=""
                                                style="width: 5%;">Năm
                                            </th>
                                            <th class="sorting" tabindex="" aria-controls="" rowspan=""
                                                colspan="" aria-label=""
                                                style="width: 9%;">Kết quả
                                            </th>
                                            <th class="sorting" tabindex="" aria-controls="" rowspan=""
                                                colspan="" aria-label=""
                                                style="width: 14%;">Khen thưởng
                                            </th>

                                            <th class="sorting" tabindex="" aria-controls="" rowspan=""
                                                colspan="" aria-label=""
                                                style="width: 10%;">Cảnh báo
                                            </th>
                                            <th class="sorting" tabindex="" aria-controls="" rowspan=""
                                                colspan="" aria-label=""
                                                style="width: 15%;">Thao tác
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($chitieuchitieu as $ctct)
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">{{$ctct->tenchitieu}}</td>
                                                <td>{{$ctct->hoten}}</td>
                                                <td>{{$ctct->diem_chi_tieu}}</td>
                                                <td>{{$ctct->diem_dat_duoc}}</td>
                                                <td>{{$ctct->thang}}</td>
                                                <td>{{$ctct->nam}}</td>
                                                <td>{{$ctct->ket_qua}}</td>
                                                <td>{{$ctct->khen_thuong}}</td>
                                                <td>{{$ctct->canh_bao}}</td>
                                                <td>
                                                    {{--<a href="{{route('admin.get.danhsachchitieunhansuUpdate.chitieu',$ctct->id)}}" style="color: white;font-size: 10px;border: 20px;" class="btn btn-info" type="button">Cập nhật</a>--}}
                                                    <button data-idid="{{$ctct->id}}"
                                                            data-idchitieu="{{$ctct->id_chi_tieu}}"
                                                            data-idnhansu="{{$ctct->id_nhan_su}}"
                                                            data-diemct="{{$ctct->diem_chi_tieu}}"
                                                            data-diemdd="{{$ctct->diem_dat_duoc}}"
                                                            data-khenthuong="{{$ctct->khen_thuong}}"
                                                            data-thag="{{$ctct->thang}}" data-namm="{{$ctct->nam}}"
                                                            data-canhbao="{{$ctct->canh_bao}}"
                                                            class="btn btn-primary"
                                                            style="color: white;font-size: 10px;border: 20px;"
                                                            type="button" data-toggle="modal"
                                                            data-target="#chitieuNhansu">Cập nhật
                                                    </button>
                                                    <a href="{{route('admin.get.delete.chitieu',$ctct->id)}}"
                                                       style="color: white;font-size: 10px;border: 20px;"
                                                       class="btn btn-danger" type="button">Xóa</a>
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-5">

                                </div>
                                <div class="col-sm-12 col-md-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="sampleTable_paginate">
                                        <ul class="pagination">
                                            <li class="paginate_button page-item active"
                                                style="margin-left: 10px;">{{$chitieuchitieu->links()}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="chitieuNhansu" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-body pd" style="margin: 20px;">
                                        <h3 style="text-shadow: 1px 1px 1px #2a383e;margin-top: 30px;margin-bottom: 45px;font-size: 30px;font-weight: 100;">
                                            <span style="color: red;font-size: 40px;">|</span>Điền thông tin :</h3>
                                        <form action="{{route('admin.get.danhsachchitieunhansuUpdate.chitieu')}}"
                                              method="post" onchange="thuchien()">

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
                                                   name="diemdatduoc" style="width: 200px">
                                            <br>
                                            <p><b>Khen thưởng:</b></p>
                                            <input class="form-control is-valid" id="khen_thuong" type="text"
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
                                            <p><b>Cảnh báo:</b></p>
                                            <input class="form-control is-valid" id="canh_bao" type="text"
                                                   value=""
                                                   name="canhbao">
                                            <br>
                                            <center>
                                                <button class="btn btn-primary" type="submit">Cập nhật</button>
                                            </center>


                                            {{--<p><b>Tên phòng:</b></p>--}}
                                            {{--<input class="form-control is-valid" id="title" type="text"--}}
                                            {{--value=""--}}
                                            {{--name="ten" style="width: 300px">--}}
                                            {{--<br>--}}
                                            {{--<p><b>Mô tả:</b></p>--}}
                                            {{--<textarea name="mo" id="des" cols="20" rows="3" class="form-control"></textarea>--}}
                                            {{--<br>--}}
                                            {{--<center>--}}
                                            {{--<button class="btn btn-primary" type="submit">Cập nhật</button>--}}
                                            {{--</center>--}}
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>


                        <!---Quản lý thêm mới-->
                        <div class="modal fade" id="chitieuNhansuCrete" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-body pd" style="margin: 20px;">
                                        <h3 style="text-shadow: 1px 1px 1px #2a383e;margin-top: 10px;margin-bottom: 25px;font-size: 30px;font-weight: 100;">
                                            <span style="color: red;font-size: 40px;">|</span>Mời chọn :</h3>
                                        <form action="{{route('admin.post.danhsachchitieunhansu.chitieu')}}" method="post">

                                            {{csrf_field()}}
                                            <p><b>Mã chỉ tiêu:</b></p>
                                            <select class="form-control" id="exampleSelect1" name="chitieuid">
                                                @foreach($chitieu as $ct)
                                                <option value="{{$ct->id}}">{{$ct->ten_chi_tieu}}</option>
                                                @endforeach
                                            </select>
                                            <br>
                                            <p><b>Phòng ban:</b></p>
                                            <input style="margin-left: 40px; margin-top: 10px;" type="checkbox" id="select_all"/> Chọn tất cả<br>
                                            <div class="row">
                                                @foreach($phong as $p)
                                                    <div class="col-md-6">
                                                        <input class="checkbox" style="margin-left: 40px; margin-top: 10px;" type="checkbox" name="check[]" value="{{$p->id}}"> {{$p->ten_phong}}
                                                    </div>


                                                @endforeach
                                            </div>

                                            <center style="margin-top: 30px;">
                                                <button class="btn btn-primary" type="submit">Thêm nhân sự</button>
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
    </main>
    <!---->
@stop
