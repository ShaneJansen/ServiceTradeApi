<?php

namespace App\Models;

class SkillSubCategory extends BaseModel {

    public function skills() {
        return $this->hasMany('App\Models\Skill');
    }
}
