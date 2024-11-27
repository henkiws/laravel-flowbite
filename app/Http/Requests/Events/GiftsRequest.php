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
            'fk_event' => 'required',
            'type' => 'required',
            'fk_bank' => 'required',
            'account_name' => 'required',
            'account_number' => 'required',
            'account_qr' => 'required',
            'address' => 'required',
            'amount' => 'required',
        ];
    }
}
