<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

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
            "grade_title" =>  $this->getGrade->title,
            "grade" => new GradeResource($this->getGrade),
            "subject_title" =>  $this->getSubject->title,
            "subject" => new SubjectResource($this->getSubject),
            "title" => $this->title,
            "excerpt_title" => Str::substrReplace($this->title,'...',25),
            "description" => $this->description,
            "excerpt_description" => Str::substrReplace($this->description,'...',50),
            "date" => $this->created_at->format("d M Y"),
            "time" => $this->created_at->format("h:i A"),
            "uploader" => new UserResource($this->getUser),
            "photos" => PhotoResource::collection($this->getLessonImages),
            "headerImage" => $this->header_image,
        ];
    }
}
