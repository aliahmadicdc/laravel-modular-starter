<?php

namespace App\Services\Sms;

use App\Services\BaseGlobalService;

class SmsService extends BaseGlobalService
{
    private string $baseUrl = 'https://api.iranpayamak.com/ws/v1/sms/pattern';

    public function sendByPattern(string $to, array $data, string $pattern): bool|string
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->baseUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
    "code": ' . $this->getPattern($pattern) . ',
    "attributes":  ' . json_encode($data) . ',
    "recipient": ' . $to . ',
    "line_number": ' . env('SMS_SERVICE_FROM_NUMBER') . ',
    "number_format": "english",
}',
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'Api-Key: ' . env('SMS_SERVICE_API_KEY'),
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        return $response;
    }

    private function getPattern(string $key): string
    {
        $patterns = [
            'verification' => ''
        ];

        return $patterns[$key] ?? '';
    }
}
