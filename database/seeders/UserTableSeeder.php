<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $data = [
      [
        'email' => 'user@gmail.com',
        'password' => bcrypt('user@gmail.com'),
        'level' => 1
      ], [
        'email' => 'admin@gmail.com',
        'password' => bcrypt('admin@gmail.com'),
        'level' => 1
      ]
    ];
    DB::table('tb_users')->insert($data);
  }
}
