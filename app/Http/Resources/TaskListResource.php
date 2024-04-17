<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskListResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'tag' => $this->tag,
            'title' => $this->title,
            'order_number' => $this->order_number,
            'tasks' => $this->retrieveTasks($this->tasks)
        ];
    }

    public function retrieveTasks($tasks): array
    {
        $data = [];

        $tasks->each(function ($task) use (&$data){
             $data[$task->id] = $task->text;
        });

        return $data;
    }

}
