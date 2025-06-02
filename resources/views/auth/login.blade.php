<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация - Экзамка</title>
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
<nav class="nav">
    <div class="container nav-content-centered">
        <div class="logo">
            <a href="/" style="text-decoration: none; color: inherit;">Экзамка</a>
        </div>
    </div>
</nav>

<section class="auth-section">
    <div class="container">
        <div class="auth-content">
            <h1 class="auth-title">Авторизация</h1>
            
            <!-- Основной блок авторизации -->
            <div class="auth-form" id="main-auth-form">
                <div class="auth-buttons">
                    <button class="auth-btn auth-btn-telegram" onclick="loginWithTelegram()">
                        <svg class="auth-btn-icon" width="24" height="24" fill="currentColor" viewBox="0 0 496 512">
                            <path d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm121.8 169.9l-40.7 191.8c-3 13.6-11.1 16.9-22.4 10.5l-62-45.7-29.9 28.8c-3.3 3.3-6.1 6.1-12.5 6.1l4.4-63.1 114.9-103.8c5-4.4-1.1-6.9-7.7-2.5l-142 89.4-61.2-19.1c-13.3-4.2-13.6-13.3 2.8-19.7l239.1-92.2c11.1-4 20.8 2.7 17.2 19.5z"/>
                        </svg>
                        <span>Войти через Telegram</span>
                    </button>
                    
                    <div class="auth-divider">
                        <span>или</span>
                    </div>
                    
                    <button class="auth-btn auth-btn-email" onclick="showEmailForm()">
                        <svg class="auth-btn-icon" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.89 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                        </svg>
                        <span>Войти через почту</span>
                    </button>
                </div>
                
                <div class="auth-info">
                    <p>Впервые в Экзамке? При входе автоматически создается аккаунт</p>
                </div>
            </div>

            <!-- Блок авторизации через email -->
            <div class="auth-form email-auth-form" id="email-auth-form" style="display: none;">
                <form class="email-auth-form-content" onsubmit="handleEmailAuth(event)">
                    <div class="email-input-group">
                        <label for="email-input" class="email-label">Email</label>
                        <input 
                            type="email" 
                            id="email-input" 
                            class="email-input-field" 
                            placeholder="ваш@email.com" 
                            required
                        >
                    </div>

                    <div class="checkboxes-group">
                        <div class="checkbox-item">
                            <input type="checkbox" id="terms-agreement" class="checkbox-input" required>
                            <label for="terms-agreement" class="checkbox-label">
                                Я соглашаюсь с <a href="#" class="terms-link">правилами использования</a>
                            </label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" id="newsletter-consent" class="checkbox-input">
                            <label for="newsletter-consent" class="checkbox-label">
                                Согласен на получение рассылки
                            </label>
                        </div>
                    </div>

                    <div class="email-auth-buttons">
                        <button type="submit" class="auth-btn auth-btn-submit">
                            Авторизоваться
                        </button>
                        <button type="button" class="auth-btn auth-btn-back" onclick="showMainForm()">
                            Назад
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<footer class="footer">
    <div class="footer-content">
        <div class="footer-brand">
            <div class="logo">Экзамка</div>
            <p>
                AI-помощник для студентов. 
                Мы помогаем учиться эффективнее и сдавать экзамены легче.
            </p>
            <div class="social-links">
                <a href="#" class="social-button" title="Telegram">
                    <svg width="24" height="24" fill="currentColor" viewBox="0 0 496 512">
                        <path d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm121.8 169.9l-40.7 191.8c-3 13.6-11.1 16.9-22.4 10.5l-62-45.7-29.9 28.8c-3.3 3.3-6.1 6.1-12.5 6.1l4.4-63.1 114.9-103.8c5-4.4-1.1-6.9-7.7-2.5l-142 89.4-61.2-19.1c-13.3-4.2-13.6-13.3 2.8-19.7l239.1-92.2c11.1-4 20.8 2.7 17.2 19.5z"/>
                    </svg>
                    Наш Telegram бот
                </a>
            </div>
        </div>

        <div class="footer-links">
            <h4>Информация</h4>
            <ul>
                <li><a href="#">О нас</a></li>
                <li><a href="#">Связаться с нами</a></li>
                <li><a href="#">Политика конфиденциальности</a></li>
                <li><a href="#">Условия использования</a></li>
            </ul>
        </div>
    </div>

    <div class="footer-bottom">
        <p>&copy; 2025 Экзамка. Все права защищены.</p>
    </div>
</footer>

<script>
// Простая redirect авторизация через Telegram
function loginWithTelegram() {
    const button = document.querySelector('.auth-btn-telegram');
    setButtonLoading(button, true);
    
    // Перенаправляем на Telegram OAuth URL  
    window.location.href = '/auth/telegram/redirect';
}

// Callback функция для Telegram авторизации (оставляем для совместимости)
async function onTelegramAuth(user) {
    console.log('Получены данные от Telegram:', user);
    
    try {
        const response = await fetch('/auth/telegram/callback', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify(user)
        });
        
        const data = await response.json();
        
        if (data.success) {
            setTimeout(() => {
                window.location.href = data.redirect_url || '/profile';
            }, 500);
        } else {
            alert(data.message || 'Ошибка авторизации через Telegram');
        }
    } catch (error) {
        console.error('Ошибка авторизации через Telegram:', error);
        alert('Произошла ошибка. Попробуйте снова.');
    }
}

