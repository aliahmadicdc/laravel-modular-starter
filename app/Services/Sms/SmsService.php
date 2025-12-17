<?php

namespace App\Services\Sms;

use App\Enums\Http\HttpRequestTypeEnum;
use App\Enums\Sms\SmsPatternCodeEnum;
use App\Services\BaseGlobalService;
use App\Services\Http\HttpService;

class SmsService extends BaseGlobalService
{
    private HttpService $httpService;
    private string $baseUrl = 'https://api.iranpayamak.com/ws/v1/sms/pattern';

    public function __construct()
    {
        $this->httpService = new HttpService();
    }

    public function sendByPattern(string $to, array $data, SmsPatternCodeEnum $patternCode): array
    {
        $params = [
            'code' => $this->getPattern($patternCode),
            'attributes' => $data,
            'recipient' => $to,
            'line_number' => env('SMS_SERVICE_FROM_NUMBER'),
            'number_format' => 'english',
        ];

        return $this->httpService->sendRequest(
            $this->baseUrl,
            HttpRequestTypeEnum::POST,
            $params,
            true,
            ['Api-Key' => env('SMS_SERVICE_API_KEY')]
        );
    }

    private function getPattern(SmsPatternCodeEnum $patternCode): string
    {
        $patterns = [
            SmsPatternCodeEnum::VERIFICATION->value => ''
        ];

        return $patterns[$patternCode->value] ?? '';
    }
}
