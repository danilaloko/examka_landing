# Настройка авторизации через Telegram

## Предварительные требования

1. Telegram бот должен быть создан через @BotFather
2. Домен должен быть привязан к боту командой `/setdomain` в @BotFather

## Настройка

### 1. Получение токена бота

1. Откройте Telegram и найдите @BotFather
2. Отправьте команду `/mybots`
3. Выберите вашего бота `examka_bot`
4. Нажмите "API Token" и скопируйте токен

### 2. Привязка домена

1. В @BotFather отправьте команду `/setdomain`
2. Выберите бота `examka_bot`
3. Введите ваш домен (например: `example.com`)

### 3. Конфигурация Laravel

Добавьте токен бота в файл `.env`:

```env
TELEGRAM_BOT_TOKEN=your_telegram_bot_token_here
```

### 4. Обновление виджета

В файле `resources/views/auth/login.blade.php` убедитесь, что виджет использует правильное имя бота:

```html
<script async src="https://telegram.org/js/telegram-widget.js?22" 
        data-telegram-login="examka_bot" 
        data-size="large" 
        data-userpic="false" 
        data-onauth="onTelegramAuth(user)" 
        data-request-access="write">
</script>
```

## Как это работает

1. Пользователь нажимает на кнопку "Log in with Telegram"
2. Telegram отправляет данные пользователя в callback функцию `onTelegramAuth(user)`
3. JavaScript отправляет эти данные на `/auth/telegram/callback`
4. Сервер проверяет подлинность данных с помощью HMAC-SHA256
5. Пользователь создается или обновляется в базе данных
6. Пользователь автоматически авторизуется в системе

## Структура базы данных

Добавлены следующие поля в таблицу `users`:

- `telegram_id` - уникальный ID пользователя в Telegram
- `telegram_username` - имя пользователя в Telegram (без @)
- `telegram_first_name` - имя пользователя
- `telegram_last_name` - фамилия пользователя  
- `telegram_photo_url` - URL аватара пользователя
- `avatar` - дополнительное поле для аватара

## Безопасность

- Все данные от Telegram проверяются с помощью HMAC-SHA256 подписи
- Проверяется время авторизации (не более 24 часов)
- Логируются все действия для отладки
- Токен бота хранится в переменных окружения

## Отладка

Логи можно посмотреть в `storage/logs/laravel.log`:

```bash
tail -f storage/logs/laravel.log | grep Telegram
``` 