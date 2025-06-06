<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'telegram_id',
        'telegram_username',
        'telegram_first_name',
        'telegram_last_name',
        'telegram_photo_url',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'telegram_id' => 'integer',
        ];
    }

    /**
     * Получить полное имя пользователя
     */
    public function getFullNameAttribute(): string
    {
        if ($this->telegram_first_name || $this->telegram_last_name) {
            return trim($this->telegram_first_name . ' ' . $this->telegram_last_name);
        }
        
        return $this->name ?? 'Пользователь';
    }

    /**
     * Получить аватар пользователя
     */
    public function getAvatarUrlAttribute(): ?string
    {
        return $this->telegram_photo_url ?? $this->avatar;
    }

    /**
     * Проверить, зарегистрирован ли пользователь через Telegram
     */
    public function isTelegramUser(): bool
    {
        return !is_null($this->telegram_id);
    }
}
