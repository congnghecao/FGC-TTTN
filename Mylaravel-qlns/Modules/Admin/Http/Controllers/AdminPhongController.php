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
    public function index()
    {

        $phongban = Phongban::paginate(8);

        return view('admin::phong.index', compact('phongban'));
    }
//    public function postIndex(Request $request){
//        $id = $request->timkiem;
//        $phongban = DB::table('phongban') ->where('id',$id) ->paginate(7);
//
//        return view('admin::phong.index', compact('phongban'));
//    }
//    public function select()
//    {
//
//        $phongban = DB::table('phongban')
//            ->join('lamviec', 'phongban.id', '=', 'lamviec.id_phong_ban')
//            ->join('vitri', 'vitri.id', '=', 'lamviec.id_vi_tri')
//            ->join('nhansu', 'nhansu.id', '=', 'lamviec.id_nhan_su')
//            ->select('phongban.id as id_phong', 'phongban.ten_phong as ten', 'phongban.mo_ta as mo', DB::raw('count(lamviec.id_nhan_su) as sons'),DB::raw("(SELECT nhansu.ho_ten FROM phongban INNER JOIN lamviec ON phongban.id = lamviec.id_phong_ban INNER JOIN vitri ON vitri.id = lamviec.id_vi_tri INNER JOIN nhansu ON nhansu.id = lamviec.id_nhan_su WHERE vitri.ten_vi_tri = 'truong phong' ) as tenns"))
//            ->groupBy('lamviec.id_phong_ban','phongban.id', 'phongban.ten_phong', 'phongban.mo_ta')
//            ->get();
//
//        //dd($phongban);
//
//        return view('admin::phong.select', compact('phongban'));
//    }

    public function selectns()
    {

        $phongban = DB::table('phongban')
            ->join('lamviec', 'phongban.id', '=', 'lamviec.id_phong_ban')
            ->join('vitri', 'vitri.id', '=', 'lamviec.id_vi_tri')
            ->join('nhansu', 'nhansu.id', '=', 'lamviec.id_nhan_su')
            ->select('phongban.id as id_phong', 'phongban.ten_phong as ten', 'phongban.mo_ta as mo'
                ,DB::raw('count(lamviec.id_nhan_su) as sons')
//               , DB::raw("(SELECT nhansu.ho_ten FROM phongban INNER JOIN lamviec ON phongban.id = lamviec.id_phong_ban INNER JOIN vitri ON vitri.id = lamviec.id_vi_tri INNER JOIN nhansu ON nhansu.id = lamviec.id_nhan_su WHERE vitri.ten_vi_tri = 'truong phong' ) as tenns")
            )
            ->groupBy('lamviec.id_phong_ban','phongban.id', 'phongban.ten_phong', 'phongban.mo_ta')
            ->where('lamviec.ngay_ket_thuc',null)
//            ->where('vitri.ten_vi_tri','Trưởng phòng')
            ->get();

        return view('admin::phong.selectns', compact('phongban'));

    }
    public function selectns1($id){

        $phongban1 = DB::table('nhansu')
            ->join('lamviec', 'nhansu.id', '=', 'lamviec.id_nhan_su')
            ->join('vitri', 'vitri.id', '=', 'lamviec.id_vi_tri')
            ->join('phongban', 'phongban.id', '=', 'lamviec.id_phong_ban')
            ->select('phongban.ten_phong as tenphong','nhansu.ho_ten as ho', 'nhansu.ngay_sinh as ngay', 'vitri.ten_vi_tri as vi')
            ->where('phongban.id',$id)
            ->where('lamviec.ngay_ket_thuc',null)
            ->get();

        $phongban = DB::table('phongban')
            ->select('ten_phong')
            ->where('id',$id)
            ->get();
       // dd($phongban1);

       // return redirect()->back();
        return view('admin::phong.selectns1', compact('phongban1','phongban'));
    }
    public function store(RequestPhong $requestPhong)
    {

        $this->insertOrUpdate($requestPhong);
        return redirect()->back();
    }

    public function update(Request $request){
            $phong = Phongban::find($request->phongban_id);
            $phong->ten_phong = $request->ten;
            $phong->mo_ta = $request->mo;
            $phong->save();

        return redirect()->back();
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

    public function delete( $id)
    {

            $phongban = Phongban::find($id);

                    $phongban->delete();



        return redirect()->back();
    }
    public  function nhatkyIndex(){
        $phong = Phongban::all();
        $lamviec = DB::table('nhansu')
            ->join('lamviec', 'nhansu.id', '=', 'lamviec.id_nhan_su')
            ->join('vitri', 'vitri.id', '=', 'lamviec.id_vi_tri')
            ->join('phongban', 'phongban.id', '=', 'lamviec.id_phong_ban')
            ->select('phongban.ten_phong as tenphong', 'nhansu.ho_ten as hoten', 'vitri.ten_vi_tri as tenvitri','lamviec.ngay_lam as ngaylam','lamviec.ngay_ket_thuc as ngayketthuc','lamviec.ghi_chu as ghichu','lamviec.id as idlamviec','lamviec.id_phong_ban as idphongban','lamviec.id_nhan_su as idnhansu','lamviec.id_vi_tri as idvitri')
            ->paginate(7);
        //dd($lamviec);
        return view('admin::phong.nhatkyIndex',compact('lamviec','phong'));
    }
    public function postindex(Request $request){
        $hoten = $request->name;
        $phong = Phongban::all();
        $lamviec = DB::table('nhansu')
            ->join('lamviec', 'nhansu.id', '=', 'lamviec.id_nhan_su')
            ->join('vitri', 'vitri.id', '=', 'lamviec.id_vi_tri')
            ->join('phongban', 'phongban.id', '=', 'lamviec.id_phong_ban')
            ->select('phongban.ten_phong as tenphong', 'nhansu.ho_ten as hoten', 'vitri.ten_vi_tri as tenvitri','lamviec.ngay_lam as ngaylam','lamviec.ngay_ket_thuc as ngayketthuc','lamviec.ghi_chu as ghichu','lamviec.id as idlamviec','lamviec.id_phong_ban as idphongban','lamviec.id_nhan_su as idnhansu','lamviec.id_vi_tri as idvitri')

            ->where('phongban.ten_phong',$hoten)
            ->paginate(7);
        // var_dump($xinnghi);
        return view('admin::phong.nhatkyIndex',compact('lamviec','phong'));
    }
    public function nhatkyCreate(){

        $phongban = Phongban::all();
        $vitri = Vitri::all();
        $nhansu = Nhansu::all();

        return view('admin::phong.nhatkyCreate',compact('phongban','vitri','nhansu'));
    }
    public function createNhatky(RequestPhongNhatKy $requestPhongNhatKy){
            $lamviec = new Lamviec();
            $lamviec->id_phong_ban = $requestPhongNhatKy->idphongban;
        $lamviec->id_nhan_su = $requestPhongNhatKy->idnhansu;
        $lamviec->id_vi_tri = $requestPhongNhatKy->idvitri;
        $lamviec->ngay_lam = $requestPhongNhatKy->ngaylam;
        $lamviec->ngay_ket_thuc = $requestPhongNhatKy->ngayketthuc;
        $lamviec->ghi_chu = $requestPhongNhatKy->ghichu;
        $lamviec->save();
        return redirect()->back();
    }

    public function nhatkyUpdate($id){
        $lamviec = Lamviec::find($id);
        $phongban = DB::table('phongban')
            ->join('lamviec', 'phongban.id', '=', 'lamviec.id_phong_ban')
            ->select('phongban.ten_phong as tenphong')
            ->where('lamviec.id_phong_ban',$lamviec->id_phong_ban)
            ->get();

        return view('admin::phong.nhatkyUpdate',compact('lamviec','phongban'));
    }

    public function updateNhatky(RequestPhongNhatKy $requestPhongNhatKy,$id){

        $lamviec = new Lamviec();
        $lamviec = Lamviec::find($id);
        $lamviec->id_phong_ban = $requestPhongNhatKy->idphongban;
        $lamviec->id_nhan_su = $requestPhongNhatKy->idnhansu;
        $lamviec->id_vi_tri = $requestPhongNhatKy->idvitri;
        $lamviec->ngay_lam = $requestPhongNhatKy->ngaylam;
        $lamviec->ngay_ket_thuc = $requestPhongNhatKy->ngayketthuc;
        $lamviec->ghi_chu = $requestPhongNhatKy->ghichu;
        $lamviec->save();
        return redirect()->back();
    }
}
