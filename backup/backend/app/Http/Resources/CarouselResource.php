<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CarouselResource extends JsonResource
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
            'image' => asset('images/carousel/'.$this->image),
            'title' => $this->title,
            'description' => $this->description,
            'redirect_url' => $this->url,
        ];
    }
}
