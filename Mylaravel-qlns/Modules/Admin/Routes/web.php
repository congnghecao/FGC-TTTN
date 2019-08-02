<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('admin.trangchu');

    Route::group(['prefix' => 'phong'], function () {
        Route::get('/', 'AdminPhongController@index')->name('admin.get.list.phong');
        Route::post('/', 'AdminPhongController@store')->name('admin.post.create.phong');
        Route::post('/update', 'AdminPhongController@update')->name('admin.get.update.phong');

//        Route::get('/','AdminPhongController@postIndex');


        Route::get('/selectns', 'AdminPhongController@selectns')->name('admin.get.selectns.phong');

        Route::get('/selectns1/{id}', 'AdminPhongController@selectns1')->name('admin.get.selectns1.phong');

//        Route::get('/create','AdminPhongController@create')->name('admin.get.create.phong');
//        Route::post('/create','AdminPhongController@store');
//
//        Route::get('/update','AdminPhongController@edit')->name('admin.get.edit.phong');


        Route::get('/delete/{id}', 'AdminPhongController@delete')->name('admin.get.delete.phong');

        Route::get('/nhatkyIndex', 'AdminPhongController@nhatkyIndex')->name('admin.get.nhatkyIndex.phong');
        Route::post('/nhatkyIndex', 'AdminPhongController@postindex')->name('admin.post.nhatkyIndex.phong');


        Route::get('/nhatkyCreate', 'AdminPhongController@nhatkyCreate')->name('admin.get.nhatkyCreate.phong');
        Route::post('/nhatkyCreate', 'AdminPhongController@createNhatky');


        Route::get('/nhatkyUpdate/{id}', 'AdminPhongController@nhatkyUpdate')->name('admin.get.nhatkyUpdate.phong');
        Route::post('/nhatkyUpdate/{id}', 'AdminPhongController@updateNhatky');

        // Route::get('/editPhong/{idlamviec}','AdminPhongController@aB')->name('admin.get.aB.phong');
    });

    Route::group(['prefix' => 'nhansu'], function () {
        ;
        //thêm sửa xóa danh sách nhân sự
        Route::get('danh-sach', 'AdminNhansuController@getDanhSach')->name('admin.get.index.nhansu');
        Route::post('danh-sach', 'AdminNhansuController@postDanhSach');

        Route::post('them', 'AdminNhansuController@postThem');

        Route::get('sua/{id}', 'AdminNhansuController@getSua')->name('admin.get.sua.nhansu');
        Route::post('sua/{id}', 'AdminNhansuController@postSua');

        Route::get('xoa/{id}', 'AdminNhansuController@getXoa')->name('admin.get.xoa.nhansu');
        //Lịch sử công tác
        Route::get('lich-su-cong-tac/{id}', 'AdminNhansuController@getLichSu')->name('admin.get.lichsucongtac.nhansu');
        Route::post('lich-su-cong-tac', 'AdminNhansuController@postLichSu');

        Route::get('them-chuc-vu/{id}/{phongban}/{vitri}', 'AdminNhansuController@getThemCV');
        Route::get('sua-chuc-vu/{id}', 'AdminNhansuController@getSuaCV');
        Route::get('ssua-chuc-vu/{id}/{nhansu}/{phongban}/{vitri}/{ngaykt}', 'AdminNhansuController@postSuaCV');
        Route::get('xoa-chuc-vu/{id}/{nhansu}', 'AdminNhansuController@getXoaCV');

        Route::get('chi-tiet/{id}', 'AdminNhansuController@getChiTiet');

    });
    Route::group(['prefix' => 'xinnghi'], function () {
        //xin nghỉ
        Route::get('index/{id}', 'AdminNhansuController@getXinNghi')->name('admin.get.index.xinnghi');
        Route::post('index', 'AdminNhansuController@postXinNghi');

        Route::get('them', 'AdminNhansuController@getThemXN')->name('admin.get.them.xinnghi');
        Route::post('them', 'AdminNhansuController@postThemXN');

        Route::get('phe-duyet/{id}/{nhansu}', 'AdminNhansuController@getPheDuyet');

        Route::get('sua/{id}', 'AdminNhansuController@getSuaXN');
        Route::post('sua/{id}', 'AdminNhansuController@postSuaXN');

        Route::get('xoa/{id}/{nhansu}', 'AdminNhansuController@getXoaXN');
    });


    Route::group(['prefix' => 'chitieu'], function () {
        Route::get('/', 'AdminChitieuController@index')->name('admin.get.list.chitieu');
        Route::post('/', 'AdminChitieuController@PostCreate')->name('admin.get.create.chitieu');

        Route::group(['prefix' => 'chitieu'], function () {

            Route::get('/', 'AdminChitieuController@index')->name('admin.get.list.chitieu');

            Route::post('/', 'AdminChitieuController@PostCreate')->name('admin.get.create.chitieu');

//        Route::get('/update/{id}','AdminChitieuController@getUpdate')->name('admin.get.update.chitieu');
            Route::post('/update', 'AdminChitieuController@postUpdate')->name('admin.get.update.chitieu');

//        Route::get('/delete/{id}','AdminChitieuController@delete')->name('admin.get.delete.chitieu');

            Route::get('/danhsachChitieu', 'AdminChitieuController@danhsachchitieu')->name('admin.get.danhsachchitieu.chitieu');
            Route::post('/update', 'AdminChitieuController@postUpdate')->name('admin.get.update.chitieu');

            Route::get('/danhsachChitieu', 'AdminChitieuController@danhsachchitieu')->name('admin.get.danhsachchitieu.chitieu');

            Route::get('/danhsachChitieuPhong/{id}', 'AdminChitieuController@danhsachchitieuphong')->name('admin.get.danhsachchitieuphong.chitieu');

//        Route::post('/danhsachChitieuPhong/{id}','AdminChitieuController@postDanhSachChitieuPhong')->name('admin.post.danhsachchitieuphong.chitieu');

            Route::get('/chitieuNhansuIndex', 'AdminChitieuController@chitieuNhansuIndex')->name('admin.get.danhsachchitieunhansu.chitieu');

            Route::get('/chitieuNhansuCreate', 'AdminChitieuController@getChitieuNhansuCreate')->name('admin.get.danhsachchitieunhansuCreate.chitieu');
            Route::post('/chitieuNhansuCreate', 'AdminChitieuController@postChitieuNhansuCreate');
            Route::get('/chitieuNhansuIndex', 'AdminChitieuController@chitieuNhansuIndex')->name('admin.get.danhsachchitieunhansu.chitieu');

            Route::post('/chitieuNhansuIndex', 'AdminChitieuController@postChitieuNhansuIndex')->name('admin.post.danhsachchitieunhansu.chitieu');

            Route::post('/chitieuNhansuCreate', 'AdminChitieuController@postChitieuNhansuCreate')->name('admin.post.danhsachchitieunhansuCreate.chitieu');

            Route::post('/chitieuNhansuUpdate', 'AdminChitieuController@postChitieuNhansuUpdate')->name('admin.get.danhsachchitieunhansuUpdate.chitieu');

            Route::get('/chitieuNhansuDelete/{id}', 'AdminChitieuController@chitieuNhansuDelete')->name('admin.get.delete.chitieu');

        });

        Route::group(['prefix' => 'nhatkynghi'], function () {
            Route::get('/index', 'AdminNhatkynghiController@index')->name('admin.get.list.nhatkynghi');
            Route::post('/index', 'AdminNhatkynghiController@postindex');
            Route::group(['prefix' => 'nhatkynghi'], function () {
                Route::get('/index', 'AdminNhatkynghiController@index')->name('admin.get.list.nhatkynghi');
                Route::post('/index', 'AdminNhatkynghiController@postindex');

                Route::get('/thang', 'AdminNhatkynghiController@getIndexThang')->name('admin.get.listthang.nhatkynghi');


            });
        });
    });
});