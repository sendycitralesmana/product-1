<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarouselRequest extends FormRequest
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
        if ($this->method() == 'POST') {
            return [
                'image' => 'required|image',
            ];
        } else {
            return [
                'image' => 'image',
            ];
        }
    }

    public function messages(): array
    {
        return [
            'image.required' => 'The image field is required.',
            'image.image' => 'The image must be an image.',
        ];
    }
}
