$(document).ready(function () {
    //kiểm tra null input tìm kiếm
    $("#search").submit(function () {
       return  ktrNull("input[name='id']",".erroSearch","Mời nhập ID nhân sự.");
    });
    //xin nghỉ
    //thêm xin nghỉ
    $("#themXN").submit(function () {
        return ktrNull("input[name='id_nhan_su']", ".erroIDn", "Mời nhập mã nhân sự.") === true
            && ktrNull("input[name='sbn']", ".erroSbn", "Mời nhập số buổi nghỉ.") === true
            && ktrNull("input[name='nbd']", ".erroNbd", "Mời nhập ngày bắt đầu.") === true
            && ktrNull("input[name='nkt']", ".erroNkt", "Mời nhập ngày kết thúc.") === true
            && ktrNull("textarea[name='ldn']", ".erroLdn", "Mời nhập lý do nghỉ.") === true
            && dateLogicStr("input[name='nbd']", "input[name='nkt']", ".erroNkt") === true;
    });
    //sửa xin ngỉ
    $(".btn-suaXN").click(function () {
        const id = $(this).attr("value");
        $("#data-sua").load('admin/xinnghi/sua/' + id, function () {
            ktrForm();
            $("#suaXN").submit(function () {
                return ktrNull("input[name='id_nhan_sus']", ".erroIDns", "Mời nhập mã nhân sự.") === true
                    && ktrNull("input[name='sbns']", ".erroSbns", "Mời nhập số buổi nghỉ.") === true
                    && ktrNull("input[name='nbds']", ".erroNbds", "Mời nhập ngày bắt đầu.") === true
                    && ktrNull("input[name='nkts']", ".erroNkts", "Mời nhập ngày kết thúc.") === true
                    && ktrNull("textarea[name='ldns']", ".erroLdns", "Mời nhập lý do nghỉ.") === true
                    && dateLogicStr("input[name='nbds']", "input[name='nkts']", ".erroNkts") === true;
            });
        });
    });
    dataModal("#suaModal", ".btn-suaXN", ".close-sua", "suaModal");
    //Chức vụ
    $("#themChucvu").click(function () {
        ktrChucVu();
    });
    //modal sửa chức vụ
    dataModal("#suaModal", ".btn-suaCV", ".close-sua", "suaModal");
    //Sửa chức vụ
    $(".btn-suaCV").click(function () {
        const id = $(this).attr('id');
        $("#data-sua").load('admin/nhansu/sua-chuc-vu/' + id, function () {
            $("#btn-sua").click(function () {
                const phongban = $("select[name='phongbans']").val();
                const vitri = $("select[name='vitris']").val();
                const nhansu = $(this).attr("nhansu");
                var ngaykt = $("input[name='ngaykt']").val();
                const ngayvao = $("input[name='ngayvao']").val();
                if (dateLogic(ngayvao, ngaykt) || !dateLogic(ngayvao, ngaykt) && ngaykt === '') {
                    if (ngaykt === '') ngaykt = 0;
                    $.get('admin/nhansu/ssua-chuc-vu/' + id + '/' + nhansu + '/' + phongban + '/' + vitri + '/' + ngaykt, function (data) {
                        if (data === '0')
                            $("#erroSua").html('Chức vụ này đang được đảm nhiệm, vui lòng chọn chức vụ khác!');
                        else {
                            $("#erroSua").html('');
                            $("#okSua").html('Cập nhật chức vụ thành công!');
                            setTimeout("location.reload(true)", 900);
                        }
                    });
                }
                else {
                    $("#erroSua").html('Ngày kết thúc phải lớn hơn ngày bắt đầu hoặc bỏ trống!');
                }
            })
        });
    });
    //chi tiet nhan su
    $(".chi-tiet").hover(function () {
        const id = $(this).attr("value");
        $(".data-chitiet" + id).load('admin/nhansu/chi-tiet/' + id);
    });
    //modal thêm
    dataModal("#themModal", ".btn-them", ".close-them", "themModal");
    //submit form nhân sự
    ktrForm();
    $("#themNS").submit(function () {
        return ktrNull("input[name='hoten']", ".erroHoten", "Mời nhập họ tên.") === true
            && ktrLength("input[name='hoten']", ".erroHoten", "Họ tên phải nhiều hơn 5 ký tự.") === true
            && ktrNull("input[name='ngaysinh']", ".erroNgaysinh", "Mời nhập ngày sinh.") === true
            && ktrNull("input[name='cmnd']", ".erroCmnd", "Mời nhập CMND.") === true
            && ktrNull("textarea[name='ntt']", ".erroNtt", "Mời nhập nơi thường trú.") === true
            && ktrNullSelect("select[name='phongban']", ".erroPhongban", "Mời chọn phòng ban.") === true
            && ktrNullSelect("select[name='vitri']", ".erroVitri", "Mời chọn vị trí.") === true;
    });
    //sửa nhân sự
    $(".btn-suaNS").click(function () {
        const id = $(this).attr("value");
        $("#data-sua").load('admin/nhansu/sua/' + id, function () {
            ktrDate("input[name='ngayhvs']", "input[name='ngaykthvs']");
            ktrDate("input[name='ngaytvs']", "input[name='ngaykttvs']");
            ktrDate("input[name='ngaylcts']", "input[name='ngaylkts']");
            ktrForm();
            $("#suaNS").submit(function () {
                return ktrNull("input[name='hotens']", ".erroHoten", "Mời nhập họ tên.") === true
                    && ktrLength("input[name='hotens']", ".erroHoten", "Họ tên phải nhiều hơn 5 ký tự.") === true
                    && ktrNull("input[name='ngaysinhs']", ".erroNgaysinh", "Mời nhập ngày sinh.") === true
                    && ktrNull("input[name='cmnds']", ".erroCmnd", "Mời nhập CMND.") === true
                    && ktrNull("textarea[name='ntts']", ".erroNtt", "Mời nhập nơi thường trú.") === true;
            });
        });
    });
    //modal sửa nhân sự
    dataModal("#suaModal", ".btn-suaNS", ".close-sua", "suaModal");

});

