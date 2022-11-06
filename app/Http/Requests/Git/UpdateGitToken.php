<?php

namespace App\Http\Requests\Git;

use App\Rules\GithubConnectionValidator;
use Illuminate\Foundation\Http\FormRequest;

class UpdateGitToken extends FormRequest
{
    public const MODE = 'UPDATE';

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id' => 'exists:git_token,id',
            'name' => 'required',
            'token' => ['nullable', new GithubConnectionValidator(self::MODE)],
        ];
    }
}
