<?php

namespace App\Http\Requests\Git;

use App\Rules\GithubConnectionValidator;
use Illuminate\Foundation\Http\FormRequest;

class CreateGitToken extends FormRequest
{
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
            'name' => 'required',
            'token' => ['required', new GithubConnectionValidator()],
        ];
    }
}
