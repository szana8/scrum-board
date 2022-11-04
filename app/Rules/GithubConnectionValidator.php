<?php

namespace App\Rules;

use GrahamCampbell\GitHub\Facades\GitHub;
use Illuminate\Contracts\Validation\Rule;

class GithubConnectionValidator implements Rule
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
        try {
            \Config::set('github.connections.main.token', $value);
            GitHub::connection('main')->me()->show();

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Github connection failed with the given token.';
    }
}
