<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employees_cuti extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'pj_terkait',
        'kabag_umum',
        'pengganti',
        'tgl_pengajuan',
        'tgl_awal',
        'tgl_akhir',
        'jml_cuti',
        'status',
        'jenis_cuti',
        'alamat_tujuan',
        'kepengingan_cuti'
    ];

    public function employee(){
        return $this->belongsTo(employee::class,'employee_id','id');
    }

    public function pj(){
        return $this->belongsTo(employee::class,'pj_terkait','id');
    }

    public function kabag(){
        return $this->belongsTo(employee::class,'kabag_umum','id');
    }

    public function pg(){
        return $this->belongsTo(employee::class,'pengganti','id');
    }

}
