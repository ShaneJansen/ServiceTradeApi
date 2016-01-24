<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model {

    public function toArrayCamel() {
        $array = $this->toArray();

        foreach($array as $key => $value) {
            $return[camel_case($key)] = $value;
        }

        return $return;
    }
}
