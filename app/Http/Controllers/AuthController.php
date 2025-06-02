<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use App\Services\TelegramAuthService;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    private TelegramAuthService $telegramAuthService;

    public function __construct(TelegramAuthService $telegramAuthService)
    {
        $this->telegramAuthService = $telegramAuthService;
    }

    /**
     * Показать страницу авторизации
     */
    public function showLoginForm(): View
    {
        return view('auth.login');
    }

    /**
     * Обработка авторизации через Telegram (callback)
     */
    public function handleTelegramCallback(Request $request): JsonResponse
    {
        try {
            $telegramData = $request->all();
            
            Log::info('Получены данные от Telegram виджета', $telegramData);

            // Проверяем подлинность данных
            if (!$this->telegramAuthService->verifyTelegramAuth($telegramData)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Недействительные данные авторизации Telegram'
                ], 400);
            }

            // Находим или создаем пользователя
            $user = $this->telegramAuthService->findOrCreateUser($telegramData);

            // Авторизуем пользователя
            Auth::login($user, true);

            Log::info('Пользователь успешно авторизован через Telegram', [
                'user_id' => $user->id,
                'telegram_id' => $user->telegram_id
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Успешная авторизация через Telegram',
                'user' => $this->telegramAuthService->formatUserData($user),
                'redirect_url' => '/profile'
            ]);

        } catch (\Exception $e) {
            Log::error('Ошибка при авторизации через Telegram', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'request_data' => $request->all()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Произошла ошибка при авторизации. Попробуйте снова.'
            ], 500);
        }
    }

    /**
     * Обработка авторизации через email
     */
    public function loginWithEmail(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $email = $request->input('email');
        
        // Логика отправки магической ссылки на email
        // Здесь можно реализовать отправку email с токеном для входа
        
        return response()->json([
            'success' => true,
            'message' => 'Ссылка для входа отправлена на ' . $email,
            'email' => $email
        ]);
    }

    /**
     * Выход из системы
     */
    public function logout(Request $request): \Illuminate\Http\RedirectResponse
    {
        // Логика выхода из системы
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/')->with('message', 'Вы успешно вышли из системы');
    }
} 