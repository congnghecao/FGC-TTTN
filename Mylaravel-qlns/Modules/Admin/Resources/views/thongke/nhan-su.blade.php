@extends('admin::layouts.master')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <div class="row">
                <h1><i class="app-menu__icon fa fa-laptop"></i> Thống kê</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.trangchu')}}"><i class="fa fa-home fa-lg"></i></a>
                </li>
                <li class="breadcrumb-item"><a href="">Thống kê</a></li>

            </ul>
        </div>
        <div class="row">
            <?php $date = getdate()?>
            <div class="col-xl-8 col-lg-7 mb-4">
                <!-- Area Chart -->
                <div class="card shadow" style="height: 100%">
                    <div class="card-header py-3">
                        <div class="row">
                            <div class="mr-auto col-md-10">
                                <h4 class="font-weight-bold text-primary">Biểu đồ biến động nhân sự theo
                                    từng tháng của năm {{$nam}}</h4>
                            </div>
                            <div class="col-md-2">
                                <form name="nam1" action="admin/thongke/nhan-su" method="post">
                                    @csrf
                                    <select class="form-control" id="nam1" name="nam1">
                                        @for($i = $date['year'];$i >= $minNam; $i--)
                                            @if($i == $nam)
                                                <option selected value="{{$i}}">{{$i}}</option>
                                            @else
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endif
                                        @endfor
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart-area" style="position: relative; height:40vh; width:80vw">
                            <canvas id="myAreaChart" attrVao="{{$strLam}}" attrRa="{{$strNghi}}"></canvas>
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
                            <div class="col-md-8">
                                <h4 class="font-weight-bold text-primary">Biểu đồ biến động nhân sự theo
                                    năm {{$nam}}</h4>
                            </div>
                            <div class="col-md-4 pl-0">
                                <form name="nam2" action="admin/thongke/nhan-su" method="post">
                                    @csrf
                                    <select class="form-control" id="nam2" name="nam2">
                                        @for($i = $date['year'];$i >= $minNam; $i--)
                                            @if($i == $nam)
                                                <option selected value="{{$i}}">{{$i}}</option>
                                            @else
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endif
                                        @endfor
                                    </select>
                                </form>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-pie" style="position: relative; height:40vh; width:80vw">
                            <canvas id="myPieChart" lamn="{{$lamn}}" nghin="{{$nghin}}"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12">
                <!-- Bar Chart -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h4 class="m-0 font-weight-bold text-primary">Biểu đồ biến động nhân sự theo từng năm</h4>
                    </div>
                    <div class="card-body">
                        <div class="chart-bar" style="position: relative; height:40vh; width:80vw">
                            <canvas id="myBarChart" nam="{{$strNam}}" data="{{$strBar}}"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection