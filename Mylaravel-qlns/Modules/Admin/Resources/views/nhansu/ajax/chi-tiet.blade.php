<h6 class="dropdown-header text-center"
    style="color: black;font-weight: bold">{{$nhansu->id."_".$nhansu->ho_ten}}</h6>
<hr width="50%" color="black" class="mt-1 mb-0">
<p class="text-center small text-gray-500 m-0 pb-0">
    <b class="">Nơi thường trú:</b> {{$nhansu->noi_thuong_tru}}
</p>
<p class="dropdown-item d-flex align-items-center small text-gray-500 m-0 pb-0">
    @if($nhansu->ngay_hoc_viec !== null)
        <b>{{'- Thời gian học việc: '}}</b>
        {{'__Từ '.$nhansu->ngay_hoc_viec.' '}}
    @endif
    @if($nhansu->ngay_kt_hoc_viec !== null)
        {{'đến '.$nhansu->ngay_kt_hoc_viec}}
    @endif
</p>
<p class="dropdown-item d-flex align-items-center small text-gray-500 m-0 pb-0 pt-0">
    @if($nhansu->ngay_thu_viec !== null)
        <b>{{'- Thời gian thử việc: '}}</b>
        {{'__Từ '.$nhansu->ngay_thu_viec.' '}}
    @endif
    @if($nhansu->ngay_kt_thu_viec !== null)
        {{'đến '.$nhansu->ngay_kt_thu_viec}}
    @endif
</p>
<p class="dropdown-item d-flex align-items-center small text-gray-500 m-0 pb-0 pt-0">
    @if($nhansu->ngay_lam_chinh_thuc !== null)
        <b>{{'- Thời gian làm chính thức: '}}</b>
        {{'__Từ '.$nhansu->ngay_lam_chinh_thuc.' '}}
    @endif
    @if($nhansu->ngay_lam_ket_thuc !== null)
        {{' đến'.$nhansu->ngay_lam_ket_thuc}}
    @endif
</p>
@foreach($lamviec as $lv)
    <p class="dropdown-item d-flex align-items-center small text-gray-500 m-0 pb-0 pt-0">
        <b class="mr-1">- Vị trí: </b>{{$lv->ten_vi_tri}}
        <b>__</b>{{$lv->ten_phong}}
        <b class="ml-3">Thời gian làm:</b>
        @if($lv->ngay_lam !== null)
            {{'__Từ '.$lv->ngay_lam.' '}}
        @endif
        @if($lv->ngay_ket_thuc !== null)
            {{' đến'.$lv->ngay_ket_thuc}}
        @endif
    </p>
@endforeach
@if(sizeof($lamviec) !== 0)
    <a class="dropdown-item text-center small" style="color: #0c5460"
       href="admin/nhansu/lich-su-cong-tac/{{$nhansu->id}}">
        xem lịch sử công tác</a>
@endif