<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            "title" => $this->name,
            "email" => $this->email,
            "user_image" => $this->user_image,
            "role" => $this->role,
            "isBaned" => $this->isBaned,
            "bio" => $this->bio,
        ];
    }
}
