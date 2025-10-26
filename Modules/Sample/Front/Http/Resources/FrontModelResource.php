<?php

namespace Modules\Sample\Front\Http\Resources;

use App\Http\Resources\BaseResource;
use Illuminate\Http\Request;

class FrontModelResource extends BaseResource
{
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title,
            'value' => $this->value
        ];
    }
}
