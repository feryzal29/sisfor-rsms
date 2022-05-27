<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeesFile extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = 
    [
        'employee_id',
        'nama',
        'path'
    ];

    public function employee(){
        return $this->belongsTo(employee::class,'employee_id','id');
    }
}
