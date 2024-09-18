<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;

class TemplateRequest extends FormRequest
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
            'path' => 'required',
            'active' => 'required',
            'image' => 'required_without:id|max:10000|mimes:png,jpg,jpeg,webp',
            'original_price' => 'required',
            'markup_price' => 'required',
            'discount' => 'required',
            'is_featured' => 'required',
            'used_count' => 'required',
        ];
    }
}
