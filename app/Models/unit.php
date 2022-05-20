<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class unit extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "units";
    protected $fillable = 
    ['kode_unit','nama_unit'];
    protected $dates = ['deleted_at'];
}
