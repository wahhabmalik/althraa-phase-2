<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AgeRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
     
    protected  $min_age;
     
    public function __construct($min_age)
    {
        $this->min_age = $min_age;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
         return $value > $this->min_age;  
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Reitirement age must be greater than current age';
    }
}
