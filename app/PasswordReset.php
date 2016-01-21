<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    protected $hidden = [];

    public function user() {
        return $this->belongsTo('App\User', 'email', 'email');
    }
}
