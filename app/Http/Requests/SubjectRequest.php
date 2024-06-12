<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class SubjectRequest extends FormRequest
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
            'subject_code' => ['required', 'max:25', 'string'],
            'description' => ['required', 'string', 'max:255'],
            'is_graduate_program' => ['required', 'boolean'],
            'units_lecture' => ['required', 'decimal:0,2', 'min:0', 'max:99.99'],
            'units_lab' => ['required', 'decimal:0,2', 'min:0', 'max:99.99'],
            'load' => ['required', 'decimal:0,2','min:0', 'max:99.99'],
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
            'subject_code' => 'Subject Code',
            'description' => 'Subject Description',
            'is_graduate_program' => 'Program Type',
            'units_lecture' => 'Unit Lecture',
            'units_lab' => 'Unit Lab',
            'load' => 'Subject Load',
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
