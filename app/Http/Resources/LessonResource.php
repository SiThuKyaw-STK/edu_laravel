<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LessonResource extends JsonResource
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
            "grade" => $this->getGrade->title,
            "subject" => $this->getSubject->title,
            "title" => $this->title,
            "description" => $this->description,
            "date" => $this->created_at->format("d M Y"),
            "time" => $this->created_at->format("h:i A"),
            "uploader" => new Userresource($this->getUser),
            "photos" => PhotoResource::collection($this->getLessonImages),
        ];
    }
}
