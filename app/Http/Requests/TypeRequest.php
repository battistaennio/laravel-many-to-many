<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypeRequest extends FormRequest
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
            'name' => 'required|min:2|max:15'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Il campo Tipo è obbligatorio',
            'name.min' => 'Il campo Tipo deve contenere almeno :min caratteri',
            'name.max' => 'Il campo Tipo deve contenere almeno :max caratteri'
        ];
    }
}
