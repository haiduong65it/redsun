<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donhang', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_nhanvien')->unsigned();
            $table->bigInteger('id_thanhvien')->unsigned();
            $table->string('hoten');
            $table->string('sdt');
            $table->string('diachi');
            $table->string('phuongthucthanhtoan');
            $table->dateTime('ngaydat');
            $table->decimal('tongtien',18,0);
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
        Schema::dropIfExists('donhang');
    }
}
