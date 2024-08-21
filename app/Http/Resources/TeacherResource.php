<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TeacherResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'class_room' => new ClassRoomResource($this->whenLoaded('classRoom')),
            'subjects' => SubjectResource::collection($this->whenLoaded('subjects')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
