<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;

class FacultyRequest extends FormRequest
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
        $facultyId = $this->route('faculty');

        return [
            'id_usep' => ['required', 'string','size:10', 'regex:^\d{4}-\d{5}$^', Rule::unique('faculty', 'id_usep')->ignore($facultyId)],
            'first_name' => ['required','string','max:50',],
            'last_name' => ['required','string','max:50',],
            'is_part_timer' => ['boolean'],
            'designation' => ['nullable','max:255', 'string'],
            'designation_load' => ['nullable','decimal:0,2','min:0', 'max:99.99'],
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages(): array
    {
        return [];
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
