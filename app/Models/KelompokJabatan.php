<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KelompokJabatan extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "kelompok_jabatans";
    protected $fillable = 
    ['kode_kelompok','nama_kelompok','index'];
    protected $dates = ['deleted_at'];
}
