<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVotesToChitietphieunhapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chitietphieunhap', function (Blueprint $table) {
            $table->foreign('id_phieunhap')->references('id')->on('phieunhap')->onDelete('cascade');
            $table->foreign('id_sanpham')->references('id')->on('sanpham')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chitietphieunhap', function (Blueprint $table) {
            //
        });
    }
}
