<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;


class BlockRequest extends FormRequest
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
            'course' => ['required', 'max:255', 'string'],
            'section' => ['required', 'max:255', 'string'],
            'year_level' => ['required', 'max:6', 'numeric'], 
        ];
    }

    /**
     * edit message for the validation
     */
    // public function messages(): array
    // {
    //     return[];
    // }

    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator){
        throw new HttpResponseException(
            redirect()->back()
            ->with('error', 'Input Submission Failed: one or more data inputted is invalid. Please try again')
            ->withInput()
        );
    }
}
