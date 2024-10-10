<?php

namespace App\Http\Requests\Events;

use Illuminate\Foundation\Http\FormRequest;

class GiftsRequest extends FormRequest
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
            'name' => 'required',
            'description' => 'required',
            'image' => 'required_without:id|max:10000|mimes:png,jpg,jpeg,webp',
            'name' => 'required',
        ];
    }
}
