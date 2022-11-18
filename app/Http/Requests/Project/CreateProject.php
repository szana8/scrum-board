<?php

namespace App\Http\Requests\Project;

use App\Enums\ProjectType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class CreateProject extends FormRequest
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
            'name' => 'required|max:200',
            'description' => 'max:1000',
            'type' => ['required', new Enum(ProjectType::class)],
            'key' => 'string|unique:projects,key',
            'icon' => 'string',
            'default_assignee_id' => 'exists:users,id',
        ];
    }

    public function messages()
    {
        return [
            'type.Illuminate\Validation\Rules\Enum' => 'Project type must be: SOFTWARE, SERVICE_DESK or BUSINESS.',
        ];
    }
}
