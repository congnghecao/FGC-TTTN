<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChitietchitieuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietchitieu', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_chi_tieu');
            $table->foreign('id_chi_tieu')->references('id')->on('chitieu');
//            $table->unsignedBigInteger('id_phong_ban');
//            $table->foreign('id_phong_ban')->references('id')->on('phongban');
            $table->unsignedBigInteger('id_nhan_su');
            $table->foreign('id_nhan_su')->references('id')->on('nhansu');
            $table->integer('diem_chi_tieu');
            $table->integer('diem_dat_duoc');
            $table->integer('thang');
            $table->integer('nam');
            $table->string('ket_qua');
            $table->string('khen_thuong');
            $table->string('canh_bao')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chitietchitieu');
    }
}
