<?php

namespace App\Http\Controllers;

use App\Repositories\SkillRepository;

use App\Http\Requests;

class SkillController extends Controller
{
    protected $skillRepo;

    public function __construct(SkillRepository $skillRepo) {
        $this->skillRepo = $skillRepo;
    }

    public function getPossibleSkills() {
        return response($this->skillRepo->getPossibleSkills());
    }
}
