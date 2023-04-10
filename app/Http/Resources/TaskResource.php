<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'Id' => $this->id,
            'User' => $this->user->name,
            'Status' => $this->state->name,
            'Title' => $this->title,
            'Description' => $this->description,
            'Start' => $this->start_date,
            'End' => $this->end_date,
        ];
    }
}
