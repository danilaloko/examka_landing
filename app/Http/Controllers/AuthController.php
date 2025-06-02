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
    public function showLoginForm(Request $request)
    {
        return view('auth.login');
    }

    /**
     * Перенаправление на Telegram OAuth
     */
    public function redirectToTelegram(): \Illuminate\Http\RedirectResponse
    {
        $redirectUrl = url('/auth/telegram/return');
        $telegramAuthUrl = $this->telegramAuthService->generateTelegramAuthUrl($redirectUrl);
        
        Log::info('Перенаправление на Telegram OAuth', ['url' => $telegramAuthUrl]);
        
        return redirect()->away($telegramAuthUrl);
    }

    /**
     * Обработка возврата с Telegram OAuth
     */
    public function handleTelegramReturn(Request $request): \Illuminate\Http\RedirectResponse
    {
        try {
            // Получаем данные из tgAuthResult параметра
            $tgAuthResult = $request->get('tgAuthResult');
            
            if (empty($tgAuthResult)) {
                Log::warning('Отсутствует параметр tgAuthResult');
                return redirect('/login')->with('error', 'Не получены данные авторизации от Telegram');
            }

            // Декодируем base64 → JSON
            $telegramDataJson = base64_decode($tgAuthResult);
            if (!$telegramDataJson) {
                Log::warning('Ошибка декодирования base64 tgAuthResult');
                return redirect('/login')->with('error', 'Неверный формат данных от Telegram');
            }

            // Парсим JSON
            $telegramData = json_decode($telegramDataJson, true);
            if (!$telegramData) {
                Log::warning('Ошибка парсинга JSON из tgAuthResult');
                return redirect('/login')->with('error', 'Неверный формат данных от Telegram');
            }
            
            Log::info('Получены данные от Telegram OAuth', $telegramData);

            // Проверяем подлинность данных
            if (!$this->telegramAuthService->verifyTelegramAuth($telegramData)) {
                Log::warning('Недействительные данные от Telegram OAuth');
                return redirect('/login')->with('error', 'Ошибка проверки подлинности данных Telegram');
            }

            // Находим или создаем пользователя
            $user = $this->telegramAuthService->findOrCreateUser($telegramData);

            // Авторизуем пользователя
            Auth::login($user, true);

            Log::info('Пользователь успешно авторизован через Telegram OAuth', [
                'user_id' => $user->id,
                'telegram_id' => $user->telegram_id
            ]);

            return redirect('/profile')->with('success', 'Добро пожаловать!');

        } catch (\Exception $e) {
            Log::error('Ошибка при обработке возврата с Telegram OAuth', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'request_data' => $request->all()
            ]);

            return redirect('/login')->with('error', 'Произошла ошибка при авторизации');
        }
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