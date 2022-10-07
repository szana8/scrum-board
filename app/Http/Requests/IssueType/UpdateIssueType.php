<?php

namespace App\Http\Requests\IssueType;

use Illuminate\Foundation\Http\FormRequest;

class UpdateIssueType extends FormRequest
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
            'name' => 'string',
            'description' => 'string',
            'icon' => 'string',
            'color_code' => 'string',
        ];
    }
}
