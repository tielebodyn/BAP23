<?php

namespace App\Http\Requests\Group;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGroupRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['string'],
            'logo' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'unit' => ['string', 'max:255'],
            'color' => ['string', 'max:255'],
            'address' => ['string', 'max:255'],
            'long' => ['string', 'max:255'],
            'lat' => ['string', 'max:255'],
            'place' => ['string', 'max:255'],
        ];
    }
}
