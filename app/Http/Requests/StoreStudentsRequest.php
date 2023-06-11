<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentsRequest extends FormRequest
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
           'id_student' => 'required|unique:students,id_student|min:11|max:11',
           'fullName' => 'required',
           'gender' => 'required',
           'address' => 'required',
           'email' => 'required|email|unique:students,email',
           'phone' => 'required|numeric',
        ];
    }

    public function messages(): array
{
    return [
        'id_student.required' => 'Student Id field is required.',
        'fullName.required' => 'Full Name is required',
        'gender.required' => 'Gender is required',
        'address.required' => 'Address is required',
        'email.required' => 'Email is required',
        'phone.required' => 'Phone is required',
    ];
}
}
