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
            'Id' => $task->id,
            'User' => $task->user->name,
            'Status' => $task->state->name,
            'Title' => $task->title,
            'Description' => $task->description,
            'Start' => $task->start_date,
            'End' => $task->end_date,
        ];
    }
}
