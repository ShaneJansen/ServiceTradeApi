<?php

namespace App\Models;

class SkillCategory extends BaseModel {

    public function skillSubCategories() {
        return $this->hasMany('App\Models\SkillSubCategory');
    }
}
