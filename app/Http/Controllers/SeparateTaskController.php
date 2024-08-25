<?php

namespace App\Http\Controllers;

use App\Services\BegetAPIService;
use Illuminate\Http\Request;

class SeparateTaskController extends Controller
{
    protected $begetApiService;

    public function __construct(BegetAPIService $begetApiService)
    {
        $this->begetApiService = $begetApiService;
    }

    public function test()
    {
        return view('test');
    }
//    public function register()
//    {
//        $response = $this->begetApiService->getList();
//        return redirect()->back()->with('ss', json_encode($response));
//    }

    // Внутри контроллера

    public function register(Request $request)
    {
        // Логика регистрации пользователя

        $domainId = 11758069; // Пример domain_id
        $response = $this->begetApiService->createSubdomainAndDirectory('test', $domainId);

        if (isset($response['status']) && $response['status'] === 'success') {
            return redirect()->back()->with('success', 'Поддомен успешно создан!');
        } else {
            // Подробная информация об ошибке
            $errorMessage = 'Произошла ошибка при создании поддомена.';
            if (isset($response['error_text'])) {
                $errorMessage .= ' Причина: ' . $response['error_text'];
            }
            if (isset($response['response_status'])) {
                $errorMessage .= ' Статус ответа: ' . $response['response_status'];
            }
            if (isset($response['response_body'])) {
                $errorMessage .= ' Тело ответа: ' . $response['response_body'];
            }
            if (isset($response['request_params'])) {
                $errorMessage .= ' Параметры запроса: ' . json_encode($response['request_params']);
            }

            return redirect()->back()->with('error', $errorMessage);
        }
    }



//    public function register(Request $request)
//    {
//        // Логика регистрации пользователя
//
//        $subdomain = 'test';
//        $domain = 'https://it-cafe-kazan.ru/';
//        $homeDir = "/it_cafe_kazan/{$subdomain}";
//
//        // Вызываем API для создания поддомена
//        $response = $this->begetApiService->createSubdomain($subdomain, $domain, $homeDir);
//
//        if ($response['status'] === 'success') {
//            return redirect()->back()->with('success', 'Вы успешно зарегистрировались!');
//        } else {
//            $errorMessage = 'Произошла ошибка при создании поддомена.';
//            if (isset($response['error_text'])) {
//                $errorMessage .= ' Причина: ' . $response['error_text'];
//            } else {
//                $errorMessage .= ' Пожалуйста, попробуйте позже или обратитесь в службу поддержки.';
//            }
//
//            return redirect()->back()->with('error', $errorMessage);
//        }
//
//    }

}
