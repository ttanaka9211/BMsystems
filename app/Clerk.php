<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clerk extends Model
{
    protected $table = 'clerks';

    protected $guarded = array('id');

    public $timestamps = true;

    protected $fillable = [
        'name', 'mail', 'line_id', 'phone', 'mobile', 'zipcode', 'address', 'created_at', 'updated_at',
    ];
}