<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SetAplikasi extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = 
    ['nama','moto','alamat','no_telp','email','logo'];
    protected $dates = ['deleted_at'];
}
