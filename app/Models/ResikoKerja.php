<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResikoKerja extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "resiko_kerjas";
    protected $fillable = 
    ['kode_resiko','nama_resiko','index'];
    protected $dates = ['deleted_at'];
}
