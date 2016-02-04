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

    public function modelToCamel($model) {
        $result = array();

        $result = $model;
        //while

        /*for ($i=0; $i<count($model); $i++) {
            //toArrayCamel()
            array_push($result, $model[$i]->toArrayCamel());
            for ($j=0; $j<count($model[$i]; $j++)) {

            }
        }*/
        return $result;
    }
}