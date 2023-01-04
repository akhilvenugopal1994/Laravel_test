<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['user_id','line1', 'line2', 'line3'];
    protected $dates = ['created_at', 'updated_at','deleted_at'];
}
