<?php

namespace App\Http\Requests\Dashboard\Web\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminRequest extends FormRequest
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
        $id = request()->route('admin');
        return [
            'name'=>['required','string'],
            'password'=>['required','string'],
            'email'=>['required',Rule::unique('admins','email')->ignore($id)],
            'phone'=>['required',Rule::unique('admins','phone')->ignore($id)],
            'job_name'=>['required','string'],
            'job_descripation'=>['required','string'],
        ];
    }
}
