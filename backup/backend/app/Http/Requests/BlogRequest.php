<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        if($this->method() == 'PATCH') {
            $image = 'sometimes|image|max:2000|mimes:jpeg,jpg,bmp,png';
        } else {
            $image = 'required|image|max:2000|mimes:jpeg,jpg,bmp,png';
        }

        return [
          'title' => 'required|string',
          'sort_description' => 'required|string|max:200',
          'description' => 'required|string',
          'absolute_link' => 'nullable|url',
          'status' => 'nullable|in:on',
          'image' => $image,
        ];
    }
}
