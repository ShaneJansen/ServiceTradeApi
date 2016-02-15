<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests;

class AvailabilityController extends Controller {

    public function __construct() {}

    /**
     * Return all of the availability codes, types, and names.
     *
     * @return array
     */
    public function getPossibleAvailabilities() {
        $result = array();
        // Loop all availabilities except 'none' (0)
        for ($i=User::AVAILABILITY_MIN + 1; $i<=User::AVAILABILITY_MAX; $i++) {
            $item = array();
            $item['code'] = $i;
            $item['codeType'] = User::availabilityType($i);
            $item['decoded'] = User::availabilityName($i);
            array_push($result, $item);
        }

        return $result;
    }
}
