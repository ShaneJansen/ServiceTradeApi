<?php

namespace App;

/**
 * Created by: Shane Jansen
 * Date: 2/1/16
 */
class Helper {
    public function getUserId($request) {
        return $request->header('X-USER-ID');
    }
}