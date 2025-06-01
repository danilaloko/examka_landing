<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Экзамка - AI помощник для студентов</title>
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
</head>
<body>
<nav class="nav">
    <div class="container nav-content">
        <div class="logo">Экзамка</div>
        <div class="nav-menu">
            <a href="#tools" class="nav-link">Инструменты</a>
            <a href="#reviews" class="nav-link">Отзывы</a>
            <a href="#pricing" class="nav-link">Тарифы</a>
            <a href="#about" class="nav-link">О нас</a>
        </div>
        <div class="nav-right">
            <a href="{{ route('profile.index') }}" class="login-btn" style="margin-right: 0.5rem;">Профиль</a>
            <a href="/login" class="login-btn">Войти</a>
            <button class="mobile-menu-btn">
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
            </button>
        </div>
    </div>
    
    <!-- Мобильное меню -->
    <div class="mobile-menu">
        <a href="#tools" class="mobile-nav-link">Инструменты</a>
        <a href="#reviews" class="mobile-nav-link">Отзывы</a>
        <a href="#pricing" class="mobile-nav-link">Тарифы</a>
        <a href="#about" class="mobile-nav-link">О нас</a>
    </div>
</nav>

    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <div class="hero-title">
                    <div class="static">Твой</div>
                    <div class="accent">ИИ</div> для учебы
                </div>

                <p class="hero-subtitle">
                    Сгенерирует доклад, решит задачу, напишет эссе, курсовую работу, дипломную работу, отчет по практике и многое другое
                </p>

                <!-- Форма ввода темы -->
                <div class="topic-section">
                    <h2>Попробуй бесплатно прямо сейчас</h2>
                    <form class="topic-form">
                        <!-- Переключатель типа работы -->
                        <div class="work-type-toggle">
                            <div class="toggle-container">
                                <input type="radio" name="workType" id="text-work" value="text" checked>
                                <input type="radio" name="workType" id="task-work" value="task">
                                <label for="text-work" class="toggle-option">
                                    <span class="toggle-icon">📝</span>
                                    <span class="toggle-text">Текст</span>
                                </label>
                                <label for="task-work" class="toggle-option">
                                    <span class="toggle-icon">🧮</span>
                                    <span class="toggle-text">Задача</span>
                                </label>
                                <div class="toggle-slider"></div>
                            </div>
                        </div>

                        <div class="topic-input-container">
                            <label class="topic-label" for="topic-input">Название работы</label>
                            <input type="text" id="topic-input" class="topic-input" placeholder="Например: Правовое сознание: понятие и структура" required>
                            <p class="topic-hint">
                                Введите тему работы, и ИИ сгенерирует для вас качественный материал
                            </p>
                        </div>
                        <button type="submit" class="btn btn-generate">Сгенерировать работу</button>
                    </form>
                </div>

                <!-- Статистика -->
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-number">1000+</div>
                        <div class="stat-label">Активных<br>пользователей</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">15K+</div>
                        <div class="stat-label">Обработанных<br>материалов</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">24/7</div>
                        <div class="stat-label">Доступность<br>сервиса</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">1 мин</div>
                        <div class="stat-label">Средняя<br>скорость ответа AI</div>
                    </div>
                </div>

                <!-- Инструменты -->
                <div class="tools-section" id="tools">
                    <div class="tools-heading">
                        <h2>Наши инструменты</h2>
                        <p>Выберите подходящий инструмент для эффективной подготовки к экзаменам</p>
                    </div>

                    <div class="tools-container">
                        <div class="tool-block">
                            <div class="tool-main">
                                <div class="tool-icon">📄</div>
                                <div class="tool-content">
                                    <h3 class="tool-title">Генерация текстовых работ</h3>
                                    <p class="tool-description">
                                        Получите готовую уникальную работу по любой теме за считанные минуты
                                    </p>
                                </div>
                            </div>
                            
                            <div class="tool-benefits">
                                <div class="benefit-card">
                                    <div class="benefit-icon">✨</div>
                                    <div class="benefit-text">
                                        <h4>Пройдет проверку на уникальность</h4>
                                        <p>Оригинальный текст без плагиата</p>
                                    </div>
                                </div>
                                <div class="benefit-card">
                                    <div class="benefit-icon">⚡</div>
                                    <div class="benefit-text">
                                        <h4>Готовая работа за несколько минут</h4>
                                        <p>Быстрая генерация качественного контента</p>
                                    </div>
                                </div>
                                <div class="benefit-card">
                                    <div class="benefit-icon">📋</div>
                                    <div class="benefit-text">
                                        <h4>Сразу в нужном формате</h4>
                                        <p>Правильное оформление и структура</p>
                                    </div>
                                </div>
                                <div class="benefit-card">
                                    <div class="benefit-icon">✏️</div>
                                    <div class="benefit-text">
                                        <h4>Можно редактировать</h4>
                                        <p>Возможность внесения изменений</p>
                                    </div>
                                </div>
                            </div>
                            
                            <a href="#" class="tool-action-btn">
                                Сгенерировать работу
                            </a>
                        </div>

                        <div class="tool-block">
                            <div class="tool-main">
                                <div class="tool-icon">🧮</div>
                                <div class="tool-content">
                                    <h3 class="tool-title">Решение задач</h3>
                                    <p class="tool-description">
                                        ИИ поможет решить любую задачу с подробным объяснением каждого шага
                                    </p>
                                </div>
                            </div>
                            
                            <div class="tool-benefits">
                                <div class="benefit-card">
                                    <div class="benefit-icon">📐</div>
                                    <div class="benefit-text">
                                        <h4>От математики до философии</h4>
                                        <p>Решение задач по всем предметам</p>
                                    </div>
                                </div>
                                <div class="benefit-card">
                                    <div class="benefit-icon">💡</div>
                                    <div class="benefit-text">
                                        <h4>С подробным объяснением</h4>
                                        <p>Каждый шаг разобран поэтапно</p>
                                    </div>
                                </div>
                                <div class="benefit-card">
                                    <div class="benefit-icon">💬</div>
                                    <div class="benefit-text">
                                        <h4>Уточняй непонятные моменты</h4>
                                        <p>Получи ответ на любой вопрос по задаче</p>
                                    </div>
                                </div>
                                <div class="benefit-card">
                                    <div class="benefit-icon">⏰</div>
                                    <div class="benefit-text">
                                        <h4>Получи решение в течение 1 минуты</h4>
                                        <p>Быстрое получение ответа</p>
                                    </div>
                                </div>
                            </div>
                            
                            <a href="#" class="tool-action-btn">
                                Решить задачу
                            </a>
                        </div>

                        <div class="tool-block">
                            <div class="tool-main">
                                <div class="tool-icon">📝</div>
                                <div class="tool-content">
                                    <h3 class="tool-title">Экзамка.Конспекты</h3>
                                    <p class="tool-description">
                                        Преобразуйте любые материалы в структурированные конспекты за считанные минуты
                                    </p>
                                </div>
                            </div>
                            
                            <div class="tool-benefits">
                                <div class="benefit-card">
                                    <div class="benefit-icon">🎯</div>
                                    <div class="benefit-text">
                                        <h4>Конвертация аудио-лекций</h4>
                                        <p>Автоматическое преобразование в текст</p>
                                    </div>
                                </div>
                                <div class="benefit-card">
                                    <div class="benefit-icon">📸</div>
                                    <div class="benefit-text">
                                        <h4>Распознавание текста с фото</h4>
                                        <p>Сканирование и обработка изображений</p>
                                    </div>
                                </div>
                                <div class="benefit-card">
                                    <div class="benefit-icon">📋</div>
                                    <div class="benefit-text">
                                        <h4>Автоматическое структурирование</h4>
                                        <p>Организация материала по разделам</p>
                                    </div>
                                </div>
                                <div class="benefit-card">
                                    <div class="benefit-icon">📄</div>
                                    <div class="benefit-text">
                                        <h4>Готовые конспекты в PDF</h4>
                                        <p>Экспорт в удобном формате</p>
                                    </div>
                                </div>
                            </div>
                            
                            <a href="#" class="tool-action-btn tool-action-btn--coming-soon" onclick="return false;">
                                Скоро
                            </a>
                        </div>

                        <div class="tool-block">
                            <div class="tool-main">
                                <div class="tool-icon">🎓</div>
                                <div class="tool-content">
                                    <h3 class="tool-title">Экзамка.Сессия</h3>
                                    <p class="tool-description">
                                        Персональный план подготовки к экзамену с учетом ваших знаний и времени
                                    </p>
                                </div>
                            </div>
                            
                            <div class="tool-benefits">
                                <div class="benefit-card">
                                    <div class="benefit-icon">🔍</div>
                                    <div class="benefit-text">
                                        <h4>Анализ программы экзамена</h4>
                                        <p>Детальный разбор требований</p>
                                    </div>
                                </div>
                                <div class="benefit-card">
                                    <div class="benefit-icon">📅</div>
                                    <div class="benefit-text">
                                        <h4>Интерактивный план подготовки</h4>
                                        <p>Персональная программа обучения</p>
                                    </div>
                                </div>
                                <div class="benefit-card">
                                    <div class="benefit-icon">✅</div>
                                    <div class="benefit-text">
                                        <h4>Тесты для самопроверки</h4>
                                        <p>Проверка знаний в реальном времени</p>
                                    </div>
                                </div>
                                <div class="benefit-card">
                                    <div class="benefit-icon">📊</div>
                                    <div class="benefit-text">
                                        <h4>Отслеживание прогресса</h4>
                                        <p>Визуализация успехов в обучении</p>
                                    </div>
                                </div>
                            </div>
                            
                            <a href="#" class="tool-action-btn tool-action-btn--coming-soon" onclick="return false;">
                                Скоро
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Возможности -->
                <div class="features-grid">
                    <div class="feature-card">
                        <div class="feature-icon">🎯</div>
                        <h3>Точные ответы</h3>
                        <p>AI анализирует материалы и дает ответы со ссылками на источники</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">⚡</div>
                        <h3>Быстрая подготовка</h3>
                        <p>Сократи время подготовки к экзамену в 3 раза</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">📚</div>
                        <h3>Любые предметы</h3>
                        <p>От математики до философии - поможем со всеми дисциплинами</p>
                    </div>
                </div>

                
                <!-- Секция отзывов -->
                <div class="reviews-section" id="reviews">
                    <div class="reviews-header">
                        <h2>Отзывы студентов</h2>
                        <p>Что думают о нас наши пользователи</p>
                    </div>
                    
                    <div class="reviews-slider">
                        <div class="reviews-container">
                            <div class="review-card">
                                <div class="reviewer-info">
                                    <div class="reviewer-details">
                                        <h4 class="reviewer-name">Алина Васильева</h4>
                                        <p class="reviewer-university">МГУ</p>
                                    </div>
                                </div>
                                <div class="review-text">
                                    <p>Попросила Экзамку сгенерировать реферат по истории средних веков. За 3 минуты получила готовую работу на 15 страниц с идеальной структурой и списком литературы. Сдала на отлично!</p>
                                </div>
                                <div class="review-work">
                                    <span class="work-badge">Сгенерировала реферат по истории</span>
                                </div>
                            </div>

                            <div class="review-card">
                                <div class="reviewer-info">
                                    <div class="reviewer-details">
                                        <h4 class="reviewer-name">Данил Ковалев</h4>
                                        <p class="reviewer-university">МФТИ</p>
                                    </div>
                                </div>
                                <div class="review-text">
                                    <p>Не мог решить интеграл с тригонометрическими функциями. Отправил задачу в Экзамку - получил полное решение с объяснением каждого шага за 30 секунд. Теперь понимаю тему!</p>
                                </div>
                                <div class="review-work">
                                    <span class="work-badge">Решил сложный интеграл</span>
                                </div>
                            </div>

                            <div class="review-card">
                                <div class="reviewer-info">
                                    <div class="reviewer-details">
                                        <h4 class="reviewer-name">Екатерина Морозова</h4>
                                        <p class="reviewer-university">СПбГУ</p>
                                    </div>
                                </div>
                                <div class="review-text">
                                    <p>Нужно было написать эссе по философии за одну ночь. Экзамка сгенерировала блестящий текст с глубоким анализом и цитатами. Преподаватель даже не поверил, что я это сама написала!</p>
                                </div>
                                <div class="review-work">
                                    <span class="work-badge">Сгенерировала эссе по философии</span>
                                </div>
                            </div>

                            <div class="review-card">
                                <div class="reviewer-info">
                                    <div class="reviewer-details">
                                        <h4 class="reviewer-name">Максим Петров</h4>
                                        <p class="reviewer-university">ИТМО</p>
                                    </div>
                                </div>
                                <div class="review-text">
                                    <p>Застрял на задаче по программированию - нужно было написать алгоритм сортировки. Экзамка не только дала код, но и объяснила логику работы. Теперь легко пишу подобные алгоритмы!</p>
                                </div>
                                <div class="review-work">
                                    <span class="work-badge">Решил задачу по алгоритмам</span>
                                </div>
                            </div>
                            
                            <div class="review-card">
                                <div class="reviewer-info">
                                    <div class="reviewer-details">
                                        <h4 class="reviewer-name">Анна Лебедева</h4>
                                        <p class="reviewer-university">ВШЭ</p>
                                    </div>
                                </div>
                                <div class="review-text">
                                    <p>Попросила сгенерировать курсовую работу по экономике на 40 страниц. Экзамка создала профессиональный текст с графиками, таблицами и актуальными данными. Защитилась на 5!</p>
                                </div>
                                <div class="review-work">
                                    <span class="work-badge">Сгенерировала курсовую по экономике</span>
                                </div>
                            </div>

                            <div class="review-card">
                                <div class="reviewer-info">
                                    <div class="reviewer-details">
                                        <h4 class="reviewer-name">Артем Козлов</h4>
                                        <p class="reviewer-university">МГТУ им. Баумана</p>
                                    </div>
                                </div>
                                <div class="review-text">
                                    <p>Сложная задача по физике с системой уравнений ставила в тупик. Отправил в Экзамку - получил пошаговое решение с формулами и объяснениями. Понял принцип и решил остальные задачи сам!</p>
                                </div>
                                <div class="review-work">
                                    <span class="work-badge">Решил систему уравнений по физике</span>
                                </div>
                            </div>

                            <div class="review-card">
                                <div class="reviewer-info">
                                    <div class="reviewer-details">
                                        <h4 class="reviewer-name">Мария Новикова</h4>
                                        <p class="reviewer-university">РУДН</p>
                                    </div>
                                </div>
                                <div class="review-text">
                                    <p>Заказала в Экзамке доклад по международному праву. Получила готовый текст с актуальными примерами из практики и ссылками на законы. Выступила перед группой - все были в восторге!</p>
                                </div>
                                <div class="review-work">
                                    <span class="work-badge">Сгенерировала доклад по праву</span>
                                </div>
                            </div>
                            
                            <div class="review-card">
                                <div class="reviewer-info">
                                    <div class="reviewer-details">
                                        <h4 class="reviewer-name">Игорь Смирнов</h4>
                                        <p class="reviewer-university">МИФИ</p>
                                    </div>
                                </div>
                                <div class="review-text">
                                    <p>Контрольная по высшей математике - 10 задач на производные и пределы. Экзамка решила все за 2 минуты с подробными выкладками. Проверил преподаватель - всё правильно, получил зачёт!</p>
                                </div>
                                <div class="review-work">
                                    <span class="work-badge">Решил 10 задач по матанализу</span>
                                </div>
                            </div>

                            <div class="review-card">
                                <div class="reviewer-info">
                                    <div class="reviewer-details">
                                        <h4 class="reviewer-name">Дарья Орлова</h4>
                                        <p class="reviewer-university">МедУниверситет</p>
                                    </div>
                                </div>
                                <div class="review-text">
                                    <p>Попросила сгенерировать дипломную работу по медицине. Экзамка создала серьёзный научный труд со статистикой, исследованиями и правильным оформлением. Комиссия поставила отлично!</p>
                                </div>
                                <div class="review-work">
                                    <span class="work-badge">Сгенерировала диплом по медицине</span>
                                </div>
                            </div>

                            <div class="review-card">
                                <div class="reviewer-info">
                                    <div class="reviewer-details">
                                        <h4 class="reviewer-name">Никита Федоров</h4>
                                        <p class="reviewer-university">МГИМО</p>
                                    </div>
                                </div>
                                <div class="review-text">
                                    <p>Сложная задача по экономической теории - нужно было найти равновесие на рынке. Экзамка пошагово показала решение с графиками и формулами. Понял тему за 5 минут!</p>
                                </div>
                                <div class="review-work">
                                    <span class="work-badge">Решил задачу по экономике</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="reviews-controls">
                            <button class="review-btn-prev">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                            <button class="review-btn-next">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                    
                    <div class="reviews-action">
                        <button class="btn-leave-review">
                            Оставить отзыв
                        </button>
                    </div>
                </div>

                <!-- Секция тарифов -->
                <div class="pricing-section" id="pricing">
                    <div class="pricing-header">
                        <h2>Тарифы</h2>
                        <p>Выберите подходящий план для вашей учебы</p>
                    </div>
                    
                    <div class="pricing-cards">
                        <div class="pricing-card">
                            <div class="pricing-plan">
                                <h3 class="plan-type">Бесплатно</h3>
                                <div class="plan-price">
                                    <span class="price">0 ₽</span>
                                </div>
                            </div>
                            <div class="plan-features">
                                <div class="feature">
                                    <svg class="feature-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                        <path d="M16.707 5.293a1 1 0 0 1 0 1.414l-8 8a1 1 0 0 1-1.414 0l-4-4a1 1 0 1 1 1.414-1.414L8 12.586l7.293-7.293a1 1 0 0 1 1.414 0z" fill="#059669"/>
                                    </svg>
                                    <span>Бесплатная AI каждый день</span>
                                </div>
                                <div class="feature">
                                    <svg class="feature-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                        <path d="M16.707 5.293a1 1 0 0 1 0 1.414l-8 8a1 1 0 0 1-1.414 0l-4-4a1 1 0 1 1 1.414-1.414L8 12.586l7.293-7.293a1 1 0 0 1 1.414 0z" fill="#059669"/>
                                    </svg>
                                    <span>Бесплатное содержание текстовой работы</span>
                                </div>
                            </div>
                            <button class="plan-button free">
                                У тебя сейчас
                            </button>
                        </div>

                        <div class="pricing-card popular">
                            <div class="popular-badge">Популярно!</div>
                            <div class="pricing-plan">
                                <h3 class="plan-type">На месяц</h3>
                                <div class="plan-price">
                                    <span class="price">399 ₽</span>
                                    <span class="price-period">в месяц</span>
                                </div>
                            </div>
                            <div class="plan-features">
                                <div class="feature">
                                    <svg class="feature-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                        <path d="M16.707 5.293a1 1 0 0 1 0 1.414l-8 8a1 1 0 0 1-1.414 0l-4-4a1 1 0 1 1 1.414-1.414L8 12.586l7.293-7.293a1 1 0 0 1 1.414 0z" fill="#059669"/>
                                    </svg>
                                    <span>Безлимит на решение задач и AI помощь</span>
                                </div>
                                <div class="feature">
                                    <svg class="feature-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                        <path d="M16.707 5.293a1 1 0 0 1 0 1.414l-8 8a1 1 0 0 1-1.414 0l-4-4a1 1 0 1 1 1.414-1.414L8 12.586l7.293-7.293a1 1 0 0 1 1.414 0z" fill="#059669"/>
                                    </svg>
                                    <span>30 токенов на 2 текстовые работы</span>
                                </div>
                            </div>
                            <button class="plan-button premium">
                                Выбрать план
                            </button>
                        </div>

                        <div class="pricing-card">
                            <div class="pricing-plan">
                                <h3 class="plan-type">На 3 месяца</h3>
                                <div class="plan-price">
                                    <span class="price">333 ₽</span>
                                    <span class="price-month">в месяц</span>
                                    <span class="price-period">999 ₽ за 3 месяца</span>
                                </div>
                                <div class="plan-save">
                                    <span>Экономия 198 ₽</span>
                                </div>
                            </div>
                            <div class="plan-features">
                                <div class="feature">
                                    <svg class="feature-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                        <path d="M16.707 5.293a1 1 0 0 1 0 1.414l-8 8a1 1 0 0 1-1.414 0l-4-4a1 1 0 1 1 1.414-1.414L8 12.586l7.293-7.293a1 1 0 0 1 1.414 0z" fill="#059669"/>
                                    </svg>
                                    <span>Безлимит на решение задач и AI помощь</span>
                                </div>
                                <div class="feature">
                                    <svg class="feature-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                        <path d="M16.707 5.293a1 1 0 0 1 0 1.414l-8 8a1 1 0 0 1-1.414 0l-4-4a1 1 0 1 1 1.414-1.414L8 12.586l7.293-7.293a1 1 0 0 1 1.414 0z" fill="#059669"/>
                                    </svg>
                                    <span>90 токенов на 6 текстовых работ</span>
                                </div>
                            </div>
                            <button class="plan-button quarterly">
                                Выбрать план
                            </button>
                        </div>

                        <div class="pricing-card best-value">
                            <div class="best-value-badge">Лучшая цена!</div>
                            <div class="pricing-plan">
                                <h3 class="plan-type">На год</h3>
                                <div class="plan-price">
                                    <span class="price">249 ₽</span>
                                    <span class="price-month">в месяц</span>
                                    <span class="price-period">2999 ₽ в год</span>
                                </div>
                                <div class="plan-save">
                                    <span>Экономия 1789 ₽</span>
                                </div>
                            </div>
                            <div class="plan-features">
                                <div class="feature">
                                    <svg class="feature-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                        <path d="M16.707 5.293a1 1 0 0 1 0 1.414l-8 8a1 1 0 0 1-1.414 0l-4-4a1 1 0 1 1 1.414-1.414L8 12.586l7.293-7.293a1 1 0 0 1 1.414 0z" fill="#059669"/>
                                    </svg>
                                    <span>Безлимит на решение задач и AI помощь</span>
                                </div>
                                <div class="feature">
                                    <svg class="feature-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                        <path d="M16.707 5.293a1 1 0 0 1 0 1.414l-8 8a1 1 0 0 1-1.414 0l-4-4a1 1 0 1 1 1.414-1.414L8 12.586l7.293-7.293a1 1 0 0 1 1.414 0z" fill="#059669"/>
                                    </svg>
                                    <span>360 токенов на 24 текстовые работы</span>
                                </div>
                            </div>
                            <button class="plan-button yearly">
                                Выбрать план
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- CTA секция -->
                <div class="cta-section">
                    <div class="telegram-icon">
                        <svg width="60" height="60" fill="currentColor" viewBox="0 0 496 512">
                            <path d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm121.8 169.9l-40.7 191.8c-3 13.6-11.1 16.9-22.4 10.5l-62-45.7-29.9 28.8c-3.3 3.3-6.1 6.1-12.5 6.1l4.4-63.1 114.9-103.8c5-4.4-1.1-6.9-7.7-2.5l-142 89.4-61.2-19.1c-13.3-4.2-13.6-13.3 2.8-19.7l239.1-92.2c11.1-4 20.8 2.7 17.2 19.5z"/>
                        </svg>
                    </div>
                    <h2>Экзамка теперь в Telegram!</h2>
                    <p class="cta-subtitle">
                        Получай помощь с учебой прямо в мессенджере. Решение задач, генерация работ и AI-консультации - всё в одном боте!
                    </p>
                    <a href="#" class="btn btn-cta">
                        <span>Перейти к боту в Telegram</span>
                    </a>
                </div>

            </div>
        </div>
    </section>
    
    <footer class="footer" id="about">
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

    <script src="{{ asset('js/landing.js') }}"></script>
</body>
</html> 