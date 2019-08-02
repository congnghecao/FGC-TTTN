<form id="suaXN" action="admin/xinnghi/sua/{{$xinnghi->id}}" method="post">
    @csrf
    <div class="row">
        <div class="form-group col-md-6">
            <label class="control-label">Mã nhân sự</label>
            <span class="erro pl-1">*</span>
            <input class="form-control" type="text" placeholder="vd: 1" value="{{$xinnghi->id_nhan_su}}"
                   name="id_nhan_sus">
            <span class="erro erroIDns"></span>
        </div>
        <div class="form-group col-md-6">
            <label class="control-label">Số buổi nghỉ</label>
            <span class="erro pl-1">*</span>
            <input class="form-control" type="number" name="sbns"
                   value="{{$xinnghi->so_buoi_nghi}}" placeholder="vd: 1">
            <span class="erro erroSbns"></span>
        </div>
        <h6 class="text-center col-md-12">----- Thời gian nghỉ -----</h6>
        <div class="form-group col-md-6">
            <label class="control-label">Ngày bắt đầu</label><span class="erro pl-1">*</span>
            <input class="form-control" type="date" name="nbds" value="{{$xinnghi->ngay_bat_dau}}">
            <span class="text-center erro erroNbds"></span>
        </div>
        <div class="form-group col-md-6">
            <label class="control-label">Ngày kết thúc</label>
            <input class="form-control" type="date" name="nkts" value="{{$xinnghi->ngay_ket_thuc}}">
            <span class="text-center erro erroNkts"></span>
        </div>
        <div class="form-group col-md-12">
            <label class="control-label">Lý do nghỉ</label>
            <span class="erro pl-1">*</span>
            <textarea class="form-control" rows="2" name="ldns">{{$xinnghi->ly_do}}</textarea>
            <span class="col-md-12 p-0 text-center erro erroLdns"></span>
        </div>
        <div class="form-group col-md-4">
            <label class="control-label" for="vitris">Chuyển tới ai</label>
            <span class="erro pl-1">*</span>
            <select class="form-control" id="vitris" name="vitris">
                @foreach($vitri as $vt)
                    @if($vt->ten_vi_tri === $xinnghi->chuyen_toi_ai)
                        <option selected="true" value="{{$vt->ten_vi_tri}}">{{$vt->ten_vi_tri}}</option>
                    @else
                        <option value="{{$vt->ten_vi_tri}}">{{$vt->ten_vi_tri}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-4">
            <label class="control-label" for="loainghis">Loại
                nghỉ</label>
            <span class="erro pl-1">*</span>
            <select class="form-control" id="loainghis" name="loainghis">
                <option value="Nghỉ ngày">Nghỉ ngày</option>
                <option value="Nghỉ phép">Nghỉ phép</option>
                <option value="Nghỉ việc">Nghỉ việc</option>
            </select>
        </div>

        <div class="form-group col-md-4">
            <label class="control-label" for="tts">Phê duyệt</label>
            <span class="erro pl-1">*</span>
            <select class="form-control" id="tts" name="tts">
                <option value="1">Đã phê duyệt</option>
                <option value="0">Chưa phê duyệt</option>
            </select>
        </div>

        <div class="text-center col-md-12">
            <button class="btn btn-primary mt-1" id="btn-sua">
                <i class="fa fa-fw fa-lg fa-check-circle"></i>Cập nhật
            </button>
        </div>
    </div>
</form>