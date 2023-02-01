<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SubjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "grade_id" => $this->grade->id,
            "grade" => $this->grade->title,
            "title" => $this->title,
            "slug" => $this->slug,
            "date" => $this->created_at->format("d M Y"),
            "time" => $this->created_at->format("h:i A"),
        ];
    }
}
