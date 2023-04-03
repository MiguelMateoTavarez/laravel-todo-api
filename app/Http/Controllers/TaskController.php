<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use App\Services\TaskService;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    /**
     * Display a listing of the resource.
     */
    public function all()
    {
        return response()->json($this->taskService->all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
        $task = $this->taskService->store($request);

        return response()->json([
            'message' => 'Task saved successfully',
            'task' => [
                'Id' => $task->id,
                'User' => $task->user->name,
                'Status' => $task->state->name,
                'Title' => $task->title,
                'Description' => $task->description,
                'Start' => $task->start_date,
                'End' => $task->end_date,
            ]
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return response()->json(['task' => $this->taskService->show($task)], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, Task $task)
    {
        $this->taskService->update($request, $task);
        return response()->json(
            [
                'message' => 'Task updated successfully',
                'task' => $task
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $this->taskService->destroy($task);
        return response()->json(['message' => 'Task deleted succesfully'], 204);
    }
}