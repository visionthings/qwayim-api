<?php

namespace App\Http\Requests\Dashboard\Web\City;

use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends FormRequest
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
        $id = request()->route('city');
        if($id){
            return [
                'name'=>['required','string'],
                'country_code'=>['required','max:5'],
                'about'=>['nullable','string'],
                'google_map'=>['nullable','regex:/^((?:https?\:\/\/|www\.)(?:[-a-z0-9]+\.)*[-a-z0-9]+.*)$/'],
                'flag_image'=>['nullable','image','mimes:png,jpg'],
                'city_images.0'=>['nullable','image','mimes:png,jpg'],
                'city_milestones'=>['nullable','string']
            ];
        }else {
            return [
                'name'=>['required','string'],
                'country_code'=>['required','max:5'],
                'about'=>['nullable','string'],
                'google_map'=>['nullable','regex:/^((?:https?\:\/\/|www\.)(?:[-a-z0-9]+\.)*[-a-z0-9]+.*)$/'],
                'flag_image'=>['required','image','mimes:png,jpg'],
                'city_images.0'=>['required','image','mimes:png,jpg'],
                'city_milestones'=>['nullable','string']
            ];
        }
        // return [
        //     'name'=>['required','string'],
        //     'country_code'=>['required','max:5'],
        //     'about'=>['nullable','string'],
        //     'google_map'=>['nullable','regex:/^((?:https?\:\/\/|www\.)(?:[-a-z0-9]+\.)*[-a-z0-9]+.*)$/'],
        //     'flag_image'=>['required','image','mimes:png,jpg'],
        //     'city_images.0'=>['required','image','mimes:png,jpg'],
        //     'city_milestones'=>['nullable','string']
        // ];
    }
}
