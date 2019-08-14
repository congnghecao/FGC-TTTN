<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AdminThongKeController extends Controller
{
    /**
     * @param $nam
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getNhanSu($nam)
    {
        //query lấy số nhân sự vào làm trong từng tháng của năm
        $lam = DB::table('nhansu')
            ->select(DB::raw('month(ngay_vao) as thang,count(*) as so_ns'))
            ->whereRaw('Year(ngay_vao)=' . $nam)
            ->groupBy('thang')
            ->get();

        //query lấy số nhân sự vào làm trong từng tháng của năm
        $lamn = DB::table('nhansu')
            ->select(DB::raw('COUNT(*) as so_ns'))
            ->whereRaw('Year(ngay_vao)=' . $nam)
            ->where(function ($query) use ($nam) {
                $query->whereNull('ngay_lam_ket_thuc')
                    ->orWhereRaw('year(ngay_lam_ket_thuc)>' . $nam);
            })
            ->get();
        $lamBar = DB::table('nhansu')
            ->select(DB::raw('year(ngay_vao) as nam,count(*) as sl'))
            ->groupBy('nam')
            ->get();

        //query lấy số nhân sự nghỉ làm trong từng tháng của năm
        $nghi = DB::table('nhansu')
            ->select(DB::raw('month(ngay_lam_ket_thuc) as thang,count(*) as so_ns'))
            ->whereNotNull('ngay_lam_ket_thuc')
            ->whereRaw('Year(ngay_lam_ket_thuc)=' . $nam)
            ->groupBy('thang')
            ->get();

        //query lấy số nhân sự nghỉ làm trong từng tháng của năm
        $nghin = DB::table('nhansu')
            ->select(DB::raw('COUNT(*) as so_ns'))
            ->whereNotNull('ngay_lam_ket_thuc')
            ->whereRaw('Year(ngay_lam_ket_thuc)=' . $nam)
            ->get();

        $nghiBar = DB::table('nhansu')
            ->select(DB::raw('year(ngay_lam_ket_thuc) as nam,count(*) as sl'))
            ->whereNotNull('ngay_lam_ket_thuc')
            ->groupBy('nam')
            ->get();

        $minNam = DB::table('nhansu')
            ->selectRaw('min(year(ngay_vao)) as minNam')
            ->get();

        $arrLam = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        $arrNghi = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

        //Chèn số người làm tháng đó vào mảng
        foreach ($lam as $ns)
            $arrLam[$ns->thang - 1] = $ns->so_ns;
        $strLam = $arrLam[0] . "," . $arrLam[1] . "," . $arrLam[2] . "," . $arrLam[3] . "," . $arrLam[4] . "," . $arrLam[5] . "," . $arrLam[6] . "," . $arrLam[7] . "," . $arrLam[8] . "," . $arrLam[9] . "," . $arrLam[10] . "," . $arrLam[11];

        //Chèn số người nghỉ tháng đó vào mảng
        foreach ($nghi as $ns)
            $arrNghi[$ns->thang - 1] = $ns->so_ns;

        $strNghi = $arrNghi[0] . "," . $arrNghi[1] . "," . $arrNghi[2] . "," . $arrNghi[3] . "," . $arrNghi[4] . "," . $arrNghi[5] . "," . $arrNghi[6] . "," . $arrNghi[7] . "," . $arrNghi[8] . "," . $arrNghi[9] . "," . $arrNghi[10] . "," . $arrNghi[11];

        $nsLam = $nsnghi = $mNam = 0;
        foreach ($lamn as $a)
            $nsLam = $a->so_ns;

        foreach ($nghin as $a)
            $nsnghi = $a->so_ns;

        foreach ($minNam as $a)
            $mNam = $a->minNam;

        $arrBar = array();
        $date = getdate();
        $strNam = '';
        for ($i = $mNam; $i <= $date['year']; $i++) {
            if ($i === $mNam) $strNam .= "Năm " . $i;
            else $strNam .= ",Năm " . $i;
            $arrBar[$i] = 0;
        }
        foreach ($lamBar as $bar)
            $arrBar[$bar->nam] = $bar->sl;
        foreach ($nghiBar as $bar)
            $arrBar[$bar->nam] -= $bar->sl;

        $strBar = $arrBar[$mNam];
        for ($i = $mNam + 1; $i <= $date['year']; $i++) {
            $arrBar[$i] += $arrBar[$i - 1];
            $strBar .= "," . $arrBar[$i];
        }

        return view('admin::thongke.nhan-su', ['strLam' => $strLam, 'strNghi' => $strNghi, 'lamn' => $nsLam, 'nghin' => $nsnghi, 'minNam' => $mNam, 'nam' => $nam, 'strBar' => $strBar, 'strNam' => $strNam]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postNhanSu(Request $request)
    {
        if ($request->has('nam1'))
            $nam = $request->nam1;
        else
            $nam = $request->nam2;
        return redirect('admin/thongke/nhan-su/' . $nam);
    }

    /**
     * @param $nam
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getChiTieu($nam, $id)
    {
        $chitieu = DB::table('chitietchitieu')
            ->select('chitieu.id', 'chitieu.ten_chi_tieu')
            ->join('chitieu', 'chitietchitieu.id_chi_tieu', '=', 'chitieu.id')
            ->distinct()
            ->get();
        $minNam = DB::table('chitietchitieu')
            ->selectRaw('min(nam) as nam')
            ->get();

        $datCT = DB::table('chitietchitieu')
            ->select(DB::raw('thang,count(*) as sl'))
            ->whereRaw('diem_dat_duoc = diem_chi_tieu')
            ->where('nam', '=', $nam)
            ->where('id_chi_tieu', '=', $id)
            ->groupBy('thang')
            ->get();

        $namDatCT = DB::table('chitietchitieu')
            ->select(DB::raw('nam,count(*) as sl'))
            ->whereRaw('diem_dat_duoc = diem_chi_tieu')
            ->where('id_chi_tieu', $id)
            ->groupBy('nam')
            ->get();

        $vuotCT = DB::table('chitietchitieu')
            ->select(DB::raw('thang,count(*) as sl'))
            ->whereRaw('diem_dat_duoc > diem_chi_tieu')
            ->where('nam', '=', $nam)
            ->where('id_chi_tieu', '=', $id)
            ->groupBy('thang')
            ->get();

        $namVCT = DB::table('chitietchitieu')
            ->select(DB::raw('nam,count(*) as sl'))
            ->whereRaw('diem_dat_duoc > diem_chi_tieu')
            ->where('id_chi_tieu', $id)
            ->groupBy('nam')
            ->get();

        $kdatCT = DB::table('chitietchitieu')
            ->select(DB::raw('thang,count(*) as sl'))
            ->whereRaw('diem_dat_duoc < diem_chi_tieu')
            ->where('nam', '=', $nam)
            ->where('id_chi_tieu', '=', $id)
            ->groupBy('thang')
            ->get();

        $namKDatCT = DB::table('chitietchitieu')
            ->select(DB::raw('nam,count(*) as sl'))
            ->whereRaw('diem_dat_duoc < diem_chi_tieu')
            ->where('id_chi_tieu', $id)
            ->groupBy('nam')
            ->get();

        $arrDat = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        $arrKDat = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        $arrVDat = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        $sumDat = $sumKDat = $sumVDat = 0;
        foreach ($datCT as $a) {
            $arrDat[$a->thang - 1] = $a->sl;
            $sumDat += $a->sl;
        }
        $strDat = $arrDat[0] . "," . $arrDat[1] . "," . $arrDat[2] . "," . $arrDat[3] . "," . $arrDat[4] . "," . $arrDat[5] . "," . $arrDat[6] . "," . $arrDat[7] . "," . $arrDat[8] . "," . $arrDat[9] . "," . $arrDat[10] . "," . $arrDat[11];

        foreach ($kdatCT as $a) {
            $arrKDat[$a->thang - 1] = $a->sl;
            $sumKDat += $a->sl;
        }
        $strKDat = $arrKDat[0] . "," . $arrKDat[1] . "," . $arrKDat[2] . "," . $arrKDat[3] . "," . $arrKDat[4] . "," . $arrKDat[5] . "," . $arrKDat[6] . "," . $arrKDat[7] . "," . $arrKDat[8] . "," . $arrKDat[9] . "," . $arrKDat[10] . "," . $arrKDat[11];

        foreach ($vuotCT as $a) {
            $arrVDat[$a->thang - 1] = $a->sl;
            $sumVDat += $a->sl;
        }
        $strVDat = $arrVDat[0] . "," . $arrVDat[1] . "," . $arrVDat[2] . "," . $arrVDat[3] . "," . $arrVDat[4] . "," . $arrVDat[5] . "," . $arrVDat[6] . "," . $arrVDat[7] . "," . $arrVDat[8] . "," . $arrVDat[9] . "," . $arrVDat[10] . "," . $arrVDat[11];

        foreach ($minNam as $a)
            $mNam = $a->nam;
        $arrNDat = array();
        $arrNKDat = array();
        $arrNVDat = array();
        $date = getdate();
        $year = $date['year'];
        $strNam = '';
        for ($i = $mNam; $i <= $year; $i++) {
            if ($i === $mNam) $strNam .= "Năm " . $i;
            else $strNam .= ",Năm " . $i;
            $arrNDat[$i] = 0;
            $arrNKDat[$i] = 0;
            $arrNVDat[$i] = 0;
        }

        foreach ($namDatCT as $a)
            $arrNDat[$a->nam] = $a->sl;
        foreach ($namKDatCT as $a)
            $arrNKDat[$a->nam] = $a->sl;
        foreach ($namVCT as $a)
            $arrNVDat[$a->nam] = $a->sl;

        $strNamDat = $strNamKDat = $strNamVDat = '';
        for ($i = $mNam; $i <= $year; $i++) {
            if ($i === $mNam) {
                $strNamDat .= $arrNDat[$i];
                $strNamKDat .= $arrNKDat[$i];
                $strNamVDat .= $arrNVDat[$i];
            } else {
                $strNamDat .= ',' . $arrNDat[$i];
                $strNamKDat .= ',' . $arrNKDat[$i];
                $strNamVDat .= ',' . $arrNVDat[$i];
            }
        }

        return view('admin::thongke.chi-tieu', ['id' => $id, 'nam' => $nam, 'chitieu' => $chitieu, 'minNam' => $minNam, 'strDat' => $strDat, 'strKDat' => $strKDat, 'strVDat' => $strVDat, 'sumDat' => $sumDat, 'sumKDat' => $sumKDat, 'sumVDat' => $sumVDat, 'strNam' => $strNam, 'strNamDat' => $strNamDat, 'strNamKDat' => $strNamKDat, 'strNamVDat' => $strNamVDat]);
    }

    public function postChiTieu(Request $request)
    {
        $nam = $request->nam;
        $id = $request->chitieu;
        return redirect('admin/thongke/chi-tieu/' . $nam . '/' . $id);
    }
}
