<?php

namespace App\Rules;

use App\Models\Account;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class ConfirmPassword implements Rule
{
    public $email = "pass";

    /**
     * Create a new rule instance.
     *
     * @return void
     */


    public function __construct($email)
    {
        $this->email = $email;
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
        $email = $this->email;
        $users = Account::where("email","=", $email)->first();
        if ($users == null) {
            return false;
        }
        else {
            if (Hash::check($value, $users->password)) {
                return true;
            }
            else {
                return false;
            }
        }

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Incorrect password!!';
    }
}
