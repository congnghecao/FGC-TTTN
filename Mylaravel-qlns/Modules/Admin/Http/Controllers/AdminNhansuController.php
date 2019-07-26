<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Lamviec;
use App\Models\Nhansu;
use App\Models\Xinnghi;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AdminNhansuController extends Controller
{

    public function getDanhSach()
    {
       $nhansu = DB::table('nhansu')
            ->select(DB::raw('nhansu.id,nhansu.ho_ten,nhansu.ngay_sinh,nhansu.noi_thuong_tru,nhansu.cmnd,nhansu.ngay_vao,STR_TO_DATE(nhansu.ngay_lam_chinh_thuc,\'%Y-%m-%d\')-STR_TO_DATE(nhansu.ngay_lam_ket_thuc,\'%Y-%m-%d\') as so_nam_cong_tac,nhansu.ngay_hoc_viec,nhansu.ngay_kt_hoc_viec,nhansu.ngay_thu_viec,nhansu.ngay_kt_thu_viec,nhansu.ngay_lam_chinh_thuc,nhansu.ngay_lam_ket_thuc'))
            ->join('lamviec', 'nhansu.id', '=', 'lamviec.id_nhan_su')
            ->join('phongban', 'lamviec.id_phong_ban', '=', 'phongban.id')
            ->join('vitri', 'lamviec.id_vi_tri', '=', 'vitri.id')
//            ->whereNull('lamviec.ngay_ket_thuc')
//            ->distinct()
            ->get();
        $lamviec = DB::table('nhansu')
            ->select(DB::raw('vitri.ten_vi_tri,phongban.ten_phong,lamviec.ngay_lam,lamviec.ngay_ket_thuc'))
            ->join('lamviec', 'nhansu.id', '=', 'lamviec.id_nhan_su')
            ->join('phongban', 'lamviec.id_phong_ban', '=', 'phongban.id')
            ->join('vitri', 'lamviec.id_vi_tri', '=', 'vitri.id')
            ->whereNull('lamviec.ngay_ket_thuc')
            ->get();
        return view('admin::nhansu.danh-sach', ['nhansu' => $nhansu, 'lamviec' => $lamviec]);
    }

    public function getThem()
    {
        $phongban = DB::table('phongban')->select('id', 'ten_phong')->get();
        $vitri = DB::table('vitri')->select('id', 'ten_vi_tri')->get();
        return view('admin::nhansu.them', ['phongban' => $phongban, 'vitri' => $vitri]);
    }

    public function postThem(Request $request)
    {
        //them vao bang nhan su
        $nhansu = new Nhansu();

        $nhansu->ho_ten = $request->hoten;
        $nhansu->ngay_sinh = $request->ngaysinh;
        $nhansu->noi_thuong_tru = $request->ntt;
        $nhansu->cmnd = $request->cmnd;
        $nhansu->ngay_hoc_viec = $request->ngayhv;
        $nhansu->ngay_kt_hoc_viec = $request->ngaykthv;
        $nhansu->ngay_thu_viec = $request->ngaytv;
        $nhansu->ngay_kt_thu_viec = $request->ngaykttv;
        $nhansu->ngay_lam_chinh_thuc = $request->ngaylct;
        $nhansu->ngay_lam_ket_thuc = $request->ngaylkt;

        $nhansu->save();
        //lay id moi them vao
        $id_ns = DB::table('nhansu')->select(DB::raw('max(id) as id'))->get();
        foreach ($id_ns as $id) {
            //them vao bang lam viec
            $lamviec = new Lamviec();

            $lamviec->id_phong_ban = $request->phongban;
            $lamviec->id_nhan_su = $id->id;
            $lamviec->id_vi_tri = $request->vitri;

            $lamviec->save();
        }

        return redirect('admin/nhansu/them/')->with('thongbao', 'Đã thêm mới thành công');
    }

    public function getSua($id)
    {
        $nhansu = Nhansu::find($id);
        return view('admin::nhansu.sua', ['nhansu' => $nhansu]);
    }

    public function postSua(Request $request, $id)
    {
        $nhansu = Nhansu::find($id);

        $nhansu->ho_ten = $request->hoten;
        $nhansu->ngay_sinh = $request->ngaysinh;
        $nhansu->noi_thuong_tru = $request->ntt;
        $nhansu->cmnd = $request->cmnd;
        $nhansu->ngay_hoc_viec = $request->ngayhv;
        $nhansu->ngay_kt_hoc_viec = $request->ngaykthv;
        $nhansu->ngay_thu_viec = $request->ngaytv;
        $nhansu->ngay_kt_thu_viec = $request->ngaykttv;
        $nhansu->ngay_lam_chinh_thuc = $request->ngaylct;
        $nhansu->ngay_lam_ket_thuc = $request->ngaylkt;

        $nhansu->save();
        return redirect('admin/nhansu/sua/' . $id)->with('thongbao', 'Đã sửa thành công');
    }

    public function getXoa($id)
    {
        $nhansu = Nhansu::find($id);
        $nhansu->delete();
        return redirect()->back()->with('thongbao', 'Đã xóa thành công');
    }

    public function getLichSu($id)
    {
        $nhansu = DB::table('nhansu')
            ->select(DB::raw('nhansu.id,nhansu.ho_ten,vitri.ten_vi_tri,phongban.ten_phong,lamviec.ngay_lam,lamviec.ngay_ket_thuc,STR_TO_DATE(lamviec.ngay_lam,\'%Y-%m-%d\')-STR_TO_DATE(lamviec.ngay_ket_thuc,\'%Y-%m-%d\') as so_nam_lam_viec'))
            ->join('lamviec', 'nhansu.id', '=', 'lamviec.id_nhan_su')
            ->join('phongban', 'lamviec.id_phong_ban', '=', 'phongban.id')
            ->join('vitri', 'lamviec.id_vi_tri', '=', 'vitri.id')
            ->where('nhansu.id', '=', $id)
            ->get();
        return view('admin::nhansu.lich-su-cong-tac', ['nhansu' => $nhansu]);
    }

    public function postLichSu(Request $request)
    {
        $id = $request->id;
        $nhansu = DB::table('nhansu')
            ->select(DB::raw('nhansu.id,nhansu.ho_ten,vitri.ten_vi_tri,phongban.ten_phong,lamviec.ngay_lam,lamviec.ngay_ket_thuc,STR_TO_DATE(lamviec.ngay_lam,\'%Y-%m-%d\')-STR_TO_DATE(lamviec.ngay_ket_thuc,\'%Y-%m-%d\') as so_nam_lam_viec'))
            ->join('lamviec', 'nhansu.id', '=', 'lamviec.id_nhan_su')
            ->join('phongban', 'lamviec.id_phong_ban', '=', 'phongban.id')
            ->join('vitri', 'lamviec.id_vi_tri', '=', 'vitri.id')
            ->where('nhansu.id', '=', $id)
            ->get();
        return view('admin::nhansu.lich-su-cong-tac', ['nhansu' => $nhansu]);
    }

    public function getXinNghi($id)
    {
        $nhansu = DB::table('nhansu')
            ->select(DB::raw('xinnghi.id,xinnghi.id_nhan_su,nhansu.ho_ten,xinnghi.so_buoi_nghi,concat(xinnghi.ngay_bat_dau,\' ->\',xinnghi.ngay_ket_thuc) as thoi_gian_nghi,xinnghi.ly_do,xinnghi.chuyen_toi_ai,xinnghi.loai_nghi,xinnghi.phe_duyet'))
            ->join('lamviec', 'nhansu.id', '=', 'lamviec.id_nhan_su')
            ->join('phongban', 'lamviec.id_phong_ban', '=', 'phongban.id')
            ->join('vitri', 'lamviec.id_vi_tri', '=', 'vitri.id')
            ->join('xinnghi', 'xinnghi.id_nhan_su', 'nhansu.id')
            ->where('nhansu.id', '=', $id)
            ->distinct()
            ->get();
        $lamviec = DB::table('nhansu')
            ->select(DB::raw('vitri.ten_vi_tri,phongban.ten_phong,lamviec.ngay_lam,lamviec.ngay_ket_thuc'))
            ->join('lamviec', 'nhansu.id', '=', 'lamviec.id_nhan_su')
            ->join('phongban', 'lamviec.id_phong_ban', '=', 'phongban.id')
            ->join('vitri', 'lamviec.id_vi_tri', '=', 'vitri.id')
            ->where('lamviec.id_nhan_su','=',$id)
            ->get();
        return view('admin::xinnghi.xin-nghi', ['nhansu' => $nhansu, 'lamviec' => $lamviec]);
    }

    public function postXinNghi(Request $request)
    {
        $id = $request->id;
        $nhansu = DB::table('nhansu')
            ->select(DB::raw('xinnghi.id,xinnghi.id_nhan_su,nhansu.ho_ten,xinnghi.so_buoi_nghi,concat(xinnghi.ngay_bat_dau,\' ->\',xinnghi.ngay_ket_thuc) as thoi_gian_nghi,xinnghi.ly_do,xinnghi.chuyen_toi_ai,xinnghi.loai_nghi,xinnghi.phe_duyet'))
            ->join('lamviec', 'nhansu.id', '=', 'lamviec.id_nhan_su')
            ->join('phongban', 'lamviec.id_phong_ban', '=', 'phongban.id')
            ->join('vitri', 'lamviec.id_vi_tri', '=', 'vitri.id')
            ->join('xinnghi', 'xinnghi.id_nhan_su', 'nhansu.id')
            ->where('nhansu.id', '=', $id)
            ->distinct()
            ->get();
        return view('admin::xinnghi.xin-nghi', ['nhansu' => $nhansu]);
    }

    public function getThemXN()
    {
        $vitri = DB::table('vitri')
            ->select('ten_vi_tri')
            ->where('ten_vi_tri', '!=', 'Nhân viên')
            ->get();
        return view('admin::xinnghi.them', ['vitri' => $vitri]);

//        print 'dasdas';


    }

    public function postThemXN(Request $request)
    {
        $xinnghi = new Xinnghi();

        $xinnghi->id_nhan_su = $request->id_nhan_su;
        $xinnghi->so_buoi_nghi = $request->sbn;
        $xinnghi->ngay_bat_dau = $request->nbd;
        $xinnghi->ngay_ket_thuc = $request->nkt;
        $xinnghi->ly_do = $request->ldn;
        $xinnghi->chuyen_toi_ai = $request->vitri;
        $xinnghi->loai_nghi = $request->loainghi;
        $xinnghi->phe_duyet = $request->tt;

        $xinnghi->save();
        return redirect('admin/xinnghi/them')->with('thongbao', 'Đã thêm thành công');
    }

    public function getPheDuyet($id)
    {
        $xinnghi = Xinnghi::find($id);

        $xinnghi->phe_duyet = 1;

        $xinnghi->save();
        return redirect('admin/xinnghi/xin-nghi')->with('thongbao', 'Phê duyệt thành công');
    }

    public function getSuaXN($id)
    {
        $vitri = DB::table('vitri')
            ->select('ten_vi_tri')
            ->where('ten_vi_tri', '!=', 'Nhân viên')
            ->get();
        $xinnghi = Xinnghi::find($id);

        return view('admin::xinnghi.sua', ['xinnghi' => $xinnghi, 'vitri' => $vitri]);
    }

    public function postSuaXN(Request $request, $id)
    {
        $xinnghi = Xinnghi::find($id);

        $xinnghi->id_nhan_su = $request->id_nhan_su;
        $xinnghi->so_buoi_nghi = $request->sbn;
        $xinnghi->ngay_bat_dau = $request->nbd;
        $xinnghi->ngay_ket_thuc = $request->nkt;
        $xinnghi->ly_do = $request->ldn;
        $xinnghi->chuyen_toi_ai = $request->vitri;
        $xinnghi->loai_nghi = $request->loainghi;
        $xinnghi->phe_duyet = $request->tt;

        $xinnghi->save();
        return redirect('admin/xinnghi/xin-nghi')->with('thongbao', 'Đã sửa thành công');
    }

    public function getXoaXN($id)
    {
        $xinnghi = Xinnghi::find($id);

        $xinnghi->delete();
        return redirect('admin/xinnghi/xin-nghi')->with('thongbao', 'Đã xóa thành công');
    }

}
