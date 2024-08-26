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
        $apiUrl = 'https://api.beget.com/api/domain/getList';
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

    public function getSubdomainList()
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


    public function getSiteList()
    {
        $apiUrl = 'https://api.beget.com/api/site/getList';
        $params = [
            'login' => $this->apiLogin,
            'passwd' => $this->apiPassword,
            'input_format' => 'json',
            'output_format' => 'json',
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

    public function createSite($siteName)
    {
        $apiUrlCreate = 'https://api.beget.com/api/site/add';

        $inputData = ['name' => $siteName];

        $params = [
            'login' => $this->apiLogin,
            'passwd' => $this->apiPassword,
            'input_format' => 'json',
            'output_format' => 'json',
            'input_data' => json_encode($inputData),
        ];

        // Создаем сайт
        $responseCreate = Http::get($apiUrlCreate, $params);

        if ($responseCreate->ok() && isset($responseCreate->json()['answer']['status']) && $responseCreate->json()['answer']['status'] === 'success') {
            return ['status' => 'success'];
        } else {
            return [
                'status' => 'error',
                'error_text' => 'Ошибка при создании сайта. Ответ API: ' . json_encode($responseCreate->json())
            ];
        }
    }

    // Метод для получения списка сайтов
    public function getSites()
    {
        $apiUrl = 'https://api.beget.com/api/site/getList';

        $params = [
            'login' => $this->apiLogin,
            'passwd' => $this->apiPassword,
            'input_format' => 'json',
            'output_format' => 'json',
            'input_data' => json_encode([]),
        ];

        $response = Http::get($apiUrl, $params);

        if ($response->ok()) {
            return $response->json();
        } else {
            return [
                'status' => 'error',
                'error_text' => 'Ошибка при получении списка сайтов. Ответ API: ' . json_encode($response->json())
            ];
        }
    }

    // Метод для удаления сайта по ID
    public function deleteSiteById($siteId)
    {
        $apiUrlDelete = 'https://api.beget.com/api/site/delete';

        $params = [
            'login' => $this->apiLogin,
            'passwd' => $this->apiPassword,
            'input_format' => 'json',
            'output_format' => 'json',
            'input_data' => json_encode(['id' => $siteId]),
        ];

        $responseDelete = Http::get($apiUrlDelete, $params);

        if ($responseDelete->ok() && isset($responseDelete->json()['answer']['status']) && $responseDelete->json()['answer']['status'] === 'success') {
            return ['status' => 'success'];
        } else {
            return [
                'status' => 'error',
                'error_text' => 'Ошибка при удалении сайта. Ответ API: ' . json_encode($responseDelete->json())
            ];
        }
    }

    // Метод для создания FTP-аккаунта
    public function createFtpAccount($username, $password, $homeDir)
    {
        $apiUrl = 'https://api.beget.com/api/ftp/add';

        $inputData = [
            'suffix' => $username,
            'homedir' => $homeDir,
            'password' => $password,
        ];

        $params = [
            'login' => $this->apiLogin,
            'passwd' => $this->apiPassword,
            'input_format' => 'json',
            'output_format' => 'json',
            'input_data' => json_encode($inputData),
        ];

        $response = Http::get($apiUrl, $params);

        if ($response->ok() && isset($response->json()['answer']['status']) && $response->json()['answer']['status'] === 'success') {
            return [
                'status' => 'success',
                'message' => 'FTP-аккаунт успешно создан.',
                'ftp_details' => $response->json() // Возвращаем детали ответа, если нужно
            ];
        } else {
            return [
                'status' => 'error',
                'error_text' => 'Ошибка при создании FTP-аккаунта. Ответ API: ' . json_encode($response->json())
            ];
        }
    }

    // Основной метод для создания и удаления сайта
    public function createAndDeleteSite($siteName)
    {
        // Создание сайта
        $createResponse = $this->createSite($siteName);

        if ($createResponse['status'] === 'success') {
            // Получение списка сайтов
            $siteListResponse = $this->getSites();

            if (isset($siteListResponse['answer']['result'])) {
                $sites = $siteListResponse['answer']['result'];
                foreach ($sites as $site) {
                    if ($site['path'] === "{$siteName}/public_html") {
                        $siteId = $site['id'];

                        // Удаление сайта по ID
                        $deleteResponse = $this->deleteSiteById($siteId);

                        if ($deleteResponse['status'] === 'success') {
                            $array = explode('-', $siteName);
                            $siteBaseName = reset($array);
                            $array1 = explode('.', $siteBaseName);
                            $siteBaseName = reset($array1);

                            // Создание FTP-аккаунта
                            $ftpUsername = $siteBaseName;
                            $ftpPassword = 'NiYaZ102938ZcBm!';  // Генерируем случайный пароль
                            $ftpHomeDir = "/{$siteName}";

                            // Возвращаем результат создания FTP-аккаунта
                            return $this->createFtpAccount($ftpUsername, $ftpPassword, $ftpHomeDir);
                        } else {
                            return $deleteResponse;  // Возвращаем ошибку удаления
                        }
                    }
                }
            }

            return [
                'status' => 'error',
                'error_text' => 'Не удалось найти сайт после создания для удаления. Ответ API: ' . json_encode($siteListResponse)
            ];
        } else {
            return $createResponse;
        }
    }
}
