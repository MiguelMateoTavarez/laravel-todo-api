<?php

namespace App\Services;

use App\Models\Task;
use App\Repositories\TaskRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TaskService
{

    protected $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function all()
    {
        return $this->taskRepository->all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($request)
    {
        return $this->taskRepository->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show($task)
    {
        return $this->taskRepository->show($task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($request, $task)
    {
        return $this->taskRepository->update($request, $task);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($task)
    {
        return $this->taskRepository->destroy($task);
    }

    /**
     * Restore the specified resource from trash.
     */
    public function restore($id)
    {
        if ($this->taskRepository->restore($id)) {
            return 'Task restored successfully';
        } else {
            return 'Something has happend';
        }
    }
}