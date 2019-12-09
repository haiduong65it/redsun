<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChitietkhuyenmaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietkhuyenmai', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_khuyenmai')->unsigned();
            $table->bigInteger('id_sanpham')->unsigned();
            $table->string('thongtinkhuyenmai');
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
        Schema::dropIfExists('chitietkhuyenmai');
    }
}
