<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
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
            $category_page = 'sometimes|numeric|unique:page,category_page'.$this->segment('2');
        } else {
            $category_page = 'required|numeric|unique:page,category_page';
        }

        return [
          'title' => 'required|string',
          'description' => 'required|string',
          'image' => 'sometimes|image|max:5000|mimes:jpeg,jpg,bmp,png',
          'category_page' => $category_page,
        ];
    }
}
