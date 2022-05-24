<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Diklat extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'units_id',
        'nama',
        'jenis_kegiatans_id',
        'tempat',
        'tanggal'
    ];
    protected $dates = ['deleted_at'];

    public function unit(){
        return $this->belongsTo(unit::class,'units_id','id');
    }

    public function kegiatan(){
        return $this->belongsTo(JenisKegiatan::class,'jenis_kegiatans_id','id');
    }
}
