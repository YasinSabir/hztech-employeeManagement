<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidationRules implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        //
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        $message=[
            'email.required' => '',
            'password.required' => '',
            'username.required' => '',
            'firstname.required' => '',
            'lastname.required' => '',
            'date.required' => '',
        ];
        return $message;
    }
}