// ---------------------function--------------------
//ajax kiểm tra thêm trùng chức vụ
function ktrChucVu() {
    const id = $("#themChucvu").attr("value");
    const phongban = $("select[name='phongban']").val();
    const vitri = $("select[name='vitri']").val();
    $.get('admin/nhansu/them-chuc-vu/' + id + '/' + phongban + '/' + vitri, function (data) {
        if (data === '0') {
            $("#okThem").html('');
            $("#erroThem").html("Chức vụ này đang được đảm nhiệm, vui lòng chọn chức vụ khác!");
        } else {
            $("#erroThem").html('');
            $("#okThem").html("Thêm chức vụ thành công");
            setTimeout("location.reload(true)", 900);
        }
    });
}

//kiểm tra input date
function dateLogic($date1, $date2) {
    const vao = new Date($date1);
    const ra = new Date($date2);
    return ra > vao;
}

//kiểm tra input date
function dateLogicStr($date1, $date2, $output) {
    const vao = new Date($($date1).val());
    const ra = new Date($($date2).val());
    if (ra >= vao) {
        $($output).html('');
        $($date2).css("border-color", "#009688");
        return true;
    } else {
        $($output).html('Ngày kết thúc phải lớn hơn hoặc bằng ngày bắt đầu.');
        $($date2).css("border-color", "red");
        return false;
    }
}

