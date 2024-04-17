<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BulkTaskListUpdateRequest;
use App\Http\Requests\StoreTaskListRequest;
use App\Http\Requests\UpdateTaskListRequest;
use App\Http\Resources\ListResource;
use App\Http\Resources\TaskListResource;
use App\Models\TaskList;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;

class TaskListController extends Controller
{

    public function index(): JsonResource
    {
        $taskList = TaskList::with('tasks')->orderBy('order_number')->get();

        return TaskListResource::collection($taskList);
    }


    public function store(StoreTaskListRequest $request): JsonResource
    {
        return ListResource::make(TaskList::create($request->validated()));
    }


    public function show(TaskList $taskList): JsonResource
    {
        return ListResource::make($taskList);
    }


    public function update(UpdateTaskListRequest $request, TaskList $taskList): JsonResource
    {
        $taskList->update($request->validated());

        return ListResource::make($taskList);
    }


    public function bulkUpdate(BulkTaskListUpdateRequest $request)
    {
        $data = $request->validated()["data"];
        foreach ($data as $list) {
            TaskList::whereId($list["id"])->update(['order_number' => $list["order_number"]]);
        }
    }

    public function destroy(TaskList $taskList): Response
    {
        $taskList->delete();

        return response()->noContent();
    }
}
