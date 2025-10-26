<?php

namespace Modules\Sample\Panel\Admin\Services;

use App\Services\BaseService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Modules\Sample\Shared\Models\Model;

class IndexModelService extends BaseService
{
    public function index(array $data): LengthAwarePaginator
    {
        $models = Model::query()
            ->orderBy('id', 'DESC');

        if (!empty($data['title']))
            $models->where('title', 'LIKE', '%' . $data['title'] . '%');

        if (!empty($data['value']))
            $models->where('value', 'LIKE', '%' . $data['value'] . '%');

        return $models->paginate(PAGINATE_PER_PAGE, ['*'], 'page', $data['page'] ?? 1);

    }
}
