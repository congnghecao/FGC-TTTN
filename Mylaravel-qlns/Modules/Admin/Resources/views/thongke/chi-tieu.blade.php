@extends('admin::layouts.master')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <div class="row">
                <h1><i class="app-menu__icon fa fa-laptop"></i> Thống kê</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.trangchu')}}">
                        <i class="fa fa-home fa-lg"></i></a></li>
                <li class="breadcrumb-item"><a href="">Thống kê</a></li>
            </ul>
        </div>
        <?php $date = getdate()?>
        <div class="row">
            <div class="col-xl-8 col-lg-7 mb-4">
                <!-- Area Chart -->
                <div class="card shadow" style="height: 100%">
                    <div class="card-header py-3">
                        <form name="chitieu" action="admin/thongke/chi-tieu" method="post">
                            @csrf
                            <div class="row pb-2">
                                <div class="col-md-2 col-2 p-0">
                                    Chọn chỉ tiêu:
                                </div>
                                <div class="col-md-4 col-4 p-0">
                                    <select class="form-control" id="chitieu" name="chitieu">
                                        @foreach($chitieu as $ct)
                                            @if($ct->id == $id)
                                                <option selected value="{{$ct->id}}">{{$ct->ten_chi_tieu}}</option>
                                            @else
                                                <option value="{{$ct->id}}">{{$ct->ten_chi_tieu}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2 col-2">
                                    Chọn năm:
                                </div>
                                <div class="col-md-4 col-4 p-0">
                                    <select class="form-control" id="nam" name="nam">
                                        @foreach($minNam as $a)
                                            @for($i = $date['year'];$i >= $a->nam; $i--)
                                                @if($i == $nam)
                                                    <option selected value="{{$i}}">{{$i}}</option>
                                                @else
                                                    <option value="{{$i}}">{{$i}}</option>
                                                @endif
                                            @endfor
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <h4 class="font-weight-bold text-primary">Biểu đồ biến động chỉ tiêu của nhân sự theo
                                từng tháng của năm {{$nam}}</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart-area" style="position: relative; height:40vh; width:80vw">
                            <canvas id="lineChiTieu" dat="{{$strDat}}" kdat="{{$strKDat}}" vdat="{{$strVDat}}"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Donut Chart -->
            <div class="col-xl-4 col-lg-5 mb-4">
                <div class="card shadow" style="height: 100%">
                    {{--<!-- Card Header - Dropdown -->--}}
                    <div class="card-header py-3">
                        <div class="row">
                            <h4 class="font-weight-bold text-primary">Biểu đồ biến động chỉ tiêu của nhân sự theo
                                năm {{$nam}}</h4>
                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-pie" style="position: relative; height:40vh; width:80vw">
                            <canvas id="pieChiTieu" dat="{{$sumDat}}" kdat="{{$sumKDat}}" vdat="{{$sumVDat}}"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12">
                <!-- Bar Chart -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h4 class="m-0 font-weight-bold text-primary">Biểu đồ biến động chỉ tiêu của nhân sự theo từng
                            năm</h4>
                    </div>
                    <div class="card-body">
                        <div class="chart-bar" style="position: relative; height:40vh; width:80vw">
                            <canvas id="barChiTieu" nam="{{$strNam}}" dat="{{$strNamDat}}" kdat="{{$strNamKDat}}"
                                    vdat="{{$strNamVDat}}"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection