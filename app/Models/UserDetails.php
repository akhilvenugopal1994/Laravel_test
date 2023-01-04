<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserDetails extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['name','last_name', 'phone', 'email', 'dob'];
    protected $dates = ['created_at', 'updated_at','deleted_at'];
}
