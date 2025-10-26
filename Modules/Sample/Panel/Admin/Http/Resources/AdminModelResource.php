<?php

namespace Modules\Sample\Panel\Admin\Http\Resources;

use App\Http\Resources\BaseResource;
use Illuminate\Http\Request;

class AdminModelResource extends BaseResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'value' => $this->value,
            'updated_at' => $this->updated_at
        ];
    }
}
