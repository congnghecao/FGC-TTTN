<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Lamviec;
use App\Models\Nhansu;
use App\Models\Phongban;
use App\Models\Vitri;
use App\Models\Xinnghi;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminNhansuController extends Controller
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

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getDanhSach($page)
    {
        if (Auth::user()->name === 'Admin') {
            $nhansu = DB::table('nhansu')
                ->select(DB::raw('nhansu.id,nhansu.ho_ten,nhansu.ngay_sinh,nhansu.noi_thuong_tru,nhansu.cmnd,nhansu.ngay_vao,DATEDIFF(nhansu.ngay_lam_ket_thuc,nhansu.ngay_vao) as ngayct,DATEDIFF(now(),nhansu.ngay_vao) as ngayht,nhansu.ngay_hoc_viec,nhansu.ngay_kt_hoc_viec,nhansu.ngay_thu_viec,nhansu.ngay_kt_thu_viec,nhansu.ngay_lam_chinh_thuc,nhansu.ngay_lam_ket_thuc'))
                ->paginate($page);
        } else {
            $nhansu = DB::table('nhansu')
                ->select(DB::raw('nhansu.id,nhansu.ho_ten,nhansu.ngay_sinh,nhansu.noi_thuong_tru,nhansu.cmnd,nhansu.ngay_vao,DATEDIFF(nhansu.ngay_lam_ket_thuc,nhansu.ngay_vao) as ngayct,DATEDIFF(now(),nhansu.ngay_vao) as ngayht,nhansu.ngay_hoc_viec,nhansu.ngay_kt_hoc_viec,nhansu.ngay_thu_viec,nhansu.ngay_kt_thu_viec,nhansu.ngay_lam_chinh_thuc,nhansu.ngay_lam_ket_thuc'))
                ->where('nhansu.id', Auth::user()->id)
                ->paginate($page);
        }
        $lamviec = DB::table('nhansu')
            ->select(DB::raw('nhansu.id,vitri.ten_vi_tri,phongban.ten_phong,lamviec.ngay_lam,lamviec.ngay_ket_thuc'))
            ->join('lamviec', 'nhansu.id', '=', 'lamviec.id_nhan_su')
            ->join('phongban', 'lamviec.id_phong_ban', '=', 'phongban.id')
            ->join('vitri', 'lamviec.id_vi_tri', '=', 'vitri.id')
            ->whereNull('lamviec.ngay_ket_thuc')
            ->get();
        $phongban = DB::table('phongban')->select('id', 'ten_phong')->get();
        $vitri = DB::table('vitri')->select('id', 'ten_vi_tri')->get();
        return view('admin::nhansu.danh-sach', ['nhansu' => $nhansu, 'lamviec' => $lamviec, 'phongban' => $phongban, 'vitri' => $vitri, 'page' => $page]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function postDanhSach(Request $request, $page)
    {
        $id = $request->id;
        $nhansu = DB::table('nhansu')
            ->select(DB::raw('nhansu.id,nhansu.ho_ten,nhansu.ngay_sinh,nhansu.noi_thuong_tru,nhansu.cmnd,nhansu.ngay_vao,DATEDIFF(nhansu.ngay_lam_ket_thuc,nhansu.ngay_vao) as ngayct,DATEDIFF(now(),nhansu.ngay_vao) as ngayht,nhansu.ngay_hoc_viec,nhansu.ngay_kt_hoc_viec,nhansu.ngay_thu_viec,nhansu.ngay_kt_thu_viec,nhansu.ngay_lam_chinh_thuc,nhansu.ngay_lam_ket_thuc'))
            ->where('nhansu.id', 'like', $id . '%')
            ->paginate($page);
        $lamviec = DB::table('nhansu')
            ->select(DB::raw('nhansu.id,vitri.ten_vi_tri,phongban.ten_phong,lamviec.ngay_lam,lamviec.ngay_ket_thuc'))
            ->join('lamviec', 'nhansu.id', '=', 'lamviec.id_nhan_su')
            ->join('phongban', 'lamviec.id_phong_ban', '=', 'phongban.id')
            ->join('vitri', 'lamviec.id_vi_tri', '=', 'vitri.id')
            ->whereNull('lamviec.ngay_ket_thuc')
            ->where('nhansu.id', 'like', $id . '%')
            ->get();
        $phongban = DB::table('phongban')->select('id', 'ten_phong')->get();
        $vitri = DB::table('vitri')->select('id', 'ten_vi_tri')->get();
        return view('admin::nhansu.danh-sach.' . $page, ['nhansu' => $nhansu, 'lamviec' => $lamviec, 'phongban' => $phongban, 'vitri' => $vitri]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getChiTiet($id)
    {
        $nhansu = nhansu::find($id);
        $lamviec = DB::table('nhansu')
            ->select(DB::raw('nhansu.id,vitri.ten_vi_tri,phongban.ten_phong,lamviec.ngay_lam,lamviec.ngay_ket_thuc'))
            ->join('lamviec', 'nhansu.id', '=', 'lamviec.id_nhan_su')
            ->join('phongban', 'lamviec.id_phong_ban', '=', 'phongban.id')
            ->join('vitri', 'lamviec.id_vi_tri', '=', 'vitri.id')
            ->whereNull('lamviec.ngay_ket_thuc')
            ->where('nhansu.id', $id)
            ->get();
        return view('admin::nhansu.ajax.chi-tiet', ['nhansu' => $nhansu, 'lamviec' => $lamviec]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
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

        $user = new User();
        $user->name = $request->hoten;
        $user->email = $request->email;
        $user->password = bcrypt("123456");

        $user->save();
        return redirect('admin/nhansu/danh-sach/10')->with('thongbao', 'Đã thêm mới thành công');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getSua($id)
    {
        $nhansu = Nhansu::find($id);
        $user = User::find($id);
        return view('admin::nhansu.ajax.sua-nhan-su', ['nhansu' => $nhansu, 'user' => $user]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postSua(Request $request, $id)
    {
        //Chỉnh sửa thông tin cá nhân
        $nhansu = nhansu::find($id);

        $nhansu->ho_ten = $request->hotens;
        $nhansu->ngay_sinh = $request->ngaysinhs;
        $nhansu->noi_thuong_tru = $request->ntts;
        $nhansu->cmnd = $request->cmnds;
        $nhansu->ngay_hoc_viec = $request->ngayhvs;
        $nhansu->ngay_kt_hoc_viec = $request->ngaykthvs;
        $nhansu->ngay_thu_viec = $request->ngaytvs;
        $nhansu->ngay_kt_thu_viec = $request->ngaykttvs;
        $nhansu->ngay_lam_chinh_thuc = $request->ngaylcts;
        $nhansu->ngay_lam_ket_thuc = $request->ngaylkts;

        $nhansu->save();
        //Chỉnh sửa email đăng nhập
        $user = User::find($id);
        $user->email = $request->emails;
        $user->save();
        return redirect('admin/nhansu/danh-sach/10')->with('thongbao', 'Đã sửa thành công');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getXoa($id)
    {
        $nhansu = Nhansu::find($id);
        $nhansu->delete();
        return redirect()->back()->with('thongbao', 'Đã xóa thành công');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getLichSu($id, $page)
    {
        $stt = 1;
        if (Auth::user()->name === 'Admin') {
            $nhansu = DB::table('nhansu')
                ->select(DB::raw('lamviec.id,nhansu.ho_ten,vitri.ten_vi_tri,phongban.ten_phong,lamviec.ngay_lam,lamviec.ngay_ket_thuc,DATEDIFF(lamviec.ngay_ket_thuc,lamviec.ngay_lam) as ngayct,DATEDIFF(now(),lamviec.ngay_lam) as ngayht'))
                ->join('lamviec', 'nhansu.id', '=', 'lamviec.id_nhan_su')
                ->join('phongban', 'lamviec.id_phong_ban', '=', 'phongban.id')
                ->join('vitri', 'lamviec.id_vi_tri', '=', 'vitri.id')
                ->where('nhansu.id', '=', $id)
                ->paginate($page);
        } else {
            $id = Auth::user()->id;
            $nhansu = DB::table('nhansu')
                ->select(DB::raw('lamviec.id,nhansu.ho_ten,vitri.ten_vi_tri,phongban.ten_phong,lamviec.ngay_lam,lamviec.ngay_ket_thuc,DATEDIFF(lamviec.ngay_ket_thuc,lamviec.ngay_lam) as ngayct,DATEDIFF(now(),lamviec.ngay_lam) as ngayht'))
                ->join('lamviec', 'nhansu.id', '=', 'lamviec.id_nhan_su')
                ->join('phongban', 'lamviec.id_phong_ban', '=', 'phongban.id')
                ->join('vitri', 'lamviec.id_vi_tri', '=', 'vitri.id')
                ->where('nhansu.id', '=', $id)
                ->paginate($page);
        }
        $phongban = phongban::all();
        $vitri = vitri::all();
        return view('admin::nhansu.lich-su-cong-tac', ['page' => $page, 'nhansu' => $nhansu, 'phongban' => $phongban, 'vitri' => $vitri, 'id' => $id, 'stt' => $stt]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postLichSu(Request $request, $page)
    {
        if (Auth::user()->name === 'Admin') {
            $id = $request->id;
        } else {
            $id = Auth::user()->id;
        }
        return redirect('admin/nhansu/lich-su-cong-tac/' . $id . '/' . $page);
    }

    /**
     * @param $id
     * @param $phongban
     * @param $vitri
     * @return int
     */
    public function getThemCV($id, $phongban, $vitri)
    {
        $chucvu = DB::table('lamviec')
            ->where('id_nhan_su', $id)
            ->where('id_phong_ban', $phongban)
            ->where('id_vi_tri', $vitri)
            ->whereNull('ngay_ket_thuc')
            ->get();
        if (sizeof($chucvu) !== 0) {
            return 0;
        } else {
            $add = new lamviec();

            $add->id_nhan_su = $id;
            $add->id_phong_ban = $phongban;
            $add->id_vi_tri = $vitri;

            $add->save();
            return 1;
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getSuaCV($id)
    {
        $lamviec = Lamviec::find($id);
        $phongban = phongban::all();
        $vitri = vitri::all();
        return view('admin::nhansu.ajax.sua-chuc-vu', ['lamviec' => $lamviec, 'phongban' => $phongban, 'vitri' => $vitri]);
    }

    public function postSuaCV($id, $nhansu, $phongban, $vitri, $ngaykt)
    {
        if ($ngaykt === '0') $ngaykt = null;
        $chucvu = DB::table('lamviec')
            ->where('id_nhan_su', $nhansu)
            ->where('id_phong_ban', $phongban)
            ->where('id_vi_tri', $vitri)
            ->where('id', '!=', $id)
            ->whereNull('ngay_ket_thuc')
            ->get();
        if (sizeof($chucvu) !== 0) {
            return 0;
        } else {
            $update = Lamviec::find($id);

            $update->id_phong_ban = $phongban;
            $update->id_vi_tri = $vitri;
            $update->ngay_ket_thuc = $ngaykt;

            $update->save();
            return 1;
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function getXoaCV($id)
    {
        $chucvu = Lamviec::find($id);
        $chucvu->delete();
        return redirect()->back()->with('thongbao', 'Đã xóa thành công');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getXinNghi($id, $page)
    {
        $stt = 1;
        if (Auth::user()->name === 'Admin') {
            $nhansu = DB::table('nhansu')
                ->select(DB::raw('xinnghi.id,xinnghi.id_nhan_su,nhansu.ho_ten,xinnghi.so_buoi_nghi,xinnghi.ngay_bat_dau,xinnghi.ngay_ket_thuc,xinnghi.ly_do,xinnghi.chuyen_toi_ai,xinnghi.loai_nghi,xinnghi.phe_duyet'))
                ->join('xinnghi', 'xinnghi.id_nhan_su', 'nhansu.id')
                ->where('nhansu.id', '=', $id)
                ->orderByDesc('xinnghi.id')
                ->paginate($page);
        } else {
            $id = Auth::user()->id;
            $nhansu = DB::table('nhansu')
                ->select(DB::raw('xinnghi.id,xinnghi.id_nhan_su,nhansu.ho_ten,xinnghi.so_buoi_nghi,xinnghi.ngay_bat_dau,xinnghi.ngay_ket_thuc,xinnghi.ly_do,xinnghi.chuyen_toi_ai,xinnghi.loai_nghi,xinnghi.phe_duyet'))
                ->join('xinnghi', 'xinnghi.id_nhan_su', 'nhansu.id')
                ->where('nhansu.id', '=', $id)
                ->orderByDesc('xinnghi.id')
                ->paginate($page);
        }
        $vitri = DB::table('vitri')
            ->select('ten_vi_tri')
            ->where('ten_vi_tri', '!=', 'Nhân viên')
            ->get();
        return view('admin::xinnghi.xin-nghi', ['page' => $page, 'nhansu' => $nhansu, 'vitri' => $vitri, 'stt' => $stt, 'id' => $id]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function postXinNghi(Request $request, $page)
    {
        $id = $request->id;
        return redirect('admin/xinnghi/index/' . $id . '/' . $page);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
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
        return redirect('admin/xinnghi/index/' . $request->id_nhan_su . '/10')->with('thongbao', 'Đã thêm thành công!');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function getPheDuyet($id, $nhansu, $page)
    {
        $xinnghi = Xinnghi::find($id);

        $xinnghi->phe_duyet = 1;

        $xinnghi->save();
        return redirect('admin/xinnghi/index/' . $nhansu . '/' . $page)->with('thongbao', 'Đã phê duyệt thành công!');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getSuaXN($id)
    {
        $vitri = DB::table('vitri')
            ->select('ten_vi_tri')
            ->where('ten_vi_tri', '!=', 'Nhân viên')
            ->get();
        $xinnghi = Xinnghi::find($id);

        return view('admin::xinnghi.ajax.sua', ['xinnghi' => $xinnghi, 'vitri' => $vitri]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postSuaXN(Request $request, $id)
    {
        $xinnghi = Xinnghi::find($id);

        $xinnghi->id_nhan_su = $request->id_nhan_sus;
        $xinnghi->so_buoi_nghi = $request->sbns;
        $xinnghi->ngay_bat_dau = $request->nbds;
        $xinnghi->ngay_ket_thuc = $request->nkts;
        $xinnghi->ly_do = $request->ldns;
        $xinnghi->chuyen_toi_ai = $request->vitris;
        $xinnghi->loai_nghi = $request->loainghis;
        if (Auth::user()->name === 'Admin')
            $xinnghi->phe_duyet = $request->tts;
        else
            $xinnghi->phe_duyet = 0;

        $xinnghi->save();
        return redirect('admin/xinnghi/index/' . $request->id_nhan_sus . '/10')->with('thongbao', 'Đã sửa thành công!');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function getXoaXN($id)
    {
        $xinnghi = Xinnghi::find($id);

        $xinnghi->delete();
        return redirect()->back()->with('thongbao', 'Đã xóa thành công');
    }

}
