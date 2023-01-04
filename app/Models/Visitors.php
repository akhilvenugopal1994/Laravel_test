<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Visitors extends Model
{
    use HasFactory;
    protected $fillable = ['ip_address','device_type', 'browser', 'user_agent'];
}
