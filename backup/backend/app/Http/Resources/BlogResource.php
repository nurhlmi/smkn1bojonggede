<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'code' => $this->blog_slug,
            // 'code' => $this->id,
            'title' => $this->title,
            'sort_description' => $this->sort_description,
            'description' => $this->description,
            'image' => asset('images/blog/'.$this->image),
            'image_description' => $this->image_description,
            'created_at' => date('d-m-Y', strtotime($this->created_at)),
        ];
    }
}
