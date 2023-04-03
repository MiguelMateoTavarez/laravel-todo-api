<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TaskCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray($request)
    {
        return $this->collection->transform(function ($task) {
            return [
                'Id' => $task->id,
                'User' => $task->user->name,
                'Status' => $task->state->name,
                'Title' => $task->title,
                'Description' => $task->description,
                'Start' => $task->start_date,
                'End' => $task->end_date,
            ];
        })->toArray();
    }
}
