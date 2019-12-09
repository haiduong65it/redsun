<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChitietdonhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietdonhang', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_donhang')->unsigned();
            $table->bigInteger('id_sanpham')->unsigned();
            $table->Integer('size');
            $table->string('mau');
            $table->Integer('soluong');
            $table->decimal('dongia',18,0);
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
        Schema::dropIfExists('chitietdonhang');
    }
}
