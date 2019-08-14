@extends('admin::layouts.master')
@section('content')
    <main class="app-content">
        <div class="app-title">
            <div class="row">
                <div class="col-md-12">
                    <h1><i class="app-menu__icon fa fa-laptop"></i>Thêm mới chỉ tiêu nhân sự</h1>
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
                    @else
                        <div class="chuthich right " style="width: 300px;display: block;">
                            <div class="arroww" style="top: 50%;"></div>
                            <h3 class="chuthich-title" style="color:red;">Thông báo!</h3>
                            <div class="chuthich-content">Không có thông báo!</div>
                        </div>
                    @endif
                </div>
                <li class="breadcrumb-item"><a><i class="fa fa-bell-o fa-lg"></i></a></li>
                <li class="breadcrumb-item"><a href="{{route('admin.trangchu')}}"> <i class="fa fa-home fa-lg"></i></a>
                </li>
                <li class="breadcrumb-item"><a href="{{route('admin.get.list.chitieu')}}">Chỉ tiêu</a></li>
                <li class="breadcrumb-item"><a href="{{route('admin.get.IndexNhansuChitieu.chitieu',['id'=>$id,'thang'=>$thang,'nam'=>$nam])}}">Chỉ tiêu của nhân sự</a></li>
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
            <div class="col-md-1"></div>
            <!--add insert sql table-->
            <div class="col-md-10 tile">

                <form action="{{route('admin.post.AddNhansuChitieu.chitieu')}}" method="post">
                    @csrf
                    <section>
                        <div class="panel panel-footer">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th width="30%">Tên chỉ tiêu</th>
                                    <th width="20%">Điểm chỉ tiêu</th>
                                    <th width="20%">Điểm đạt được</th>
                                    <th width="5%" >
                                        <a data-toggle="tooltip" title="add" data-placement="left">
                                            <button href="" class="btn btn-warning addRow" style="border-radius: 10px;" type="button">+</button>
                                        </a>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <select class="form-control" id="readOnlyInput" type="text" name="product_name[]" style="width: 90%;">
                                            @foreach($chitieu as $ct)
                                                <option value="{{$ct->id}}">{{$ct->ten_chi_tieu}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td><input type="text" name="quantity[]" class="form-control quantity" required="" style="width: 40%;"></td>
                                    <td><input type="text" name="budget[]" class="form-control budget" readonly style="width: 40%;"></td>
                                    <td><button class="btn badge badge-danger remove">Xóa</button></td>
                                    <input type="hidden" name="idns[]" class="form-control budget" value="{{$id}}">
                                    <input type="hidden" name="thang[]" class="form-control budget" value="{{$thang}}">
                                    <input type="hidden" name="nam[]" class="form-control budget" value="{{$nam}}">
                                </tr>
                                </tbody>
                            </table>
                            <center>
                                <input type="submit" name="" value="Thực hiện" class="btn btn-success">
                            </center>
                        </div>
                    </section>
                </form>


            </div>
            <div class="col-md-1"></div>
        </div>
    </main>
    <!--add insert table sql-->
    <script src="ThemeAdmin/js/jquery.min.js"></script>
    <script type="text/javascript">
        $('tbody').delegate('.quantity,.budget','keyup',function(){
            var tr=$(this).parent().parent();
            var quantity=tr.find('.quantity').val();
            var budget=tr.find('.budget').val();
            var amount=(quantity*budget);
            tr.find('.amount').val(amount);
            total();
        });
        function total(){
            var total=0;
            $('.amount').each(function(i,e){
                var amount=$(this).val()-0;
                total +=amount;
            });
            $('.total').html(total+".00 tk");
        }
        $('.addRow').on('click',function(){
            addRow();
        });
        function addRow()
        {
            var tr='<tr>'+
                '<td><select class="form-control" id="readOnlyInput" type="text" name="product_name[]" style="width: 90%;">@foreach($chitieu as $ct)<option value="{{$ct->id}}">{{$ct->ten_chi_tieu}}</option>@endforeach</select></td>'+
                '<td><input type="text" name="quantity[]" class="form-control quantity" required="" style="width: 40%;"></td>'+
                '<td><input type="text" name="budget[]" class="form-control budget" readonly style="width: 40%;"></td>'+
                    '<input type="hidden" name="idns[]" class="form-control budget" value="{{$id}}">'+
                    ' <input type="hidden" name="thang[]" class="form-control budget" value="{{$thang}}">'+
                    '<input type="hidden" name="nam[]" class="form-control budget" value="{{$nam}}">'+
                '<td><button class="btn badge badge-danger remove">Xóa</button></td>'+
                '</tr>';
            $('tbody').append(tr);
        };
        $('.remove').live('click',function(){

            var last=$('tbody tr').length;
            if(last == 1){
                alert("you can not remove last row");
            }
            else{
                $(this).parent().parent().remove();
            }

        });
    </script>
@stop
