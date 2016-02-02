<?php

namespace App\Http\Controllers\User;

use Validator;
use Illuminate\Http\Request;

use App\Models\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;

class UserController extends Controller {
    protected $userRepo;

    public function __construct(UserRepository $userRepo) {
        $this->userRepo = $userRepo;
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

        return response($user->toArrayCamel());
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
        return response($user->toArrayCamel());
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
            $request->input('availability')
        );

        return response($user->toArrayCamel());
    }

    /**
     * Return all of the availability codes, types, and names.
     *
     * @return array
     */
    public function getUserAvailabilities() {
        $result = array();
        for ($i=User::AVAILABILITY_MIN; $i<=User::AVAILABILITY_MAX; $i++) {
            $item = array();
            $item['code'] = $i;
            $item['codeType'] = User::availabilityType($i);
            $item['decoded'] = User::availabilityName($i);
            array_push($result, $item);
        }

        return $result;
    }
}
