<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;

class TaskController extends Controller
{
    public function index(string $task_list_id): JsonResource
    {
        $tasks = Task::where('task_list_id', $task_list_id)->get();

        return TaskResource::collection($tasks);
    }

    public function store(StoreTaskRequest $request, string $task_list_id): JsonResource
    {
        $validated = $request->validated();

        return TaskResource::make(Task::create($validated + ['task_list_id' => $task_list_id]));
    }


    public function update(UpdateTaskRequest $request, int $task_list_id, Task $task): JsonResource
    {
        $task->update($request->validated());

        return TaskResource::make($task);
    }

    public function destroy(string $task_list_id, Task $task): Response
    {
        $task->delete();

        return response()->noContent();
    }
}
