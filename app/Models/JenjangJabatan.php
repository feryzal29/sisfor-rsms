<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenjangJabatan extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "jenjang_jabatans";
    protected $fillable = 
    ['kode_jenjang','nama_jenjang','tunjangan','index'];
    protected $dates = ['deleted_at'];
}
