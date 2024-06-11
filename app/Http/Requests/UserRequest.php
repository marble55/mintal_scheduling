<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class UserRequest extends FormRequest
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
            'name' => ['nullable', 'string','max:50'],
            'password' => ['nullable','string','min:8', 'max:255'],
            'email' => ['required', 'email','max:50'],
            'faculty_id' => ['required','integer','exists:faculty,id'],
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'name' => 'Username',
            'password' => 'Password',
            'email' => 'Email',
            'faculty_id' => 'Faculty',
        ];
    }

    public function failedValidation(Validator $validator){
        throw new HttpResponseException(
            redirect()->back()
            ->with('error', 'Input Submission Failed: One or more data inputted is invalid. Please try again')
            ->withInput()
            ->withErrors($validator)
        );
    }
}
