<?php

namespace App\Http\Controllers;

use App\Helper;
use App\Repositories\SkillRepository;
use Validator;
use Illuminate\Http\Request;

use App\Models\User;
use App\Http\Requests;
use App\Repositories\UserRepository;

class UserController extends Controller {
    protected $helper;
    protected $userRepo;
    protected $skillRepo;

    public function __construct(Helper $helper, UserRepository $userRepo, SkillRepository $skillRepo) {
        $this->helper = $helper;
        $this->userRepo = $userRepo;
        $this->skillRepo = $skillRepo;
    }

    /**
     * Create a new user.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function create(Request $request) {
        $validator = Validator::make(
            $request->all(),
            [
                'firstName' => 'required',
                'lastName' => 'required',
                'email' => 'email|unique:users',
                'password' => 'required|min:5'
            ],
            [
                'email.unique' => 'This email is already in use.'
            ]);
        if ($validator->fails()) return response($validator->messages()->all(), 422);

        $user = $this->userRepo->createUser(
            $request->input('firstName'),
            $request->input('lastName'),
            $request->input('email'),
            $request->input('password')
        );

        return response($user);
    }

    /**
     * Authenticate a user from an email and password.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function authenticate(Request $request) {
        $user = $this->userRepo->authenticateUser(
            $request->input('email'),
            $request->input('password')
        );

        if ($user == null) return response()->json(['Incorrect email or password.'], 401);
        return response($user);
    }

    /**
     * Update a user.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function updateUser(Request $request) {
        $validator = Validator::make(
            $request->all(),
            [
                'availability' => 'integer|between:' . User::AVAILABILITY_MIN . ',' . User::AVAILABILITY_MAX
            ]);
        if ($validator->fails()) return response($validator->messages()->all(), 422);

        $user = $this->userRepo->updateUser(
            $request->input('firstName'),
            $request->input('lastName'),
            $request->input('email'),
            $request->input('availability')
        );

        return response($user);
    }

    /**
     * Return all of this user's skills.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function getAllUserSkills(Request $request) {
        return response($this->skillRepo->getAllUserSkills($this->helper->getUserId($request)));
    }

    /**
     * Add a skill to this user.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function addUserSkill(Request $request) {
        return response($this->skillRepo->addUserSkills(
            $this->helper->getUserId($request),
            $request->input('skillIds')));
    }
}
