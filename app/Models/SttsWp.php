<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SttsWp extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = 
    ['stts',
    'kategori'];
    protected $dates = ['deleted_at'];
}
