<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vacation extends Model
{
    protected $fillable = ['user_id', 'name', 'date', 'reason'];
}
