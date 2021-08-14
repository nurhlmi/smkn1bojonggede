<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
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
        } else {
            $image = 'required|image|max:5000|mimes:jpeg,jpg,bmp,png';
        }

        return [
          'name' => 'required|string',
          'position' => 'required|string',
          'description' => 'nullable|string',
          'image' => $image,
        ];
    }
}
