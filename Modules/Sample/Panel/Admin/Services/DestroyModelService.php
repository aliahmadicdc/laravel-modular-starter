<?php

namespace Modules\Sample\Panel\Admin\Services;

use App\Services\BaseService;
use Modules\Sample\Shared\Models\Model;

class DestroyModelService extends BaseService
{
    public function destroy(Model $model): bool
    {
        return $model->query()->delete();
    }
}
