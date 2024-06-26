<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  use HasFactory;
  protected $table = 'tb_categories';
  protected $primaryKey = 'cate_id';
  protected $guarded = [];
}
