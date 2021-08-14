<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarouselRequest extends FormRequest
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
            $image = 'sometimes|image|max:5000|mimes:jpeg,jpg,bmp,png';
            $order = 'required|numeric|max:9|unique:carousel,order,'.$this->segment('2');
        } else {
            $image = 'required|image|max:5000|mimes:jpeg,jpg,bmp,png';
            $order = 'required|numeric|max:9|unique:carousel,order';
        }

        return [
          'title' => 'required|string',
          'description' => 'required|string',
          'url' => 'required|url',
          'order' => $order,
          'image' => $image,
        ];
    }
}
