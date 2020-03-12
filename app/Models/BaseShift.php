<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseShift extends Model
{
    protected $fillable = ['user_id', 'name', 'email',];
}
