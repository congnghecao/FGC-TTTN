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
use Carbon\Carbon;

class AdminChitieuController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $chitieu = Chitieu::paginate(7);
        $phong = Phongban::all();

        $viewData = [
            'chitieu' => $chitieu,
            'phong' => $phong
        ];

        return view('admin::chitieu.index', $viewData);
    }

    public function PostCreate(RequestChitieu $requestChitieu)
    {

        $chitieu = new Chitieu();

        $chitieu->ten_chi_tieu = $requestChitieu->tenchitieu;
        $chitieu->mo_ta = $requestChitieu->mota;
        if ($requestChitieu->check != "") {
            $chitieu->id_phong_ban = implode(",", $requestChitieu->check);
        } else {
            $chitieu->id_phong_ban = "Chỉ tiêu không được chọn cho phòng ban nào?";
        }
        $chitieu->save();
        return redirect()->back()->with('statusadd', 'Thêm mới thành công!');
    }

    public function postUpdate(Request $request)
    {

        $chitieu = Chitieu::find($request->chitieu_id);

        $chitieu->ten_chi_tieu = $request->ten;
        $chitieu->mo_ta = $request->mo;
        if ($request->checkupdate != "") {
            $chitieu->id_phong_ban = implode(",", $request->checkupdate);
        } else {
            $chitieu->id_phong_ban = "Chỉ tiêu không được chọn cho phòng ban nào?";
        }
        $chitieu->save();
        return redirect()->back()->with('statusupdate', 'Cập nhật thành công!');
    }

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


    //Nhaan su
    public function getIndexNhansu()
    {
        $date = getdate();
        $thang = $date['mon'];
        $nam = $date['year'];


        $thangnam = DB::table('chitietchitieu')
            ->select('thang', 'nam')
            ->groupBy('thang', 'nam')
            ->get();

        $nhansuchitieu = DB::table('chitietchitieu')
            ->join('nhansu', 'nhansu.id', '=', 'chitietchitieu.id_nhan_su')
            ->select('ho_ten', 'id_nhan_su', 'thang', DB::raw('SUM(diem_chi_tieu) as sumdct'), DB::raw('SUM(diem_dat_duoc) as sumddd'))
            ->where('thang', $thang)
            ->where('nam', $nam)
            ->groupBy('id_nhan_su', 'thang', 'ho_ten')
            ->get();
        $nhansu = DB::table('nhansu')
            ->join('lamviec', 'nhansu.id', '=', 'lamviec.id_nhan_su')
            ->select('nhansu.id as idns', 'ho_ten')
            ->where('lamviec.ngay_ket_thuc', null)
            ->get();
        return view('admin::chitieu.chitieuNhansuIndex', compact('nhansu', 'thang', 'nam', 'nhansuchitieu', 'thangnam'));
    }

    public function postIndexNhansu(Request $request)
    {
        $thang = $request->sheachthang;
        $nam = $request->sheachnam;
        $thangnam = DB::table('chitietchitieu')
            ->select('thang', 'nam')
            ->groupBy('thang', 'nam')
            ->get();

        $nhansuchitieu = DB::table('chitietchitieu')
            ->join('nhansu', 'nhansu.id', '=', 'chitietchitieu.id_nhan_su')
            ->select('ho_ten', 'id_nhan_su', 'thang', DB::raw('SUM(diem_chi_tieu) as sumdct'), DB::raw('SUM(diem_dat_duoc) as sumddd'))
            ->where('thang', $thang)
            ->where('nam', $nam)
            ->groupBy('id_nhan_su', 'thang', 'ho_ten')
            ->get();
        $nhansu = DB::table('nhansu')
            ->join('lamviec', 'nhansu.id', '=', 'lamviec.id_nhan_su')
            ->select('nhansu.id as idns', 'ho_ten')
            ->where('lamviec.ngay_ket_thuc', null)
            ->get();
        return view('admin::chitieu.chitieuNhansuIndex', compact('nhansu', 'thang', 'nam', 'nhansuchitieu', 'thangnam'));

    }

    public function getIndexNhansuChitieu($id, $thang, $nam)
    {

        $nhansu = DB::table('nhansu')
            ->select('ho_ten')
            ->where('id', $id)
            ->get();

        $chitietchitieu = DB::table('nhansu')
            ->leftJoin('chitietchitieu', 'chitietchitieu.id_nhan_su', '=', 'nhansu.id')
            ->leftJoin('chitieu', 'chitieu.id', '=', 'chitietchitieu.id_chi_tieu')
            ->select('chitietchitieu.id', 'nhansu.id as idnhansu', 'chitieu.id as idchitieu', 'thang', 'ten_chi_tieu', 'diem_chi_tieu', 'diem_dat_duoc')
            ->where('nhansu.id', $id)
            ->get();
        return view('admin::chitieu.chitieuNhansu', compact('chitietchitieu', 'thang', 'nam', 'chitieu', 'id', 'nhansu'));
    }


    public function getAddNhansuChitieu($id, $thang, $nam)
    {

        $chitieu = Chitieu::all();
        $nhansu = DB::table('nhansu')
            ->select('ho_ten')
            ->where('id', $id)
            ->get();
        return view('admin::chitieu.chitieuNhansuAdd', compact('chitieu', 'id', 'thang', 'nam', 'nhansu'));
    }


    public function postAddNhansuChitieu(Request $request)
    {
        if (count($request->product_name) > 0) {
            foreach ($request->product_name as $item => $v) {
                $data = array(
                    'id_chi_tieu' => $request->product_name[$item],
                    'id_nhan_su' => $request->idns[$item],
                    'diem_chi_tieu' => $request->quantity[$item],
                    'thang' => $request->thang[$item],
                    'nam' => $request->nam[$item]
                );
                Chitietchitieu::insert($data);
            }
        }
        return redirect()->back()->with('statusadd', 'Thêm mới thành công!');
    }
//    public function postCreateNhansuChitieu(RequestChitieuNhansu $requestChitieuNhansu)
//    {
//        $chitietchitieu = new Chitietchitieu();
//        $chitietchitieu->id_chi_tieu = $requestChitieuNhansu->idchitieu;
//        $chitietchitieu->id_nhan_su = $requestChitieuNhansu->idnhansu;
//        $chitietchitieu->diem_chi_tieu = $requestChitieuNhansu->diemchitieu;
//        $chitietchitieu->thang = $requestChitieuNhansu->thang;
//        $chitietchitieu->nam = $requestChitieuNhansu->nam;
//        $chitietchitieu->save();
//        return redirect()->back();
//    }

    public function postUpdateNhansuChitieu(Request $request)
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
        return redirect()->back()->with('statusupdate', 'Cập nhật thành công!');
    }

    public function getDeleteNhansuChitieu($id)
    {
        $chitietchitieu = Chitietchitieu::find($id);
        $chitietchitieu->delete();
        return redirect()->back()->with('statusdelete', 'Xóa thành công!');
    }
}
