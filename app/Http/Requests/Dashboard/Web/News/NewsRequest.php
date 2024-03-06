<?php

namespace App\Http\Requests\Dashboard\Web\News;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
                'news_images.0'=>['required'],
                'title'=>['required','string'],
                'description'=>['required','string'],
            ];
        }
        else{
            return [
                'news_images.0'=>['required'],
                'title'=>['required','string'],
                'description'=>['required','string'],
            ];
        }

    }
}
