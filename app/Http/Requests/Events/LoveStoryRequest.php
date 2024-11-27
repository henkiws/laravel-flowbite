<?php

namespace App\Http\Requests\Events;

use Illuminate\Foundation\Http\FormRequest;

class LoveStoryRequest extends FormRequest
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
            'fk_event' => 'required',
            'title' => 'required',
            'description' => 'required',
            'path' => 'required_without:id|max:10000|mimes:png,jpg,jpeg,webp',
            'date' => 'required',
            'position' => 'required',
        ];
    }
}
