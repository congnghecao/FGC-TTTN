<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLamviecTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lamviec', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_phong_ban');

            $table->unsignedBigInteger('id_nhan_su');

            $table->unsignedBigInteger('id_vi_tri');

            $table->timestamp('ngay_lam');
            $table->string('ngay_ket_thuc')->nullable();
            $table->string('ghi_chu')->nullable();
            $table->timestamps();
            $table->foreign('id_phong_ban')->references('id')->on('phongban');
            $table->foreign('id_nhan_su')->references('id')->on('nhansu');
            $table->foreign('id_vi_tri')->references('id')->on('vitri');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lamviec');
    }
}
