<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Показать страницу авторизации
     */
    public function showLoginForm(): View
    {
        return view('auth.login');
    }

    /**
     * Обработка авторизации через Telegram
     */
    public function loginWithTelegram(Request $request)
    {
        // Логика авторизации через Telegram
        // Здесь можно реализовать интеграцию с Telegram Bot API
        
        return response()->json([
            'success' => true,
            'message' => 'Успешная авторизация через Telegram',
            'redirect_url' => '/'
        ]);
    }

    /**
     * Обработка авторизации через email
     */
    public function loginWithEmail(Request $request)
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
    public function logout(Request $request)
    {
        // Логика выхода из системы
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/')->with('message', 'Вы успешно вышли из системы');
    }
} 