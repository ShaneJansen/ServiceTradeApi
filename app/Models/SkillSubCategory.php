<?php

namespace App\Models;

class SkillSubCategory extends BaseModel {

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];

    public function skills() {
        return $this->hasMany('App\Models\Skill');
    }
}
