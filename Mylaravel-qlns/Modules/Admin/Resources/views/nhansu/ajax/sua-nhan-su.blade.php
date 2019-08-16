<form id="suaNS" action="admin/nhansu/sua/{{$nhansu->id}}" method="post">
    @csrf
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">Họ tên</label><span class="erro pl-1">*</span>
                <input id="hoten" autocomplete="true" class="form-control" type="text"
                       placeholder="VD: Nguyễn Xuân Hạnh" name="hotens" value="{{$nhansu->ho_ten}}">
                <span class="erro erroHoten"></span>
            </div>
            <div class="form-group">
                <label class="control-label">Ngày sinh</label><span class="erro pl-1">*</span>
                <input class="form-control" type="date" name="ngaysinhs" value="{{$nhansu->ngay_sinh}}"
                       placeholder="22/07/1997"><span class="erro erroNgaysinh"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">CMND</label><span class="erro pl-1">*</span>
                <input class="form-control" type="number" placeholder="VD: 187701990" name="cmnds" value="{{$nhansu->cmnd}}">
                <span class="erro erroCmnd"></span>
            </div>
            <div class="form-group">
                <label class="control-label">Email</label>
                <span class="erro pl-1">*</span>
                <input class="form-control"
                       name="emails" placeholder="...@gmail.com">
                <span class="erro erroEmail"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">Nơi thường trú</label><span class="erro pl-1">*</span>
                <textarea class="form-control" rows="4" name="ntts"
                          placeholder="VD: Khối/xóm - phường/xã - Tỉnh/Thành phố">{{$nhansu->noi_thuong_tru}}</textarea>
                <span class="erro erroNtt"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <h6 class="text-center mt-2">
                <mark>----- Thời gian học việc -----</mark>
            </h6>
            <div class="row">
                <div class="form-group col-md-6" style="padding-right: 1px">
                    <label class="control-label">Ngày bắt đầu</label>
                    <input class="form-control" type="date" name="ngayhvs" placeholder="22/07/1997"
                           value="{{$nhansu->ngay_hoc_viec}}">
                </div>
                <div class="form-group col-md-6" style="padding-left: 1px">
                    <label class="control-label">Ngày kết thúc</label>
                    <input class="form-control" type="date" name="ngaykthvs"
                           value="{{$nhansu->ngay_kt_hoc_viec}}" placeholder="22/07/1997">
                </div>
                <span class="col-md-12 erro erroNgaykthvs"></span>
            </div>
        </div>
        <div class="col-md-4">
            <h6 class="text-center mt-2">
                <mark>----- Thời gian thử việc -----</mark>
            </h6>
            <div class="row">
                <div class="form-group col-md-6" style="padding-right: 1px">
                    <label class="control-label">Ngày bắt đầu</label>
                    <input class="form-control" type="date" name="ngaytvs"
                           placeholder="22/07/1997" value="{{$nhansu->ngay_thu_viec}}">
                </div>
                <div class="form-group col-md-6" style="padding-left: 1px">
                    <label class="control-label">Ngày kết thúc</label>
                    <input class="form-control" type="date"
                           name="ngaykttvs"
                           placeholder="22/07/1997" value="{{$nhansu->ngay_kt_thu_viec}}">
                </div>
                <span class="col-md-12 erro erroNgaykttvs"></span>
            </div>
        </div>
        <div class="col-md-4">
            <h6 class="text-center mt-2">
                <mark>----- Thời gian làm chính thức -----</mark>
            </h6>
            <div class="row">
                <div class="form-group col-md-6" style="padding-right: 1px">
                    <label class="control-label">Ngày bắt đầu</label>
                    <input class="form-control" type="date" name="ngaylcts"
                           placeholder="22/07/1997" value="{{$nhansu->ngay_lam_chinh_thuc}}">
                </div>
                <div class="form-group col-md-6" style="padding-left: 1px">
                    <label class="control-label">Ngày kết thúc</label>
                    <input class="form-control" type="date"
                           name="ngaylkts" value="{{$nhansu->ngay_lam_ket_thuc}}"
                           placeholder="22/07/1997">
                </div>
                <span class="col-md-12 erro erroNgaylkts"></span>
            </div>
        </div>
    </div>
    <div class="row pt-0" style="border-top: 1px solid #ddd;padding: 20px 0 0 0;margin-top: 10px">
        <div class="col-md-6">
            <span class="erro">Chú ý: Trường * không được để trống !</span>
        </div>
        <div class="col-md-6 text-right">
            <button class="btn btn-primary mt-1">
                <i class="fa fa-fw fa-lg fa-check-circle"></i>Cập nhật
            </button>
        </div>
    </div>
</form>