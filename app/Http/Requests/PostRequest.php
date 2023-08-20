<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric'],
            'categories' => ['array', 'max:3', 'exists:categories,id'],
            'long' => ['required', 'string', 'max:255'],
            'lat' => ['required', 'string', 'max:255'],
            'place' => ['required', 'string', 'max:255'],
            'images' => ['array', 'max:4'],
            'status' => ['string', 'max:255'],
        ];
    }
}
