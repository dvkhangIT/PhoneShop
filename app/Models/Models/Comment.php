<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  use HasFactory;
  protected $table = 'tb_comment';
  protected $primaryKey = 'com_id';
  protected $guarded = [];
}
