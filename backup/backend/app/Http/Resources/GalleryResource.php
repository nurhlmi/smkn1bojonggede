<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GalleryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if($this->category == 'image') {
            $file = asset('images/gallery/'.$this->file);
        } else {
            $file = $this->file;
        }
        return [
            'code' => $this->id,
            'title' => $this->title,
            'file' => $file,
            'category' => $this->category,
            'created_at' => date_format($this->created_at, 'Y-m-d'),
        ];
    }
}
