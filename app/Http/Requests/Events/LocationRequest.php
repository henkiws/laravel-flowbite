<?php

namespace App\Http\Requests\Events;

use Illuminate\Foundation\Http\FormRequest;

class LocationRequest extends FormRequest
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
            'name' => 'required',
            'time' => 'required',
            'date' => 'required',
            'location' => 'required',
            'address' => 'required',
            'maps' => 'required',
            'map_embed' => 'required',
            'is_live' => 'required',
        ];
    }
}
