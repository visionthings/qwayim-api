<?php

namespace App\Http\Requests\Dashboard\Web\Place;

use Illuminate\Foundation\Http\FormRequest;

class PlaceRequest extends FormRequest
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
        $id = request()->route('id');
        if($id){
            return [
                'images.0'=>['required', 'image','mimes:png,jpg'],
                'name'=>['required','string'],
                'category_id'=>['required','exists:categories,id'],
                'google_map'=>['nullable','regex:/^((?:https?\:\/\/|www\.)(?:[-a-z0-9]+\.)*[-a-z0-9]+.*)$/'],
                'description'=>['required','string'],
                'nearest_airport'=>['nullable','string'],
                'distance'=>['nullable','integer'],
                'phone'=>['required'],
                'email'=>['nullable','nullable'],
                'website'=>['nullable','regex:/^((?:https?\:\/\/|www\.)(?:[-a-z0-9]+\.)*[-a-z0-9]+.*)$/'],
                'facebook'=>['nullable','regex:/^((?:https?\:\/\/|www\.)(?:[-a-z0-9]+\.)*[-a-z0-9]+.*)$/'],
                'instagram'=>['nullable','regex:/^((?:https?\:\/\/|www\.)(?:[-a-z0-9]+\.)*[-a-z0-9]+.*)$/'],
                'snapchat'=>['nullable','regex:/^((?:https?\:\/\/|www\.)(?:[-a-z0-9]+\.)*[-a-z0-9]+.*)$/'],
            ];
        }else{
            return [
                'images.0'=>['required', 'image','mimes:png,jpg'],
                'name'=>['required','string'],
                'category_id'=>['required','exists:categories,id'],
                'google_map'=>['nullable','regex:/^((?:https?\:\/\/|www\.)(?:[-a-z0-9]+\.)*[-a-z0-9]+.*)$/'],
                'description'=>['required','string'],
                'nearest_airport'=>['nullable','string'],
                'distance'=>['nullable','integer'],

                'phone'=>['required'],
                'email'=>['nullable','nullable'],
                'website'=>['nullable','regex:/^((?:https?\:\/\/|www\.)(?:[-a-z0-9]+\.)*[-a-z0-9]+.*)$/'],
                'facebook'=>['nullable','regex:/^((?:https?\:\/\/|www\.)(?:[-a-z0-9]+\.)*[-a-z0-9]+.*)$/'],
                'instagram'=>['nullable','regex:/^((?:https?\:\/\/|www\.)(?:[-a-z0-9]+\.)*[-a-z0-9]+.*)$/'],
                'snapchat'=>['nullable','regex:/^((?:https?\:\/\/|www\.)(?:[-a-z0-9]+\.)*[-a-z0-9]+.*)$/'],
            ];
        }

    }
}
