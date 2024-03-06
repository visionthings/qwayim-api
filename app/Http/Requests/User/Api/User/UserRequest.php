<?php

namespace App\Http\Requests\User\Api\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
        $id = request()->route('user');
        if($id){
            return [
                'name'=>['nullable','string'],
                'email'=>['nullable','email',Rule::unique('users','email')->ignore($id)],
                'password'=>['nullable','string'],
                'country_code'=>['nullable'],
                'city'=>['nullable','string'],
                'date_of_birth'=>['nullable'],
                'gender'=>['nullable','in:male,female']
            ];
        }else {
            return [
                'name'=>['required','string'],
                'email'=>['required','email', 'unique:users,email'],
                'password'=>['required','string'],
                'country_code'=>['nullable'],
                'city'=>['nullable'],
                'date_of_birth'=>['nullable'],
                'gender'=>['nullable','in:male,female']

            ];
        }

    }
}
