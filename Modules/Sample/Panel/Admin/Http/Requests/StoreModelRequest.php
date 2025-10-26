<?php

namespace Modules\Sample\Panel\Admin\Http\Requests;


use App\Http\Requests\BaseFormRequest;

class StoreModelRequest extends BaseFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title'=>['required','string'],
            'value'=>['required','string']
        ];
    }
}
