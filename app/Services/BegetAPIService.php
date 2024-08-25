<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class BegetAPIService
{
    protected $apiLogin;
    protected $apiPassword;

    public function __construct()
    {
        $this->apiLogin = config('services.beget.login');
        $this->apiPassword = config('services.beget.password');
    }

    public function createSubdomain($subdomain, $domain, $homeDir)
    {
        $apiUrl = 'https://api.beget.com/api/domain/addSubdomainVirtual';
        $params = [
            'login' => 'k1z1nksb',
            'passwd' => 'VKs-7nN-iKr-qM9',
            'subdomain' => $subdomain,
            'domain' => $domain,
            'home_dir' => $homeDir,
        ];

        $response = Http::get($apiUrl, $params);

        if ($response->ok()) {
            return $response->json();
        } else {
            Log::error('Beget API error:', [
                'response' => $response->body(),
                'params' => $params
            ]);
            return [
                'status' => 'error',
                'error_text' => 'Ошибка при подключении к API Beget.',
            ];
        }

    }
    public function createSubdomainAndDirectory($subdomain, $domainId)
    {
        $response = $this->Subdomain($subdomain, $domainId);

        if ($response['status'] === 'success') {
            $homeDir = "/home/k/k1z1nksb/{$subdomain}";

            // Создать директорию
            if (!file_exists($homeDir)) {
                mkdir($homeDir, 0777, true);
            }

            return ['status' => 'success', 'message' => 'Поддомен и директория успешно созданы.'];
        } else {
            return ['status' => 'error', 'message' => 'Ошибка создания поддомена: ' . $response['error_text']];
        }
    }

    public function subdomain($subdomain, $domainId)
    {
        $apiUrl = 'https://api.beget.com/api/domain/addSubdomainVirtual';
        $params = [
            'login' => env('BEGET_API_LOGIN'),
            'passwd' => env('BEGET_API_PASSWORD'),
            'input_format' => 'json',
            'output_format' => 'json',
            'input_data' => json_encode([
                'subdomain' => $subdomain,
                'domain_id' => $domainId,
            ]),
        ];

        $response = Http::get($apiUrl, $params);

        if ($response->ok()) {
            return $response->json();
        } else {
            return [
                'status' => 'error',
                'error_text' => 'Ошибка при подключении к API Beget.',
            ];
        }
    }

    public function getList()
    {
        $apiUrl = 'https://api.beget.com/api/domain/getSubdomainList';
        $params = [
            'login' => env('BEGET_API_LOGIN'),
            'passwd' => env('BEGET_API_PASSWORD'),
        ];

        $response = Http::get($apiUrl, $params);

        if ($response->ok()) {
            return $response->json();
        } else {
            return [
                'status' => 'error',
                'error_text' => 'Ошибка при подключении к API Beget.',
                'details' => $response->body(),
            ];
        }
    }


}
