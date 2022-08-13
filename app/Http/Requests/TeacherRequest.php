<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class TeacherRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return match ($this->method()) {
            'POST' => $this->store(),
            'PUT' => $this->update(),
        };
    }

    public function store()
    {
        return [
            'teacher_code' => 'required|unique:teachers',
            'joining_date' => 'required',
            'designation' => 'required',
            'qualification' => 'required',
            'experience' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'address' => 'required',
            'email' => 'required|email|unique:users,email',
            'alternate_email' => 'nullable|email|unique:users,email',
            'phone_number_1' => 'required|unique:users,phone_number_1',
            'phone_number_2' => 'nullable|unique:users,phone_number_2',
            'password' => 'required|min:8|max:255',
            'mother_name' => 'nullable',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $response = redirect()
            ->back()
            ->with('error', 'Periksa kembali data yang anda inputkan')
            ->withErrors($validator);

        throw (new ValidationException($validator, $response))
            ->errorBag($this->errorBag)
            ->redirectTo($this->getRedirectUrl());
    }
}
