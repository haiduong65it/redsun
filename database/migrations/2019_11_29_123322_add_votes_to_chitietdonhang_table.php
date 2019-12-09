<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVotesToChitietdonhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chitietdonhang', function (Blueprint $table) {
            $table->foreign('id_donhang')->references('id')->on('donhang')->onDelete('cascade');
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
        Schema::table('chitietdonhang', function (Blueprint $table) {
            //
        });
    }
}
