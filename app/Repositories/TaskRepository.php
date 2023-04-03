<?php

namespace App\Repositories;

use App\Http\Resources\TaskCollection;
use App\Http\Resources\TaskResource;
use App\Interfaces\TaskInterface;
use App\Models\Task;

class TaskRepository implements TaskInterface
{
    /**
     * Display a listing of the resource.
     */
    public function all()
    {
        return new TaskCollection(Task::with(['user', 'state'])->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($request)
    {
        return new TaskResource(Task::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show($task)
    {
        return Task::find($task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($request, $task)
    {
        return $task->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($task)
    {
        return $task->delete();
    }
}