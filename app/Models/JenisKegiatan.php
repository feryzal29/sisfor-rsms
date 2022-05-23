<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisKegiatan extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = 
    ['nama','keterangan'];
    protected $dates = ['deleted_at'];
}
