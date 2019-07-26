<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateXinnghiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('xinnghi', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_nhan_su');
            $table->foreign('id_nhan_su')->references('id')->on('nhansu');
            $table->integer('so_buoi_nghi');
            $table->string('ngay_bat_dau');
            $table->string('ngay_ket_thuc');
            $table->string('ly_do');
            $table->string('chuyen_toi_ai');
            $table->string('loai_nghi');
            $table->integer('phe_duyet');
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
        Schema::dropIfExists('xinnghi');
    }
}
