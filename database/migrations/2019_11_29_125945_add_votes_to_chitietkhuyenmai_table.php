<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVotesToChitietkhuyenmaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chitietkhuyenmai', function (Blueprint $table) {
            $table->foreign('id_khuyenmai')->references('id')->on('khuyenmai')->onDelete('cascade');
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
        Schema::table('chitietkhuyenmai', function (Blueprint $table) {
            //
        });
    }
}
