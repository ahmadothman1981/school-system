<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'phone' => ['required', 'numeric' ],
            'address' => ['required', 'string', 'max:255'],
            'date_of_birth'=>['required','date'],
            'image'=>'extensions:png,jpg,jpeg',
            'notes'=>['string', 'max:255'],
           
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'name.max' => 'The name field must not exceed 255 characters.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'The email address is already in use.',
            'phone.required' => 'The phone field is required.',
            'phone.numeric' => 'Please enter a valid phone number.',
            'date_of_birth.required'=>'please enter birth day student',
            'image.extensions' => 'The file must be image file png jpg jpeg .',


        ];
    }

}