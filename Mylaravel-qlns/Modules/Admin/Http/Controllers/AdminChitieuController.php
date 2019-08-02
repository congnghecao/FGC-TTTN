<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Requests\RequestChitieu;
use App\Http\Requests\RequestChitieuNhansu;
use App\Models\Chitietchitieu;
use App\Models\Chitieu;
use App\Models\Nhansu;
use App\Models\Phongban;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AdminChitieuController extends Controller
{
    public function index()
    {
        $chitieu = Chitieu::paginate(7);


        $viewData = [
            'chitieu' => $chitieu
        ];

        return view('admin::chitieu.index', $viewData);
    }

//    public function getCreate(){
//        $phongban = Phongban::all();
//        return view('admin::chitieu.create',compact('phongban'));
//    }

    public function PostCreate(RequestChitieu $requestChitieu)
    {
        $chitieu = new Chitieu();

        $chitieu->ten_chi_tieu = $requestChitieu->tenchitieu;
        $chitieu->mo_ta = $requestChitieu->mota;
        $chitieu->save();
        return redirect()->back();
    }

//    public function getUpdate($id){
//        $chitieu = Chitieu::find($id);
//        return view('admin::chitieu.update',compact('chitieu'));
//    }

    public function postUpdate(Request $request)
    {

        $chitieu = Chitieu::find($request->chitieu_id);

        $chitieu->ten_chi_tieu = $request->ten;
        $chitieu->mo_ta = $request->mo;
        $chitieu->save();
        return redirect()->back();
    }
//
//    public function delete($id){
//        $chitieu = Chitieu::find($id);
//        $chitieu->delete();
//        return redirect()->back();
//    }

    public function danhsachchitieu()
    {
        $chitieu = Chitieu::all();
        return view('admin::chitieu.danhsachIndex', compact('chitieu'));
    }

    public function danhsachchitieuphong($id)
    {

        $chitieu = DB::table('chitieu')
            ->join('chitietchitieu', 'chitieu.id', '=', 'chitietchitieu.id_chi_tieu')
            ->join('nhansu', 'nhansu.id', '=', 'chitietchitieu.id_nhan_su')
            ->join('lamviec', 'nhansu.id', '=', 'lamviec.id_nhan_su')
            ->join('phongban', 'phongban.id', '=', 'lamviec.id_phong_ban')
            ->select('chitieu.id as idchitieu', 'chitieu.ten_chi_tieu as tenchitieu', 'nhansu.ho_ten as hoten', 'phongban.ten_phong as tenphong')
            ->where('chitieu.id', $id)
            ->where('lamviec.ngay_ket_thuc', null)
            ->orderBy('phongban.ten_phong')
            ->get();
        return view('admin::chitieu.danhsachPhongIndex', compact('chitieu'));
    }

    public function chitieuNhansuIndex()
    {
        $chitieuchitieu = DB::table('chitietchitieu')
            ->join('chitieu', 'chitieu.id', 'chitietchitieu.id_chi_tieu')
            ->join('nhansu', 'nhansu.id', 'chitietchitieu.id_nhan_su')
            ->select('nhansu.ho_ten as hoten', 'chitieu.ten_chi_tieu as tenchitieu', 'chitietchitieu.id', 'chitietchitieu.id_chi_tieu', 'chitietchitieu.id_nhan_su', 'chitietchitieu.diem_chi_tieu', 'chitietchitieu.diem_dat_duoc', 'chitietchitieu.thang', 'chitietchitieu.nam', 'chitietchitieu.ket_qua', 'chitietchitieu.khen_thuong', 'chitietchitieu.canh_bao')
            ->paginate(7);
        $chitieu = Chitieu::all();
        $phong = Phongban::all();

//        $phong = DB::table('phongban')
//            ->join('lamviec', 'phongban.id', '=', 'lamviec.id_phong_ban')
//            ->join('vitri', 'vitri.id', '=', 'lamviec.id_vi_tri')
//            ->join('nhansu', 'nhansu.id', '=', 'lamviec.id_nhan_su')
//            ->select('phongban.id as id_phong', 'phongban.ten_phong as ten')
//            ->where('lamviec.ngay_ket_thuc',null)
////            ->where('vitri.ten_vi_tri','Trưởng phòng')
//            ->get();
        return view('admin::chitieu.chitieuNhansuIndex', compact('chitieuchitieu', 'chitieu', 'phong'));
    }

    public function postChitieuNhansuIndex(Request $request)
    {
        $pb = $request->input('check');
        $chitieu = DB::table('chitieu')
            ->select('id', 'ten_chi_tieu')
            ->where('id', $request->chitieuid)
            ->get();
        $nhansu = DB::table('nhansu')
            ->join('lamviec', 'nhansu.id', 'lamviec.id_nhan_su')
            ->join('phongban', 'phongban.id', 'lamviec.id_phong_ban')
            ->select('nhansu.id as idnhansu', 'nhansu.ho_ten as hoten', 'phongban.ten_phong as tenphong')
            ->where('lamviec.ngay_ket_thuc', null)
            ->whereIn('phongban.id', $pb)
            ->orderByRaw(\DB::raw("FIELD(phongban.id, " . implode(",", $pb) . ")"))
            ->get();

//        $kiemtra1 = DB::table('chitietchitieu')
//            ->select('id_nhan_su')
//            ->where('id_chi_tieu',$request->chitieuid)
//            ->whereIn('id_nhan_su',function($query){
//                $query->select('id')->from('nhansu');})
//            ->get();

        return view('admin::chitieu.chitieuNhansuCreate', compact('chitieu', 'nhansu','kiemtra1'));
    }

//    public function getChitieuNhansuCreate(){
//        $chitieu = Chitieu::all();
//        $nhansu = DB::table('nhansu')
//            ->join('lamviec','nhansu.id','lamviec.id_nhan_su')
//            ->join('phongban','phongban.id','lamviec.id_phong_ban')
//            ->select('nhansu.id as idnhansu','nhansu.ho_ten as hoten','phongban.ten_phong as tenphong')
//            ->where('lamviec.ngay_ket_thuc',null)
//            ->get();
//        return view('admin::chitieu.chitieuNhansuCreate',compact('chitieu','nhansu'));
//    }

    public function postChitieuNhansuCreate(RequestChitieuNhansu $requestChitieuNhansu)
    {
        $chitietchitieu = new Chitietchitieu();
        $chitietchitieu->id_chi_tieu = $requestChitieuNhansu->idchitieu;
        $chitietchitieu->id_nhan_su = $requestChitieuNhansu->idnhansu;
        $chitietchitieu->diem_chi_tieu = $requestChitieuNhansu->diemchitieu;
        $chitietchitieu->diem_dat_duoc = $requestChitieuNhansu->diemdatduoc;
        $chitietchitieu->thang = $requestChitieuNhansu->thang;
        $chitietchitieu->nam = $requestChitieuNhansu->nam;
        $chitietchitieu->ket_qua = $requestChitieuNhansu->ketqua;
        $chitietchitieu->khen_thuong = $requestChitieuNhansu->khenthuong;
        $chitietchitieu->canh_bao = $requestChitieuNhansu->canhbao;
        $chitietchitieu->save();
        return redirect()->back();
    }

//    public function getChitieuNhansuUpdate($id){
//        $chitietchitieu = Chitietchitieu::find($id);
//
//        return view('admin::chitieu.chitieuNhansuUpdate',compact('chitietchitieu'));
//    }

    public function postChitieuNhansuUpdate(Request $request)
    {
        $chitietchitieu = Chitietchitieu::find($request->chitieuNhansu_id);
        $chitietchitieu->id_chi_tieu = $request->idchitieu;
        $chitietchitieu->id_nhan_su = $request->idnhansu;
        $chitietchitieu->diem_chi_tieu = $request->diemchitieu;
        $chitietchitieu->diem_dat_duoc = $request->diemdatduoc;
        $chitietchitieu->thang = $request->thang;
        $chitietchitieu->nam = $request->nam;
        $chitietchitieu->ket_qua = $request->ketqua;
        $chitietchitieu->khen_thuong = $request->khenthuong;
        $chitietchitieu->canh_bao = $request->canhbao;
        $chitietchitieu->save();
        return redirect()->back();
    }
    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function chitieuNhansuDelete($id)
    {
        $chitietchitieu = Chitietchitieu::find($id);
        $chitietchitieu->delete();
        return redirect()->back();
    }
}
