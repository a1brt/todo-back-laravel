<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskListRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'tag'=> 'required|string',
            'title'=> 'required|string',
            'order_number' => 'required|integer'
        ];
    }
}
