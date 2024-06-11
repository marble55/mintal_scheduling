<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class ScheduleRequest extends FormRequest
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
            'day.*' => ['required', 'string', 'regex:^(M,|T,|W,|TH,|F,|S,|SU,)$^'],
            'is_lab' => ['boolean'],
            'faculty_id' => ['nullable', 'integer', 'exists:faculty,id'],
            'subject_id' => ['required', 'integer', 'exists:subject,id'],
            'classroom_id' => ['nullable', 'integer', 'exists:classroom,id'],
            'block_id' => ['nullable', 'integer', 'exists:block,id'],
            'time_start' => ['required', 'date_format:H:i', 'before:time_end'],
            'time_end' => ['required', 'date_format:H:i',],
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
            'day.*' => 'Day',
            'is_lab' => 'Subject Unit',
            'faculty_id' => 'Faculty',
            'subject_id' => 'Subject',
            'classroom_id' => 'Classroom',
            'block_id' => 'Block',
            'time_start' => 'Starting Time',
            'time_end' => 'Ending Time'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'time_start.before' => 'The :attribute must be before the Ending Time',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            redirect()->back()
                ->with('error', 'Input Submission Failed: One or more data inputted is invalid. Please try again')
                ->withInput()
                ->withErrors($validator->errors())
        );
    }
}