//kiểm tra điều kiện submit form
function ktrForm() {
    //thêm xin nghỉ
    $("input[name='id_nhan_su']").change(function () {
        ktrNull("input[name='id_nhan_su']", ".erroIDns", "Mời nhập mã nhân sự.");
    });
    $("input[name='sbn']").change(function () {
        ktrNull("input[name='sbn']", ".erroSbn", "Mời nhập số buổi nghỉ.");
    });
    $("input[name='nbd']").change(function () {
        ktrNull("input[name='nbd']", ".erroNbd", "Mời nhập ngày bắt đầu.");
    });
    $("input[name='nkt']").change(function () {
        ktrNull("input[name='nkt']", ".erroNkt", "Mời nhập ngày kết thúc.");
        dateLogicStr("input[name='nbd']", "input[name='nkt']", ".erroNkt");
    });
    $("textarea[name='ldn']").change(function () {
        ktrNull("textarea[name='ldn']", ".erroLdn", "Mời nhập lý do nghỉ.");
    });
    //sửa xin nghỉ
    $("input[name='id_nhan_sus']").change(function () {
        ktrNull("input[name='id_nhan_sus']", ".erroIDns", "Mời nhập mã nhân sự.");
    });
    $("input[name='sbns']").change(function () {
        ktrNull("input[name='sbns']", ".erroSbns", "Mời nhập số buổi nghỉ.");
    });
    $("input[name='nbds']").change(function () {
        ktrNull("input[name='nbds']", ".erroNbds", "Mời nhập ngày bắt đầu.");
    });
    $("input[name='nkts']").change(function () {
        ktrNull("input[name='nkts']", ".erroNkts", "Mời nhập ngày kết thúc.");
        dateLogicStr("input[name='nbds']", "input[name='nkts']", ".erroNkts");
    });
    $("textarea[name='ldns']").change(function () {
        ktrNull("textarea[name='ldns']", ".erroLdns", "Mời nhập lý do nghỉ.");
    });
    //thêm nhân sự
    $("input[name='hoten']").change(function () {
        ktrNull(this, ".erroHoten", "Mời nhập họ tên.");
        ktrLength(this, ".erroHoten", "Họ tên phải nhiều hơn 5 ký tự.");
    });
    $("input[name='ngaysinh']").change(function () {
        ktrNull(this, ".erroNgaysinh", "Mời nhập ngày sinh.");
    });
    $("input[name='cmnd']").change(function () {
        ktrNull(this, ".erroCmnd", "Mời nhập CMND.");
    });
    $("textarea[name='ntt']").change(function () {
        ktrNull(this, ".erroNtt", "Mời nhập nơi thường trú.");
    });
    $("input[name='ngayhv']").change(function () {
        ktrDate(this, "input[name='ngaykthv']");
    });
    $("input[name='ngaytv']").change(function () {
        ktrDate(this, "input[name='ngaykttv']");
    });
    $("input[name='ngaylct']").change(function () {
        ktrDate(this, "input[name='ngaylkt']");
    });
    //sửa nhân sự
    $("input[name='hotens']").change(function () {
        ktrNull(this, ".erroHoten", "Mời nhập họ tên.");
        ktrLength(this, ".erroHoten", "Họ tên phải nhiều hơn 5 ký tự.");
    });
    $("input[name='ngaysinhs']").change(function () {
        ktrNull(this, ".erroNgaysinh", "Mời nhập ngày sinh.");
    });
    $("input[name='cmnds']").change(function () {
        ktrNull(this, ".erroCmnd", "Mời nhập CMND.");
    });
    $("textarea[name='ntts']").change(function () {
        ktrNull(this, ".erroNtt", "Mời nhập nơi thường trú.");
    });
    $("input[name='ngayhvs']").change(function () {
        ktrDate(this, "input[name='ngaykthvs']");
    });

    $("input[name='ngaytvs']").change(function () {
        ktrDate(this, "input[name='ngaykttvs']");
    });

    $("input[name='ngaylcts']").change(function () {
        ktrDate(this, "input[name='ngaylkts']");
    });

}

function ktrNull($input, $output, $str) {
    if ($($input).val().trim() === '') {
        $($output).html($str);
        $($input).css("border-color", "red");
        return false;
    }
    else {
        $($input).css("border-color", "#009688");
        $($output).html("");
        return true;
    }
}

function ktrNullSelect($input, $output, $str) {
    if ($($input).val() == '') {
        $($output).html($str);
        $($input).css("border-color", "red");
        return false;
    }
    else {
        $($input).css("border-color", "#009688");
        $($output).html("");
        return true;
    }
}

function ktrLength($input, $output, $str) {
    if ($($input).val().trim().length < 5) {
        $($output).html($str);
        $($input).css("border-color", "red");
        return false;
    }
    else {
        $($input).css("border-color", "#009688");
        $($output).html("");
        return true;
    }
}

function ktrDate($input, $output) {
    if ($($input).val().trim() !== '')
        $($output).removeAttr('disabled');
    else {
        $($output).attr('disabled', 'disabled');
        $($output).val('');
    }
}

function dataModal($name, $btn, $span, $close) {
    //mở modal
    $($btn).click(function () {
        $($name).css("display", "block");
    });
    //đóng modal
    $($span).click(function () {
        $($name).css("display", "none");
    });

// Khi click ngoài Modal thì đóng Modal
    const modal = document.getElementById($close);
    $(window).click(function (event) {
        if (event.target === modal) {
            $($name).css("display", "none");
        }
    });
}
