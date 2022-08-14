<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        return match($this->method()) {
            'POST' => $this->store(),
            'PUT'  => $this->update(),
        };
    }

    public function store()
    {
        return [
            'first_name'      => ['required', 'max:255'],
            'last_name'       => ['required', 'max:255'],
            'email'           => ['required', 'unique:users,email'],
            'alternate_email' => ['nullable', 'email'],
            'phone_number_1'  => ['required', 'unique:users,phone_number_1'],
            'phone_number_2'  => ['nullable', 'unique:users,phone_number_2'],
            'dob'             => ['required'],
            'gender'          => ['required'],
            'address'         => ['required'],
            'role'            => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'first_name.required'     => 'Nama depan harus diisi',
            'first_name.max'          => 'Nama depan maksimal 255 karakter',
            'last_name.required'      => 'Nama belakang harus diisi',
            'last_name.max'           => 'Nama belakang maksimal 255 karakter',
            'email.required'          => 'Email harus diisi',
            'email.unique'            => 'Email sudah terdaftar',
            'alternate_email.email'   => 'Email alternatif harus berupa email',
            'phone_number_1.required' => 'Nomor telepon harus diisi',
            'phone_number_1.unique'   => 'Nomor telepon sudah terdaftar',
            'phone_number_2.unique'   => 'Nomor telepon sudah terdaftar',
            'dob.required'            => 'Tanggal lahir harus diisi',
            'gender.required'         => 'Jenis kelamin harus diisi',
            'address.required'        => 'Alamat harus diisi',
            'role.required'           => 'Role harus diisi',
        ];
    }
}
