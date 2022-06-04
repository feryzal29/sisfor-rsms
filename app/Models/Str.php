<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Str extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = 
    ['employee_id','no_str','tgl_terbit','tgl_ed'];

}
