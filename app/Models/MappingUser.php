<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MappingUser extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = 
    ['users_id','employees_id'];
    protected $dates = ['deleted_at'];

}
