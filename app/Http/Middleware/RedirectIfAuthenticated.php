<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $currentRoute = $request->route()->getName();

        // Если пользователь не авторизован
        if (!auth()->check()) {
            // Разрешить доступ к странице логина
            if ($currentRoute === 'login') {
                return $next($request);
            }

            // Перенаправить неавторизованного пользователя на страницу логина
            return redirect()->route('login');
        }

        // Пользователь авторизован
        $user = auth()->user();

        // Если пользователь с ролью 'superadmin', пропускаем проверку ролей и разрешаем доступ к любой странице
        if ($user->role === 'superadmin') {
            return $next($request);
        }

        // Исключаем маршрут 'logout' из проверки ролей
        if ($currentRoute === 'logout') {
            return $next($request);
        }

        // Проверка роли пользователя и доступных маршрутов
        switch ($user->role) {
            case 'student':
                if (!str_starts_with($currentRoute, 'student.')) {
                    return redirect()->route('student.main');
                }
                break;
            case 'teacher':
                if (!str_starts_with($currentRoute, 'teacher.')) {
                    return redirect()->route('teacher.main');
                }
                break;
            case 'admin':
                if (!str_starts_with($currentRoute, 'admin.')) {
                    return redirect()->route('admin.main');
                }
                break;
            default:
                return redirect()->route('login');
        }

        return $next($request);
    }
}
