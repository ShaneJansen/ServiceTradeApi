<?php

namespace App;

class User extends BaseModel {
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'sign_up_ip', 'created_at', 'updated_at'
    ];
}
