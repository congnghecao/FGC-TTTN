function thuchien() {
    var diemchitieu = parseInt(document.getElementById("diemct").value);
    var diemdatduoc = parseInt(document.getElementById("diemdd").value);

    if (diemchitieu <= diemdatduoc) {
        var ketqua = String('Đạt');
        var d = document.getElementById("kq").value = ketqua;
    } else {
        var a = String('Không Đạt');
        var b = document.getElementById("kq").value = a;
    }
}


$(document).ready(function () {
    $("#select_all").change(function () {  //"select all" change
        $(".checkbox").prop('checked', $(this).prop("checked")); //change all ".checkbox" checked status
    });

//".checkbox" change
    $('.checkbox').change(function () {
        //uncheck "select all", if one of the listed checkbox item is unchecked
        if (false == $(this).prop("checked")) { //if this item is unchecked
            $("#select_all").prop('checked', false); //change "select all" checked status to false
        }
        //check "select all" if all checkbox items are checked
        if ($('.checkbox:checked').length == $('.checkbox').length) {
            $("#select_all").prop('checked', true);
        }
    });
});

//select all checkboxes
