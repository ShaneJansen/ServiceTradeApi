<?php

namespace App\Models;

class SkillCategory extends BaseModel {

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];

    public function skillSubCategories() {
        return $this->hasMany('App\Models\SkillSubCategory');
    }
}
