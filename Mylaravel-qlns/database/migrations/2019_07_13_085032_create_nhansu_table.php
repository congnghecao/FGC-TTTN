<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhansuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhansu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ho_ten');
            $table->string('ngay_sinh');
            $table->string('noi_thuong_tru');
            $table->string('cmnd');
            $table->timestamp('ngay_vao');
            $table->string('ngay_hoc_viec')->nullable();
            $table->string('ngay_kt_hoc_viec')->nullable();
            $table->string('ngay_thu_viec')->nullable();
            $table->string('ngay_kt_thu_viec')->nullable();
            $table->string('ngay_lam_chinh_thuc')->nullable();
            $table->string('ngay_lam_ket_thuc')->nullable();
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
        Schema::dropIfExists('nhansu');
    }
}
