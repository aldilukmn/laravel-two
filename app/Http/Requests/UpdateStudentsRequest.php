<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStudentsRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'fullName' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'email' => [
                'required',
                Rule::unique('students', 'email')->ignore($this->id_student, 'id_student'),
                'email'
            ],
            'phone' => 'required|numeric',
        ];
    }

    public function messages(): array
    {
        return [
            'fullName.required' => 'Full Name is required',
            'gender.required' => 'Gender is required',
            'address.required' => 'Address is required',
            'email.required' => 'Email is required',
            'phone.required' => 'Phone is required',
        ];
    }
}
