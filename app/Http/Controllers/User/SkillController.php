<?php

namespace App\Http\Controllers\User;

use App\Helper;
use App\Repositories\SkillRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SkillController extends Controller
{
    protected $skillRepo;
    protected $helper;

    public function __construct(Helper $helper, SkillRepository $skillRepo) {
        $this->skillRepo = $skillRepo;
        $this->helper = $helper;
    }

    public function getPossibleSkills() {
        return response($this->skillRepo->getPossibleSkills());
    }
}
