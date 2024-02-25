<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PatientRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $idCardRule = 'required|string|max:255|unique:patients,id_card';

        if ($this->isMethod('put') || $this->isMethod('patch')) {
            $id = $this->route('id');
            $idCardRule = Rule::unique('patients', 'id_card')->ignore($id);
        }

        return [
            'id_card' => $idCardRule,
            'gender' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'date_of_birth' => ['required', 'date'],
            'address' => ['required', 'string', 'max:255'],
            'post_code' => ['nullable', 'string', 'max:255'],
            'contact_number_one' => ['required', 'string', 'max:255'],
            'contact_number_two' => ['nullable', 'string', 'max:255'],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'id_card.required' => __('The ID card field is required.'),
            'id_card.string' => __('The ID card must be a string.'),
            'id_card.unique' => __('The ID card has already been taken.'),
            'id_card.max' => __('The ID card may not be greater than 255 characters.'),
            'gender.required' => __('The gender field is required.'),
            'gender.string' => __('The gender must be a string.'),
            'gender.max' => __('The gender may not be greater than 255 characters.'),
            'name.required' => __('The name field is required.'),
            'name.string' => __('The name must be a string.'),
            'name.max' => __('The name may not be greater than 255 characters.'),
            'surname.required' => __('The surname field is required.'),
            'surname.string' => __('The surname must be a string.'),
            'surname.max' => __('The surname may not be greater than 255 characters.'),
            'date_of_birth.required' => __('The date of birth field is required.'),
            'date_of_birth.date' => __('The date of birth is not a valid date.'),
            'address.required' => __('The address field is required.'),
            'address.string' => __('The address must be a string.'),
            'address.max' => __('The address may not be greater than 255 characters.'),
            'post_code.string' => __('The post code must be a string.'),
            'post_code.max' => __('The post code may not be greater than 255 characters.'),
            'contact_number_one.required' => __('The primary contact number field is required.'),
            'contact_number_one.string' => __('The primary contact number must be a string.'),
            'contact_number_one.max' => __('The primary contact number may not be greater than 255 characters.'),
            'contact_number_two.string' => __('The secondary contact number must be a string.'),
            'contact_number_two.max' => __('The secondary contact number may not be greater than 255 characters.'),
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
            'id_card' => __('ID card'),
            'gender' => __('gender'),
            'name' => __('name'),
            'surname' => __('surname'),
            'date_of_birth' => __('date of birth'),
            'address' => __('address'),
            'post_code' => __('post code'),
            'contact_number_one' => __('primary contact number'),
            'contact_number_two' => __('secondary contact number'),
        ];
    }
}
