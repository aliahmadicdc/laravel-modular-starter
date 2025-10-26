<?php

namespace Modules\Sample\Shared\Http\Resources;

use App\Http\Resources\BaseResource;
use Illuminate\Http\Request;

class GlobalModelResource extends BaseResource
{
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title,
            'value' => $this->value
        ];
    }
}