async function loginWithEmail() {
    const email = prompt('Введите ваш email:');
    if (!email) return;
    
    // Простая валидация email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert('Пожалуйста, введите корректный email адрес');
        return;
    }
    
    const button = document.querySelector('.auth-btn-email');
    setButtonLoading(button, true);
    
    try {
        const response = await fetch('/auth/email', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ email })
        });
        
        const data = await response.json();
        
        if (data.success) {
            setButtonSuccess(button);
            alert(data.message);
        } else {
            setButtonError(button);
            alert('Ошибка отправки ссылки на email');
        }
    } catch (error) {
        console.error('Ошибка:', error);
        setButtonError(button);
        alert('Произошла ошибка. Попробуйте снова.');
    } finally {
        setTimeout(() => setButtonLoading(button, false), 2000);
    }
}

function setButtonLoading(button, isLoading) {
    if (isLoading) {
        button.classList.add('loading');
        button.disabled = true;
    } else {
        button.classList.remove('loading', 'success', 'error');
        button.disabled = false;
    }
}

function setButtonSuccess(button) {
    button.classList.remove('loading', 'error');
    button.classList.add('success');
}

function setButtonError(button) {
    button.classList.remove('loading', 'success');
    button.classList.add('error');
}

// Обработчик для показа модального окна email авторизации
function showEmailModal() {
    // Создаем модальное окно для ввода email
    const modal = document.createElement('div');
    modal.className = 'email-modal';
    modal.innerHTML = `
        <div class="email-modal-content">
            <div class="email-modal-header">
                <h3>Вход через почту</h3>
                <button class="email-modal-close">&times;</button>
            </div>
            <div class="email-modal-body">
                <p>Введите ваш email адрес, и мы отправим вам ссылку для входа</p>
                <form class="email-form" onsubmit="handleEmailSubmit(event)">
                    <input type="email" class="email-input" placeholder="ваш@email.com" required>
                    <button type="submit" class="email-submit-btn">Отправить ссылку</button>
                </form>
            </div>
        </div>
    `;
    
    document.body.appendChild(modal);
    
    // Обработчики закрытия модального окна
    modal.querySelector('.email-modal-close').onclick = () => closeEmailModal(modal);
    modal.onclick = (e) => {
        if (e.target === modal) closeEmailModal(modal);
    };
    
    // Фокус на поле ввода
    setTimeout(() => modal.querySelector('.email-input').focus(), 100);
}

function closeEmailModal(modal) {
    modal.remove();
}

async function handleEmailSubmit(event) {
    event.preventDefault();
    const form = event.target;
    const email = form.querySelector('.email-input').value;
    const submitBtn = form.querySelector('.email-submit-btn');
    
    setButtonLoading(submitBtn, true);
    
    try {
        const response = await fetch('/auth/email', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ email })
        });
        
        const data = await response.json();
        
        if (data.success) {
            setButtonSuccess(submitBtn);
            setTimeout(() => {
                alert(data.message);
                closeEmailModal(document.querySelector('.email-modal'));
            }, 1000);
        } else {
            setButtonError(submitBtn);
            alert('Ошибка отправки ссылки на email');
        }
    } catch (error) {
        console.error('Ошибка:', error);
        setButtonError(submitBtn);
        alert('Произошла ошибка. Попробуйте снова.');
    } finally {
        setTimeout(() => setButtonLoading(submitBtn, false), 2000);
    }
}

function showEmailForm() {
    const mainForm = document.getElementById('main-auth-form');
    const emailForm = document.getElementById('email-auth-form');
    
    // Анимация исчезновения основной формы
    mainForm.classList.add('fade-out');
    
    setTimeout(() => {
        mainForm.style.display = 'none';
        mainForm.classList.remove('fade-out');
        
        emailForm.style.display = 'block';
        emailForm.classList.add('fade-in');
        
        // Фокус на поле email
        setTimeout(() => {
            document.getElementById('email-input').focus();
        }, 50);
    }, 250);
}

function showMainForm() {
    const mainForm = document.getElementById('main-auth-form');
    const emailForm = document.getElementById('email-auth-form');
    
    // Анимация исчезновения email формы
    emailForm.classList.add('fade-out');
    
    setTimeout(() => {
        emailForm.style.display = 'none';
        emailForm.classList.remove('fade-out');
        
        mainForm.style.display = 'block';
        mainForm.classList.add('fade-in');
        
        // Сброс формы email
        const emailInput = document.getElementById('email-input');
        const checkboxes = document.querySelectorAll('.checkbox-input');
        emailInput.value = '';
        checkboxes.forEach(checkbox => checkbox.checked = false);
    }, 250);
}

async function handleEmailAuth(event) {
    event.preventDefault();
    const form = event.target;
    const email = form.querySelector('.email-input-field').value;
    const submitBtn = form.querySelector('.auth-btn-submit');
    
    setButtonLoading(submitBtn, true);
    
    try {
        const response = await fetch('/auth/email', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ email })
        });
        
        const data = await response.json();
        
        if (data.success) {
            setButtonSuccess(submitBtn);
            setTimeout(() => {
                alert(data.message);
                showMainForm();
            }, 1000);
        } else {
            setButtonError(submitBtn);
            alert('Ошибка отправки ссылки на email');
        }
    } catch (error) {
        console.error('Ошибка:', error);
        setButtonError(submitBtn);
        alert('Произошла ошибка. Попробуйте снова.');
    } finally {
        setTimeout(() => setButtonLoading(submitBtn, false), 2000);
    }
}
</script>

</body>
</html> 