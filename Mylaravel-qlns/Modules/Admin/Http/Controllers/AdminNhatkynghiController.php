<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AdminNhatkynghiController extends Controller
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
    public function index()
    {

        $xinnghi = DB::table('xinnghi')

            ->join('nhansu', 'nhansu.id', '=', 'xinnghi.id_nhan_su')
            ->select('nhansu.ho_ten as hoten',DB::raw('YEAR(STR_TO_DATE(xinnghi.ngay_bat_dau,\'%Y-%m-%d\')) as nam'),'xinnghi.loai_nghi as loainghi',DB::raw('count(xinnghi.id_nhan_su) as sonhansu'))
            ->groupBy('nhansu.ho_ten','xinnghi.loai_nghi',DB::raw('YEAR(STR_TO_DATE(xinnghi.ngay_bat_dau,\'%Y-%m-%d\'))'))

            ->get();
//        $xinnghi = DB::table('xinnghi')
//            ->select(DB::raw('YEAR(STR_TO_DATE(thoi_gian_nghi,\'%Y-%m-%d\')) as nam'),DB::raw('count(id_nhan_su) as sonhansu'))
//            ->groupBy(DB::raw('YEAR(STR_TO_DATE(thoi_gian_nghi,\'%Y-%m-%d\'))'))
//
//            ->get();
           //var_dump($xinnghi);
          return view('admin::nhatkynghi.nhatkyNghiindex',compact('xinnghi'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function postindex(Request $request){
        $hoten = $request->name;
        $xinnghi = DB::table('xinnghi')

            ->join('nhansu', 'nhansu.id', '=', 'xinnghi.id_nhan_su')
            ->select('nhansu.ho_ten as hoten',DB::raw('YEAR(STR_TO_DATE(xinnghi.ngay_bat_dau,\'%Y-%m-%d\')) as nam'),'xinnghi.loai_nghi as loainghi',DB::raw('count(xinnghi.id_nhan_su) as sonhansu'))
            ->groupBy('nhansu.ho_ten','xinnghi.loai_nghi',DB::raw('YEAR(STR_TO_DATE(xinnghi.ngay_bat_dau,\'%Y-%m-%d\'))'))
            ->where(DB::raw('YEAR(STR_TO_DATE(xinnghi.ngay_bat_dau,\'%Y-%m-%d\'))'),$hoten)
            ->get();
       // var_dump($xinnghi);
        return view('admin::nhatkynghi.nhatkyNghiindex',compact('xinnghi'));
    }
    public function getIndexThang(){
        $xinnghi = DB::table('xinnghi')

            ->join('nhansu', 'nhansu.id', '=', 'xinnghi.id_nhan_su')
            ->select('nhansu.ho_ten as hoten',DB::raw('MONTH(STR_TO_DATE(xinnghi.ngay_bat_dau,\'%Y-%m-%d\')) as thang'),DB::raw('YEAR(STR_TO_DATE(xinnghi.ngay_bat_dau,\'%Y-%m-%d\')) as nam'),'xinnghi.loai_nghi as loainghi',DB::raw('count(xinnghi.id_nhan_su) as sonhansu'))
            ->groupBy('nhansu.ho_ten','xinnghi.loai_nghi',DB::raw('YEAR(STR_TO_DATE(xinnghi.ngay_bat_dau,\'%Y-%m-%d\'))'),DB::raw('MONTH(STR_TO_DATE(xinnghi.ngay_bat_dau,\'%Y-%m-%d\'))'))

            ->get();
//        $xinnghi = DB::table('xinnghi')
//            ->select(DB::raw('YEAR(STR_TO_DATE(thoi_gian_nghi,\'%Y-%m-%d\')) as nam'),DB::raw('count(id_nhan_su) as sonhansu'))
//            ->groupBy(DB::raw('YEAR(STR_TO_DATE(thoi_gian_nghi,\'%Y-%m-%d\'))'))
//
//            ->get();
        //var_dump($xinnghi);
        return view('admin::nhatkynghi.nhatkyNghiThangIndex',compact('xinnghi'));
    }
}
