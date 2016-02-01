<?php

namespace App\Repositories;

use Hash;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;

use App\Models\User;
use App\Helper;


/**
 * Created by Shane Jansen.
 * Date: 1/23/16
 */
class UserRepository {
    protected $userId;

    public function __construct(Request $request, Helper $helper) {
        $this->userId = $helper->getUserId($request);
    }

    public function createUser($firstName, $lastName, $email, $password) {
        $password = Hash::make($password);
        $token = Uuid::uuid4();

        $user = new User();
        $user->first_name = $firstName;
        $user->last_name = $lastName;
        $user->email = $email;
        $user->password = $password;
        $user->token = $token;
        $user->verified = 0;
        $user->save();

        return $user;
    }

    public function authenticateUser($email, $password) {
        $user = User::where('email', $email)->first();

        if ($user && Hash::check($password, $user->password)) {
            $user->touch();
            return $user;
        }

        return null;
    }

    public function updateUser($availability = null) {
        $user = User::where('id', $this->userId)->first();

        if (isset($availability)) $user->availability = $availability;
        $user->save();

        return $user;
    }
}