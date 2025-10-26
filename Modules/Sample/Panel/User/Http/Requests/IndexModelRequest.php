<?php

namespace Modules\Sample\Panel\User\Http\Requests;


use App\Http\Requests\BaseFormRequest;

class IndexModelRequest extends BaseFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'page' => ['nullable', 'numeric'],
            'title' => ['nullable', 'string'],
            'value' => ['nullable', 'string']
        ];
    }
}
