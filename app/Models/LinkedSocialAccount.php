<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LinkedSocialAccount extends Model
{
    protected $fillable = ['provider_name', 'provider_id'];

    public function user()
    {
        return $this->BelongsTo('App\User');
    }
}