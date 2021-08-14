<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TeacherResource extends JsonResource
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
            'image' => asset('images/teacher/'.$this->image),
            'name' => $this->name,
            'position' => $this->position,
            'description' => $this->description,
        ];
    }
}
