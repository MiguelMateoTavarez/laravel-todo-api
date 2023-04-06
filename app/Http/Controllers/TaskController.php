<?php

namespace App\Http\Controllers;

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
        $result = $this->taskService->all();

        return 
            is_string($result) ? 
            response()->json(['message' => $result], 403) :
            response()->json($this->taskService->all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->taskService->store($request);

        return response()->json(['message' => 'Task saved successfully'], 201);
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
    public function update(Request $request, Task $task)
    {
        $this->taskService->update($request, $task);
        return response()->json(
            [
                'message' => 'Task updated successfully',
                'task' => new TaskResource($task)
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $this->taskService->destroy($task);
        return response()->json([''], 204);
    }

    /**
     * Restore the specified resource from trash.
     */
    public function restore($id)
    {
        return response()->json(['message' => $this->taskService->restore($id)], 200);
    }
}