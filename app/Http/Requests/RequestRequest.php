<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'contact' => [
                'required',
                'string',
                'max:255',
            ],
            'department_id' => ['exists:App\Models\Department,id'],
            'page_id' => ['exists:App\Models\Page,id'],
            'message' => ['required', 'string', 'max:255'],
            'filename' => 'nullable|file|mimes:pdf,doc,docx|max:10240', // 10MB
        ];
    }
}
