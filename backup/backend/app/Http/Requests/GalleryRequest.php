<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GalleryRequest extends FormRequest
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
        $file = '';
        if($this->method() == 'PATCH') {
            if(\Request::instance()->category == 'video') {
                $file = 'sometimes|url';
            } else if(\Request::instance()->category == 'image') {
                $file = 'sometimes|image|max:5000|mimes:jpeg,jpg,bmp,png';
            }
        } else {
            if(\Request::instance()->category == 'video') {
                $file = 'required|url';
            } else if(\Request::instance()->category == 'image') {
                $file = 'required|image|max:5000|mimes:jpeg,jpg,bmp,png';
            }
        }

        return [
          'category' => 'required|in:video,image',
          'file' => $file,
          'title' => 'required|string',
        ];
    }
}
