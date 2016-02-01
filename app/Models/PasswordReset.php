<?php

namespace App\Models;

class PasswordReset extends BaseModel {
    protected $hidden = [];

    public function user() {
        return $this->belongsTo('App\User', 'email', 'email');
    }
}
