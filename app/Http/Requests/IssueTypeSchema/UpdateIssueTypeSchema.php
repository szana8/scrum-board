<?php

namespace App\Http\Requests\IssueTypeSchema;

use Illuminate\Foundation\Http\FormRequest;

class UpdateIssueTypeSchema extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|exists:issue_type_schemas,name',
            'description' => 'string',
            'issueTypes' => 'array',
        ];
    }
}
