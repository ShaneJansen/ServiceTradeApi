<?php

namespace App\Repositories;

use App\Models\SkillCategory;
use Hash;
use Illuminate\Http\Request;

use App\Helper;


/**
 * Created by Shane Jansen.
 * Date: 1/23/16
 */
class SkillRepository {
    protected $userId;

    public function __construct(Request $request, Helper $helper) {
        $this->userId = $helper->getUserId($request);
    }

    public function getPossibleSkills() {
        $result = SkillCategory::with('skillSubCategories.skills')->get();
        return $result;
    }
}