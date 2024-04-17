<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasUuids;

    protected $fillable = [
        'text',
        'task_list_id'
    ];

    public function taskList(): BelongsTo
    {
        return $this->belongsTo(TaskList::class);
    }
}
