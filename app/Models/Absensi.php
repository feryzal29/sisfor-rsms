<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Absensi extends Model
{
    use HasFactory;
    protected $fillable = 
    ['diklat_id','employee_id','masuk_at','selesai_at','date'];

    public function diklat(){
        return $this->belongsTo(Diklat::class,'diklat_id','id');
    }

    public function employee(){
        return $this->belongsTo(employee::class,'employee_id','id');
    }
}
