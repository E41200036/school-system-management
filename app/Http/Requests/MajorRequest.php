<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MajorRequest extends FormRequest
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
            'name' => ['required', 'unique:majors,name']
        ];
    }

    public function update()
    {
        return [
            'name' => ['required', 'unique:majors,name,' . $this->major_id]
        ];
    }

}
