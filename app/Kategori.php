<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = "kategoriler";
    protected $fillable = ['baslik','slug'];
}
