<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'name' => 'required|min:3|max:100',
            'start_date' => 'required|date|date_format:Y-m-d',
            'repo_link' => 'required',
            'img_path' => 'image|mimes:png,jpg|max:5120'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Il campo "Nome Progetto" è obbligatorio',
            'name.min' => 'Il campo "Nome Progetto" deve contenere almeno :min caratteri',
            'name.max' => 'Il campo "Nome Progetto" può contenere massimo :max caratteri',

            'start_date.required' => 'Il campo "Data di inizio" è obbligatorio',
            'start_date.date' => 'Il campo "Data di inizio" deve essere una data',
            'start_date.date_format' => 'Il campo "Data di inizio" deve essere del formato YYYY-MM-GG (esempio 2024-01-01)',

            'repo_link.required' => 'Il campo "Link Repository" è obbligatorio',

            'img_path.image' => 'Il file caricato deve essere un\' immagine',
            'img_path.mimes' => 'Il file caricato deve essere un\' immagine di tipo :values',
            'img_path.max' => 'Il file caricato non può superare i 5 MB',
        ];
    }
}
