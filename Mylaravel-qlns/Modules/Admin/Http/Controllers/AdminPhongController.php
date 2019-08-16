<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Requests\RequestPhong;
use App\Http\Requests\RequestPhongNhatKy;
use App\Models\Lamviec;
use App\Models\Nhansu;
use App\Models\Phongban;
use App\Models\Vitri;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AdminPhongController extends Controller
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
        $phongban = Phongban::paginate(8);
        return view('admin::phong.index', compact('phongban'));
    }

    public function selectns()
    {
        $phongban = DB::table('phongban')
            ->join('lamviec', 'phongban.id', '=', 'lamviec.id_phong_ban')
            ->join('vitri', 'vitri.id', '=', 'lamviec.id_vi_tri')
            ->join('nhansu', 'nhansu.id', '=', 'lamviec.id_nhan_su')
            ->select('phongban.id as id_phong', 'phongban.ten_phong as ten', 'phongban.mo_ta as mo'
                , DB::raw('count(lamviec.id_nhan_su) as sons')
            )
            ->groupBy('lamviec.id_phong_ban', 'phongban.id', 'phongban.ten_phong', 'phongban.mo_ta')
            ->where('lamviec.ngay_ket_thuc', null)
            ->get();
        return view('admin::phong.selectns', compact('phongban'));
    }

    public function selectns1($id)
    {
        $phongban1 = DB::table('nhansu')
            ->join('lamviec', 'nhansu.id', '=', 'lamviec.id_nhan_su')
            ->join('vitri', 'vitri.id', '=', 'lamviec.id_vi_tri')
            ->join('phongban', 'phongban.id', '=', 'lamviec.id_phong_ban')
            ->select('phongban.ten_phong as tenphong', 'nhansu.ho_ten as ho', 'nhansu.ngay_sinh as ngay', 'vitri.ten_vi_tri as vi')
            ->where('phongban.id', $id)
            ->where('lamviec.ngay_ket_thuc', null)
            ->get();
        $phongban = DB::table('phongban')
            ->select('ten_phong')
            ->where('id', $id)
            ->get();
        return view('admin::phong.selectns1', compact('phongban1', 'phongban'));
    }

    public function store(RequestPhong $requestPhong)
    {
        $a = 1;
        $this->insertOrUpdate($requestPhong);
        return redirect()->back()->with('statusadd', 'Thêm Phòng ban Thành công !');

    }

    public function update(Request $request)
    {
        $phong = Phongban::find($request->phongban_id);
        $phong->ten_phong = $request->ten;
        $phong->mo_ta = $request->mo;
        $phong->save();
        return redirect()->back()->with('statusupdate', 'Cập nhật thành công!');
    }

    public function insertOrUpdate($requestPhong, $id = '')
    {
        $code = 1;
        try {
            $phongban = new Phongban();
            if ($id) {
                $phongban = Phongban::find($id);
            }
            $phongban->ten_phong = $requestPhong->tenphong;
            $phongban->mo_ta = $requestPhong->mota;
            $phongban->save();
        } catch (\Exception $exception) {
            $code = 0;
            Log::error("[Error insertOrUpdate Phongban]" . $exception->getMessage());
        }
        return $code;
    }

    public function delete($id)
    {
        $phongban = Phongban::find($id);
        $phongban->delete();
        return redirect()->back()->with('statusdelete', 'Xóa thành công!');
    }

    public function nhatkyIndex()
    {
        $phong = Phongban::all();
        $vitri = Vitri::all();
        $nhansu = Nhansu::all();
        $lamviec = DB::table('nhansu')
            ->join('lamviec', 'nhansu.id', '=', 'lamviec.id_nhan_su')
            ->join('vitri', 'vitri.id', '=', 'lamviec.id_vi_tri')
            ->join('phongban', 'phongban.id', '=', 'lamviec.id_phong_ban')
            ->select('phongban.ten_phong as tenphong', 'nhansu.ho_ten as hoten', 'vitri.ten_vi_tri as tenvitri', 'lamviec.ngay_lam as ngaylam', 'lamviec.ngay_ket_thuc as ngayketthuc', 'lamviec.ghi_chu as ghichu', 'lamviec.id as idlamviec', 'lamviec.id_phong_ban as idphongban', 'lamviec.id_nhan_su as idnhansu', 'lamviec.id_vi_tri as idvitri')
            ->paginate(10);
        return view('admin::phong.nhatkyIndex', ['lamviec' => $lamviec, 'phong' => $phong, 'vitri' => $vitri, 'nhansu' => $nhansu]);
    }

    public function postindex(Request $request)
    {
        $hoten = $request->name;
        $phong = Phongban::all();
        $vitri = Vitri::all();
        $nhansu = Nhansu::all();
        $lamviec = DB::table('nhansu')
            ->join('lamviec', 'nhansu.id', '=', 'lamviec.id_nhan_su')
            ->join('vitri', 'vitri.id', '=', 'lamviec.id_vi_tri')
            ->join('phongban', 'phongban.id', '=', 'lamviec.id_phong_ban')
            ->select('phongban.ten_phong as tenphong', 'nhansu.ho_ten as hoten', 'vitri.ten_vi_tri as tenvitri', 'lamviec.ngay_lam as ngaylam', 'lamviec.ngay_ket_thuc as ngayketthuc', 'lamviec.ghi_chu as ghichu', 'lamviec.id as idlamviec', 'lamviec.id_phong_ban as idphongban', 'lamviec.id_nhan_su as idnhansu', 'lamviec.id_vi_tri as idvitri')
            ->where('phongban.ten_phong', $hoten)
            ->paginate(10);
        return view('admin::phong.nhatkyIndex', ['lamviec' => $lamviec, 'phong' => $phong, 'vitri' => $vitri, 'nhansu' => $nhansu]);
    }

    public function createNhatky(RequestPhongNhatKy $requestPhongNhatKy)
    {
        $lamviec = new Lamviec();
        $lamviec->id_phong_ban = $requestPhongNhatKy->idphongban;
        $lamviec->id_nhan_su = $requestPhongNhatKy->idnhansu;
        $lamviec->id_vi_tri = $requestPhongNhatKy->idvitri;
        $lamviec->ngay_lam = $requestPhongNhatKy->ngaylam;
        $lamviec->ngay_ket_thuc = $requestPhongNhatKy->ngayketthuc;
        $lamviec->ghi_chu = $requestPhongNhatKy->ghichu;
        $lamviec->save();
        return redirect()->back()->with('statusadd', 'Thêm mới thành công!');
    }

    public function updateNhatky(RequestPhongNhatKy $requestPhongNhatKy)
    {

        $lamviec = Lamviec::find($requestPhongNhatKy->lamviec_id);
        $lamviec->id_phong_ban = $requestPhongNhatKy->idphongban;
        $lamviec->id_nhan_su = $requestPhongNhatKy->idnhansu;
        $lamviec->id_vi_tri = $requestPhongNhatKy->idvitri;
        $lamviec->ngay_lam = $requestPhongNhatKy->ngaylam;
        $lamviec->ngay_ket_thuc = $requestPhongNhatKy->ngayketthuc;
        $lamviec->ghi_chu = $requestPhongNhatKy->ghichu;
        $lamviec->save();
        return redirect()->back()->with('statusupdate', 'Cập nhật thành công!');
    }
}
