<?php

namespace App\Repositories;

use App\Models\SkillCategory;
use App\Models\User;
use App\Models\UserSkill;
use Hash;

/**
 * Created by Shane Jansen.
 * Date: 1/23/16
 */
class SkillRepository {

    public function __construct() {}

    public function getPossibleSkills() {
        $result = SkillCategory::with('skillSubCategories.skills')->get();
        return $result;
    }

    public function getAllUserSkills($userId) {
        $skills = User::where('id', $userId)->first()->skills()->get();
        return $skills;
    }

    public function addUserSkills($userId, $skillIds) {
        foreach ($skillIds as $skillId) {
            $duplicate = UserSkill::where('user_id', $userId)
                ->where('skill_id', $skillId)->first();
            if ($duplicate == NULL) {
                $userSkill = new UserSkill();
                $userSkill->user_id = $userId;
                $userSkill->skill_id = $skillId;
                $userSkill->save();
            }
        }
        return $this->getAllUserSkills($userId);
    }
}