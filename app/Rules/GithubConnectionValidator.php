<?php

namespace App\Rules;

use App\Http\Requests\Git\UpdateGitToken;
use GrahamCampbell\GitHub\Facades\GitHub;
use Illuminate\Contracts\Validation\Rule;

class GithubConnectionValidator implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(private ?string $mode = null)
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
    public function passes($attribute, $value): bool
    {
        if ($this->mode === UpdateGitToken::MODE && is_null($value)) {
            return true;
        }

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
