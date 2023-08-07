<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateGroupRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
          return [
            'name' => ['string', 'max:255', 'unique:groups'],
            'description' => ['string', 'max:255'],
            'logo' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'unit' => ['string', 'max:255'],
            'color' => ['string', 'max:255'],
        ];
    }
}
