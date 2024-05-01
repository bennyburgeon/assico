<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    public $table='employees'; 
    protected $primaryKey = 'employee_id';
    protected $fillabe = ['name','email','company','mobile_number','image','join_date','created_by','updated_by','created_at','updated_at'];
}
