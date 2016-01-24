<?php

namespace App\Http\Controllers\User;

use Validator;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;

class UserController extends Controller {
    protected $userRepo;

    public function __construct(UserRepository $userRepo) {
        $this->userRepo = $userRepo;
    }

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
        if ($validator->fails()) return response($validator->messages(), 422);

        $user = $this->userRepo->createUser(
            $request->input('firstName'),
            $request->input('lastName'),
            $request->input('email'),
            $request->input('password'),
            $request->input('ip')
        );

        return response($user->toArrayCamel());
    }

    public function authenticate(Request $request) {
        $user = $this->userRepo->authenticateUser(
            $request->input('email'),
            $request->input('password')
        );

        if ($user == null) return response('Incorrect email or password.', 401);
        return response($user->toArrayCamel());
    }
}
