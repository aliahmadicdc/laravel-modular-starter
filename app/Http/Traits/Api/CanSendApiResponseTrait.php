<?php

namespace App\Http\Traits\Api;

use Illuminate\Http\JsonResponse;

trait CanSendApiResponseTrait
{
    protected function sendApiSuccessResponse(array|null $data = null, string|null $message = null, int $status = 200): JsonResponse
    {
        return response()->json(
            [
                'result' => true,
                'message' => $message ?? trans('messages.api.success'),
                'data' => $data
            ],
            $status,
            ['X-Robots-Tag' => 'noindex, nofollow']
        );
    }

    protected function sendApiErrorResponse(array|null $data = null, string|null $message = null, int $status = 500): JsonResponse
    {
        return response()->json(
            [
                'result' => false,
                'message' => $message ?? trans('messages.api.error'),
                'data' => $data
            ],
            $status,
            ['X-Robots-Tag' => 'noindex, nofollow']
        );
    }
}
