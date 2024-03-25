<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
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
        'cate_name' => 'Iphone',
        'cate_slug' => Str::slug('iphone'),
      ],
      [
        'cate_name' => 'Samsung',
        'cate_slug' => Str::slug('samsung'),
      ],
    ];
    DB::table('tb_categories')->insert($data);
  }
}
