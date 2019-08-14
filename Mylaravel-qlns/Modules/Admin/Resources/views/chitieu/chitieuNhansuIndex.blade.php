@extends('admin::layouts.master')

@section('content')

    <main class="app-content">
        <div class="app-title">
            <div class="row">
                <div class="col-md-12">
                    <h1><i class="app-menu__icon fa fa-laptop"></i>Chỉ tiêu của nhân sự</h1>
                </div>


            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.trangchu')}}"> <i class="fa fa-home fa-lg"></i></a>
                </li>
                <li class="breadcrumb-item"><a href="{{route('admin.get.list.chitieu')}}">Chỉ tiêu</a></li>
                <li class="breadcrumb-item"><a href="{{route('admin.get.IndexNhansu.chitieu')}}">Chỉ tiêu của nhân
                        sự</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div id="sampleTable_wrapper"
                             class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <form action="{{route('admin.post.IndexNhansu.chitieu')}}" method="post">
                                        @csrf
                                        <div id="sampleTable_filter" class="dataTables_filter">
                                            <label>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <select name="sheachthang" type="text"
                                                                class="form-control form-control-sm" aria-controls="sampleTable"
                                                                style="margin-top: 5px;margin-right: 10px;">
                                                            @foreach($thangnam as $tm)
                                                                <option>
                                                                    {{$tm->thang}}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <select name="sheachnam" type="text"
                                                                class="form-control form-control-sm" aria-controls="sampleTable"
                                                                style="margin-top: 5px;margin-right: 10px;">
                                                            @foreach($thangnam as $tm)
                                                                <option>
                                                                    {{$tm->nam}}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div style="padding: 0;">
                                                            <button class="btn-success" type="submit"
                                                                    style="border-radius: 50%;margin-top: 6px;"><i
                                                                        class="fa fa-search"></i></button>
                                                        </div>
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

                                            <th class="sorting" tabindex="" aria-controls="" rowspan=""
                                                colspan="" aria-label=""
                                                style="width: 10%;">Tên nhân sự
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
                                                style="width: 5%;">
                                            </th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($nhansu as $ns)
                                            <tr role="row" class="odd">
                                                <td>{{$ns->ho_ten}}</td>
                                                <td>{{$thang}}</td>
                                                <td>{{$nam}}</td>

                                                @foreach($nhansuchitieu as $nsct)
                                                    @if($ns->idns == $nsct->id_nhan_su)
                                                        @if(($nsct->sumddd / $nsct->sumdct) > 1)
                                                            <td style="border-bottom: 1px solid #dee2e6;">Vượt chỉ
                                                                tiêu
                                                            </td>
                                                            <td style="border-bottom: 1px solid #dee2e6;">Nhân sự xuất
                                                                sắc
                                                            </td>
                                                            <td style="border-bottom: 1px solid #dee2e6;">Không có cảnh
                                                                báo
                                                            </td>
                                                        @elseif(($nsct->sumddd / $nsct->sumdct) == 1)
                                                            <td style="border-bottom: 1px solid #dee2e6;">Bằng chỉ
                                                                tiêu
                                                            </td>
                                                            <td style="border-bottom: 1px solid #dee2e6;">Nhân sự giỏi
                                                            </td>
                                                            <td style="border-bottom: 1px solid #dee2e6;">Không có cảnh
                                                                báo
                                                            </td>
                                                        @elseif(($nsct->sumddd / $nsct->sumdct) < 1 && ($nsct->sumddd / $nsct->sumdct) > 0.5)
                                                            <td style="border-bottom: 1px solid #dee2e6;">Qua chỉ tiêu
                                                            </td>
                                                            <td style="border-bottom: 1px solid #dee2e6;">Nhân sự khá
                                                            </td>
                                                            <td style="border-bottom: 1px solid #dee2e6;">Không có cảnh
                                                                báo
                                                            </td>
                                                        @elseif(($nsct->sumddd / $nsct->sumdct) < 0.5 && ($nsct->sumddd / $nsct->sumdct) > 0)
                                                            <td style="border-bottom: 1px solid #dee2e6;">Không đạt chỉ
                                                                tiêu
                                                            </td>
                                                            <td style="border-bottom: 1px solid #dee2e6;">Nhân sự yếu
                                                            </td>
                                                            <td style="border-bottom: 1px solid #dee2e6;">Trừ lương</td>
                                                        @endif
                                                    @endif
                                                @endforeach
                                                <td>
                                                    <a href="{{route('admin.get.IndexNhansuChitieu.chitieu',['id'=>$ns->idns,'thang'=>$thang,'nam'=>$nam])}}"
                                                       class="btn btn-primary"
                                                       style="color: white;font-size: 10px;border: 20px;" type="button">Xem
                                                        chi tiết</a></td>
                                            </tr>
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
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </main>
@stop
