<div class="row">
    <div class="form-group col-md-6">
        <label class="control-label" for="phongbans">Phòng
            ban</label>
        <span class="erro pl-1">*</span>
        <select class="form-control" id="phongbans"
                name="phongbans">
            @foreach($phongban as $pb)
                @if($pb->id === $lamviec->id_phong_ban)
                    <option value="{{$pb->id}}" selected="true">{{$pb->ten_phong}}</option>
                @else
                    <option value="{{$pb->id}}">{{$pb->ten_phong}}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-6">
        <label class="control-label" for="vitris">Vị trí</label>
        <span class="erro pl-1">*</span>
        <select class="form-control" id="vitris" name="vitris">
            @foreach($vitri as $vt)
                @if($vt->id === $lamviec->id_vi_tri)
                    <option selected="true" value="{{$vt->id}}">{{$vt->ten_vi_tri}}</option>
                @else
                    <option value="{{$vt->id}}">{{$vt->ten_vi_tri}}</option>
                @endif
            @endforeach
        </select>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Ngày vào làm</label><span class="erro pl-1">*</span>
            <input disabled class="form-control" type="text" name="ngayvao" placeholder="22/07/1997"
                   value="{{$lamviec->ngay_lam}}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Ngày kết thúc</label>
            <input class="form-control" type="date" name="ngaykt" placeholder="22/07/1997"
                   value="{{$lamviec->ngay_ket_thuc}}">
        </div>
    </div>
</div>
<div class="text-center">
    <span class="erro" id="erroSua"></span><span class="alert-success" id="okSua"></span><br>
    <button class="btn btn-primary mt-1" id="btn-sua" nhansu="{{$lamviec->id_nhan_su}}">
        <i class="fa fa-fw fa-lg fa-check-circle"></i>Cập nhật
    </button>
</div>