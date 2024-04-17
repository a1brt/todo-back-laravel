<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskListRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'tag'=> 'string',
            'title'=> 'string',
            'order_number' => 'integer'
        ];
    }
}
