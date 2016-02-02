<?php

namespace App\Models;

class User extends BaseModel {
    const AVAILABILITY_MIN = 0;
    const AVAILABILITY_MAX = 5;

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'created_at', 'updated_at'
    ];

    /**
     * Override the getter for this attribute.
     *
     * @param $value
     * @return array
     */
    public function getAvailabilityAttribute($value) {
        return array(
            'code' => $value,
            'codeType' => $this->availabilityType($value),
            'decoded' => $this->availabilityName($value)
        );
    }

    /**
     * Returns the availability name for the availability code.
     *
     * @param $availability
     * @return string
     */
    public static function availabilityName($availability) {
        switch ($availability) {
            case 0: return $decoded = 'Not available for jobs.';
            case 1: return $decoded = 'Available for one job per week.';
            case 2: return $decoded = 'Available for two jobs per week.';
            case 3: return $decoded = 'Available for one job per month.';
            case 4: return $decoded = 'Available for two jobs per month.';
            case 5: return $decoded = 'Always available for jobs.';
        }
        return '';
    }

    /**
     * Returns the availability type for the availability code.
     *
     * @param $availability
     * @return string
     */
    public static function availabilityType($availability) {
        switch ($availability) {
            case 0: return $codeType = 'none';
            case 1: return $codeType = 'weekly';
            case 2: return $codeType = 'weekly';
            case 3: return $codeType = 'monthly';
            case 4: return $codeType = 'monthly';
            case 5: return $codeType = 'always';
        }
        return '';
    }
}
