<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model {
    public function jsonSerialize()
    {
        $array = $this->toArray();
        $this->transformKeys($array);
        return $array;
    }

    public function transformKeys(&$array)
    {
        foreach (array_keys($array) as $key):
            // Working with references here to avoid copying the value,
            // since the data is quite large.
            $value = &$array[$key];
            unset($array[$key]);
            // Perform key manipulation
            $transformedKey = lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $key))));
            // Work recursively
            if (is_array($value)) $this->transformKeys($value);
            // Store with new key
            $array[$transformedKey] = $value;
            // Unset references
            unset($value);
        endforeach;
    }
}
