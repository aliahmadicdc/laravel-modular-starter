<?php

namespace Modules\Sample\Shared\Policies;

use App\Models\User;
use App\Policies\BasePolicy;
use Modules\Sample\Shared\Models\Model;

class ModelPolicy extends BasePolicy
{
    public function __construct()
    {
    }

    public function frontIndex(User $user): bool
    {
        return true;
    }

    public function userIndex(User $user): bool
    {
        return true;
    }

    public function index(User $user): bool
    {
        return true;
    }

    public function store(User $user): bool
    {
        return true;
    }

    public function show(User $user, Model $model): bool
    {
        return $user->user_id === $model->user_id;
    }

    public function update(User $user, Model $model): bool
    {
        return $user->user_id === $model->user_id;
    }

    public function destroy(User $user, Model $model): bool
    {
        return $user->user_id === $model->user_id;
    }
}
