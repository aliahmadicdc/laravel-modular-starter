<?php

namespace App\Services\Http;

use App\Enums\Http\HttpRequestTypeEnum;
use App\Services\BaseService;
use Illuminate\Support\Facades\Http;

class HttpService extends BaseService
{
    public function sendRequest(
        string              $url,
        HttpRequestTypeEnum $requestType,
        array               $params = [],
        bool                $isJsonRequest = false,
        array               $customHeaders = [],
        array               $basicAuth = []
    ): array
    {
        $client = Http::withOptions(['allow_redirects' => true])->timeout(60)
            ->retry(2);

        if (!empty($customHeaders))
            $client->withHeaders($customHeaders);

        if (!empty($basicAuth) && count($basicAuth) > 1)
            $client->withBasicAuth($basicAuth[0], $basicAuth[1]);

        try {
            $response = match ($requestType) {
                HttpRequestTypeEnum::POST => $isJsonRequest
                    ? $client->post($url, $params)
                    : $client->asForm()->post($url, $params),
                HttpRequestTypeEnum::PUT => $isJsonRequest
                    ? $client->put($url, $params)
                    : $client->asForm()->put($url, $params),
                HttpRequestTypeEnum::DELETE => $client->delete($url, $params),
                default => $client->get($url, $params)
            };

            return [
                'result' => true,
                'status' => $response->status(),
                'data' => json_decode($response->body(), true)
            ];
        } catch (\Exception $exception) {
            return [
                'result' => false,
                'status' => 500,
                'data' => $exception->getMessage()
            ];
        }
    }
}
