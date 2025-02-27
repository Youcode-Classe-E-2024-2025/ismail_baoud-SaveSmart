<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class SignupRequest extends FormRequest
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
            'firstName' => ['required', 'string'],
            'lastName' => ['required', 'string'],
            'phone'=>['required', 'string'],
            'email' => ['required', 'email', 'unique:accounts'],
            'password' => ['required', 'min:8'],
            'image' => ['required', 'image'],
        ];

    }
    public function messages()
    {
        return [
            'firsName.required' => 'First name is required.',
            'lastName.required' => 'Last name is required.',
            'email.required' => 'Email is required. ',
            'password.required' => 'Password is required.',
            'phone.required' => 'Phone number is required.',
            'image.required' => 'Profile image is required.',
        ];
    }
}
