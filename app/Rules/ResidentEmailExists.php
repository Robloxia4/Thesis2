<?php

namespace App\Rules;

use App\Models\resident_account;
use Illuminate\Contracts\Validation\Rule;

class ResidentEmailExists implements Rule
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
        $users = resident_account::where("email","=", $value)->first();
        if ($users == null) {
            return false;
        }
        else {
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Email does not exist';
    }
}
