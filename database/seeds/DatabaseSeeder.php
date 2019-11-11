<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('thanhvien')->insert([
            'hoten' => 'Thuy Pham',
            'ngaysinh' => '1998-01-17',
            'gioitinh' => 'Female',
            'sdt' => '0123456789',
            'diachi' => 'Đà Nẵng',
            'email' => 'thuypham@gmail.com',
            'tendangnhap' => 'Thuy Pham',
            'matkhau' => bcrypt('123456'),
            'avatar' => 'default.png',
        ]);
    }
}
