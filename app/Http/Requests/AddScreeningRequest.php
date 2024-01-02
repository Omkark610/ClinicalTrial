<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Screening;

class AddScreeningRequest extends FormRequest
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
        $statuses = Screening::STATUSES;
        return [
            'first_name' => "required|alpha|string|max:200",
            'dob' => 'required|date|before:-18 years',
            'status'=> ['required', Rule::in($statuses)],
            'frequency' => 'required_if:status,'.$statuses[2]."|in:".implode(", ", Screening::FREQUENCIES)
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
            'status.required' => 'Migraine status is required',
            'status.in' => 'Migraine status should be between '.implode(", ", Screening::STATUSES),
            'dob.required' => 'Date of birth is required',
            'dob.before' => 'You must be 18 years old',
        ];
    }
}
