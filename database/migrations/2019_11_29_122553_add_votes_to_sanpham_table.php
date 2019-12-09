<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVotesToSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sanpham', function (Blueprint $table) {
            $table->foreign('id_loaisanpham')->references('id')->on('loaisanpham')->onDelete('cascade');
            $table->foreign('id_baohanh')->references('id')->on('baohanh')->onDelete('cascade');
            $table->foreign('id_thuonghieu')->references('id')->on('thuonghieu')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sanpham', function (Blueprint $table) {
            //
        });
    }
}
