<?php

namespace Modules\Sample\Panel\User\Http\Resources;

use App\Http\Resources\BaseResource;
use Illuminate\Http\Request;

class UserModelResource extends BaseResource
{
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title,
            'value' => $this->value,
            'updated_at' => $this->updated_at
        ];
    }
}
