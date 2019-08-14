@extends('admin::layouts.master')

@section('content')
    <!---->
    <main class="app-content">
        <div class="app-title">
            <div class="row">
                <div class="col-md-9">
                    <h1><i class="app-menu__icon fa fa-laptop"></i> Nhật ký nhân viên</h1>
                </div>

                <div class="col-md-3">
                    <a data-toggle="tooltip" title="add" data-placement="left">
                        <button data-toggle="modal" data-target="#addNhatKyPhong" class="btn btn-primary" style="border-radius: 10px;" type="button">Thêm Mới</button>
                    </a>
                    <!-- Modal -->
                    <div class="modal fade" id="addNhatKyPhong" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="pd" style="margin: 20px;">
                                    <h3 style="text-shadow: 1px 1px 1px #2a383e;margin-top: 45px;margin-bottom: 45px;font-size: 30px;font-weight: 100;">
                                        <span style="color: red;font-size: 40px;">|</span>Điền thông tin:</h3>
                                    <form action="{{route('admin.post.nhatkyCreate.phong')}}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div style="margin-left: 30px;">
                                                    <p><b>Tên phòng ban:</b></p><br>
                                                    <select class="form-control" id="exampleSelect1" name="idphongban" style="width: 60%">
                                                        @foreach($phong as $pb)
                                                            <option value="{{$pb->id}}">{{$pb->ten_phong}}</option>
                                                        @endforeach
                                                    </select>
                                                    <br>
                                                    <p><b>Họ tên nhân sự:</b></p><br>
                                                    <select class="form-control" id="exampleSelect1" name="idnhansu" style="width: 75%">
                                                        @foreach($nhansu as $ns)
                                                            <option value="{{$ns->id}}">{{$ns->ho_ten}}</option>
                                                        @endforeach
                                                    </select>
                                                    <br>
                                                    <p><b>Tên vị trí:</b></p><br>
                                                    <select class="form-control" id="exampleSelect1" name="idvitri" style="width: 60%">
                                                        @foreach($vitri as $vt)
                                                            <option value="{{$vt->id}}">{{$vt->ten_vi_tri}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <p><b>Ngày kết thúc:</b></p><br>
                                                <input class="form-control is-valid" id="inputValid" type="date"
                                                       value="{{old('ngayketthuc')}}"
                                                       name="ngayketthuc" style="width: 50%">
                                                <br>
                                                <p><b>Ghi chú:</b></p><br>
                                                <textarea name="ghichu" id="inputValid" cols="20" rows="5" class="form-control">{{old('ghichu')}}</textarea>
                                                @if($errors->has('ghichu'))
                                                    <span style="font-size: 12px;color: red">
                                                        <i>{{$errors->first('ghichu')}}</i>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <center style="margin-top: 40px;">
                                            <button class="btn btn-primary" type="submit">Thêm</button>
                                        </center>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <ul class="app-breadcrumb breadcrumb">

                <div style="position: absolute;top: 70px;right: 310px;">
                    @if (session('statusadd'))
                        <div class="chuthich right wow slideInRight" data-wow-duration="1s" style="width: 300px;display: block;">
                            <div class="arroww" style="top: 50%;"></div>
                            <h3 class="chuthich-title" style="color:red;">Thông báo!</h3>
                            <div class="chuthich-content">{{ session('statusadd') }}</div>
                        </div>
                    @elseif (session('statusupdate'))
                        <div class="chuthich right wow slideInRight" style="width: 300px;display: block;" data-wow-duration="1s">
                            <div class="arroww" style="top: 50%;"></div>
                            <h3 class="chuthich-title" style="color:red;">Thông báo!</h3>

                            <div class="chuthich-content">{{ session('statusupdate') }}</div>
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
                <li class="breadcrumb-item"><a href="{{route('admin.trangchu')}}"><i class="fa fa-home fa-lg"></i></a> </li>
                <li class="breadcrumb-item"><a href="{{route('admin.get.list.phong')}}">Phòng ban</a></li>
                <li class="breadcrumb-item"><a href="{{route('admin.get.nhatkyIndex.phong')}}">Nhật ký nhân viên</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div id="sampleTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">

                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <form action="{{route('admin.post.nhatkyIndex.phong')}}" method="post">
                                        @csrf
                                        <div id="sampleTable_filter" class="dataTables_filter">
                                            <label>
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <select  name="name" type="text" class="form-control form-control-sm"  aria-controls="sampleTable" style="margin-top: 5px;margin-right: 10px;">

                                                            @foreach($phong as $p)
                                                                <option>
                                                                    {{$p->ten_phong}}
                                                                </option>
                                                            @endforeach

                                                        </select>
                                                    </div>

                                                  <div class="col-md-3" style="padding: 0;">
                                                      <button class="btn-success" type="submit" style="border-radius: 50%;margin-top: 6px;"><i class="fa fa-search"></i></button>
                                                  </div>

                                                </div>

                                            </label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-hover table-bordered dataTable no-footer" id="sampleTable"
                                           role="grid" aria-describedby="sampleTable_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="" aria-controls="" rowspan=""
                                                colspan="" aria-sort=""
                                                aria-label="" style="width: 199px;">
                                                Tên phòng ban
                                            </th>
                                            <th class="sorting_asc" tabindex="" aria-controls="" rowspan=""
                                                colspan="" aria-sort=""
                                                aria-label="" style="width: 199px;">
                                                Tên nhân sự
                                            </th>
                                            <th class="sorting" tabindex="" aria-controls="" rowspan=""
                                                colspan="" aria-label=""
                                                style="width: 322px;">Tên vị trí
                                            </th>
                                            <th class="sorting" tabindex="" aria-controls="" rowspan=""
                                                colspan="" aria-label=""
                                                style="width: 322px;">Ngày làm
                                            </th>
                                            <th class="sorting" tabindex="" aria-controls="" rowspan=""
                                                colspan="" aria-label=""
                                                style="width: 250px;">Ngày kết thúc
                                            </th>
                                            <th class="sorting" tabindex="" aria-controls="" rowspan=""
                                                colspan="" aria-label=""
                                                style="width: 394px;">Ghi chú
                                            </th>
                                            <th class="sorting" tabindex="" aria-controls="" rowspan=""
                                                colspan="" aria-label=""
                                                style="width: 100px;">Thao tác
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($lamviec as $lv)
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">{{$lv->tenphong}}</td>
                                                <td>{{$lv->hoten}}</td>
                                                <td>{{$lv->tenvitri}}</td>
                                                <td>{{$lv->ngaylam}}</td>
                                                <td>{{$lv->ngayketthuc}}</td>
                                                <td>{{$lv->ghichu}}</td>

                                                <td>
                                                    {{--<a data-toggle="tooltip" title="update" data-placement="top" href="{{route('admin.get.nhatkyUpdate.phong',$lv->idlamviec)}}" style="color: white;font-size: 10px;border: 20px;" class="btn btn-info" type="button">Cập nhật</a>--}}
                                                    <a data-toggle="tooltip" title="update" data-placement="top">
                                                        <button data-idlv="{{$lv->idlamviec}}"
                                                                data-idpb="{{$lv->idphongban}}"
                                                                data-idns="{{$lv->idnhansu}}"
                                                                data-idvt="{{$lv->idvitri}}"
                                                                data-datekt="{{$lv->ngayketthuc}}"
                                                                data-mota="{{$lv->ghichu}}"
                                                                class="btn btn-primary"
                                                                style="color: white;font-size: 10px;border: 20px;"
                                                                type="button" data-toggle="modal" data-target="#editNhatKyPhong">
                                                            Cập
                                                            nhật
                                                        </button>
                                                    </a>
                                                </td>

                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <div class="modal fade" id="editNhatKyPhong" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-body pd" style="margin: 20px;">
                                            <h3 style="text-shadow: 1px 1px 1px #2a383e;margin-top: 30px;margin-bottom: 45px;font-size: 30px;font-weight: 100;">
                                                <span style="color: red;font-size: 40px;">|</span>Điền thông tin Phòng
                                                ban:</h3>
                                            <form action="{{route('admin.post.nhatkyUpdate.phong')}}" method="post">
                                                {{csrf_field()}}
                                                <input type="hidden" name="lamviec_id" id="id_id" value="">
                                                        {{--<p><b>Mã phòng ban:</b></p>--}}
                                                        <input class="form-control" id="idphongban" type="hidden"  readonly="" value="{{old('idphongban')}}"
                                                               name="idphongban" style="width: 30%;">
                                                        {{--<p><b>Mã nhân sự:</b></p>--}}
                                                        <input class="form-control" id="idnhansu" type="hidden" readonly="" value="{{old('idnhansu')}}"
                                                               name="idnhansu" style="width: 40%;">
                                                        {{--<p><b>Mã vị trí:</b></p>--}}
                                                        <input class="form-control" id="idvitri" type="hidden" readonly="" value="{{old('idvitri')}}"
                                                               name="idvitri" style="width: 30%;">
                                                        <p><b>Ngày kết thúc:</b></p>
                                                        <input class="form-control is-valid" id="ngayketthuc" type="date" value="{{old('ngayketthuc')}}"
                                                               name="ngayketthuc" style="width: 50%;"><br>
                                                        @if($errors->has('ngayketthuc'))
                                                            <span style="font-size: 12px;color: red">
                                                                <i>{{$errors->first('ngayketthuc')}}</i>
                                                            </span>
                                                        @endif
                                                        <p><b>Ghi chú:</b></p><br>
                                                        <textarea name="ghichu" id="ghichu" cols="20" rows="3" class="form-control">{{old('ghichu')}}</textarea>
                                                        @if($errors->has('ghichu'))
                                                            <span style="font-size: 12px;color: red">
                                                                <i>{{$errors->first('ghichu')}}</i>
                                                            </span>
                                                        @endif
                                                <br>
                                                        <center>
                                                            <button class="btn btn-primary" type="submit">Cập nhật</button>
                                                        </center>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-5">

                                </div>
                                <div class="col-sm-12 col-md-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="sampleTable_paginate">
                                        <ul class="pagination">
                                            <li class="paginate_button page-item active" style="margin-left: 10px;">{{$lamviec->links()}}</li>
                                        </ul>
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
