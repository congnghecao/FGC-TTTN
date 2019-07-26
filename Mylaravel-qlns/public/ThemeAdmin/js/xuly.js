function thuchien() {
    var diemchitieu = parseInt(document.getElementById("diemct").value);
    var diemdatduoc = parseInt(document.getElementById("diemdd").value);

    if(diemchitieu <= diemdatduoc){
        var ketqua = String('Đạt');
        var d= document.getElementById("kq").value  = ketqua;
    }else{
        var a = String('Không Đạt');
        var b= document.getElementById("kq").value  = a;
    }
}