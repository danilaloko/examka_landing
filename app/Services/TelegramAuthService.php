<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Log;

class TelegramAuthService
{
    private string $botToken;

    public function __construct()
    {
        // Получаем токен бота из конфига или переменных окружения
        $this->botToken = config('services.telegram.bot_token', env('TELEGRAM_BOT_TOKEN', ''));
    }

    /**
     * Проверяет подлинность данных авторизации от Telegram
     */
    public function verifyTelegramAuth(array $authData): bool
    {
        if (empty($this->botToken)) {
            Log::error('Telegram bot token не настроен');
            return false;
        }

        // Проверяем наличие обязательных полей
        if (!isset($authData['id'], $authData['auth_date'], $authData['hash'])) {
            Log::warning('Отсутствуют обязательные поля в данных Telegram', $authData);
            return false;
        }

        // Проверяем время авторизации (не более 24 часов)
        $authDate = (int) $authData['auth_date'];
        if (time() - $authDate > 86400) {
            Log::warning('Данные авторизации Telegram устарели', ['auth_date' => $authDate]);
            return false;
        }

        // Создаем data-check-string
        $checkHash = $authData['hash'];
        unset($authData['hash']);

        $dataCheckArr = [];
        foreach ($authData as $key => $value) {
            if ($value !== null && $value !== '') {
                $dataCheckArr[] = $key . '=' . $value;
            }
        }
        
        sort($dataCheckArr);
        $dataCheckString = implode("\n", $dataCheckArr);

        // Создаем секретный ключ из токена бота
        $secretKey = hash('sha256', $this->botToken, true);

        // Проверяем HMAC подпись
        $hash = hash_hmac('sha256', $dataCheckString, $secretKey);

        if (!hash_equals($hash, $checkHash)) {
            Log::warning('Неверная подпись HMAC для данных Telegram', [
                'expected' => $hash,
                'received' => $checkHash,
                'data_check_string' => $dataCheckString
            ]);
            return false;
        }

        return true;
    }

    /**
     * Находит или создает пользователя на основе данных Telegram
     */
    public function findOrCreateUser(array $telegramData): User
    {
        $telegramId = $telegramData['id'];

        // Ищем пользователя по Telegram ID
        $user = User::where('telegram_id', $telegramId)->first();

        if ($user) {
            // Обновляем данные пользователя
            $user->update([
                'telegram_username' => $telegramData['username'] ?? null,
                'telegram_first_name' => $telegramData['first_name'] ?? null,
                'telegram_last_name' => $telegramData['last_name'] ?? null,
                'telegram_photo_url' => $telegramData['photo_url'] ?? null,
            ]);

            Log::info('Пользователь Telegram авторизован', ['user_id' => $user->id, 'telegram_id' => $telegramId]);
        } else {
            // Создаем нового пользователя
            $user = User::create([
                'telegram_id' => $telegramId,
                'telegram_username' => $telegramData['username'] ?? null,
                'telegram_first_name' => $telegramData['first_name'] ?? null,
                'telegram_last_name' => $telegramData['last_name'] ?? null,
                'telegram_photo_url' => $telegramData['photo_url'] ?? null,
                'name' => trim(($telegramData['first_name'] ?? '') . ' ' . ($telegramData['last_name'] ?? '')),
            ]);

            Log::info('Создан новый пользователь через Telegram', ['user_id' => $user->id, 'telegram_id' => $telegramId]);
        }

        return $user;
    }

    /**
     * Генерирует URL для Telegram OAuth авторизации
     */
    public function generateTelegramAuthUrl(string $redirectUrl): string
    {
        $botId = config('services.telegram.bot_id');
        
        if (empty($botId)) {
            throw new \Exception('TELEGRAM_BOT_ID не настроен');
        }
        
        $params = [
            'bot_id' => $botId,
            'origin' => url('/'),
            'request_access' => 'write',
            'return_to' => $redirectUrl
        ];
        
        return 'https://oauth.telegram.org/auth?' . http_build_query($params);
    }

    /**
     * Форматирует данные пользователя для ответа
     */
    public function formatUserData(User $user): array
    {
        return [
            'id' => $user->id,
            'name' => $user->full_name,
            'telegram_id' => $user->telegram_id,
            'telegram_username' => $user->telegram_username,
            'avatar_url' => $user->avatar_url,
            'is_telegram_user' => $user->isTelegramUser(),
        ];
    }
} 