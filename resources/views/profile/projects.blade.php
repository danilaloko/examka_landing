<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Мои проекты - Экзамка</title>
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
</head>
<body>
    <div class="profile-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-header">
                <div class="logo">Экзамка</div>
                <div class="user-info">Добро пожаловать в личный кабинет</div>
            </div>
            
            <nav class="sidebar-nav">
                <div class="nav-item">
                    <a href="{{ route('profile.new-project') }}" class="nav-link">
                        <span class="icon">➕</span>
                        Новый проект
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('profile.projects') }}" class="nav-link active">
                        <span class="icon">📋</span>
                        Мои проекты
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('profile.index') }}" class="nav-link">
                        <span class="icon">👤</span>
                        Профиль
                    </a>
                </div>
            </nav>
        </div>

        <!-- Main Content -->
        <main class="main-content">
            <div class="content-header">
                <h1 class="content-title">Мои проекты</h1>
                <p class="content-subtitle">Все ваши работы и задачи в одном месте</p>
            </div>

            <!-- Filter Section -->
            <div class="welcome-section">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                    <h2 class="welcome-title" style="margin-bottom: 0;">Фильтры</h2>
                    <a href="{{ route('profile.new-project') }}" class="btn btn-primary">
                        Создать новый проект
                    </a>
                </div>
                
                <div class="quick-actions">
                    <div class="action-card">
                        <div class="action-icon">📝</div>
                        <h3 class="action-title">Текстовые работы</h3>
                        <p class="action-description">Рефераты, эссе, курсовые</p>
                    </div>
                    
                    <div class="action-card">
                        <div class="action-icon">🧮</div>
                        <h3 class="action-title">Решение задач</h3>
                        <p class="action-description">Математика, физика, химия</p>
                    </div>
                    
                    <div class="action-card">
                        <div class="action-icon">✅</div>
                        <h3 class="action-title">Завершенные</h3>
                        <p class="action-description">Готовые проекты</p>
                    </div>
                    
                    <div class="action-card">
                        <div class="action-icon">⏳</div>
                        <h3 class="action-title">В работе</h3>
                        <p class="action-description">Активные проекты</p>
                    </div>
                </div>
            </div>

            <!-- Projects Grid -->
            <div class="projects-grid">
                <!-- Example Projects (В реальном приложении данные будут из базы данных) -->
                <div class="project-card">
                    <div class="project-header">
                        <span class="project-icon">📄</span>
                        <h3 class="project-title">Реферат по истории</h3>
                        <span class="project-status status-completed">Завершен</span>
                    </div>
                    <p class="project-description">
                        Правовое сознание: понятие и структура. Подробный анализ концепций правового сознания в современном обществе.
                    </p>
                    <div class="project-meta">
                        <span>Создан: 29.05.2026</span>
                        <span>15 страниц</span>
                    </div>
                </div>

                <div class="project-card">
                    <div class="project-header">
                        <span class="project-icon">🧮</span>
                        <h3 class="project-title">Решение интегралов</h3>
                        <span class="project-status status-completed">Завершен</span>
                    </div>
                    <p class="project-description">
                        Набор задач по высшей математике: вычисление определенных интегралов с тригонометрическими функциями.
                    </p>
                    <div class="project-meta">
                        <span>Создан: 29.05.2026</span>
                        <span>5 задач</span>
                    </div>
                </div>

                <div class="project-card">
                    <div class="project-header">
                        <span class="project-icon">📊</span>
                        <h3 class="project-title">Курсовая по экономике</h3>
                        <span class="project-status status-in-progress">В работе</span>
                    </div>
                    <p class="project-description">
                        Анализ рыночных механизмов в условиях современной экономики. Исследование влияния цифровизации на экономические процессы.
                    </p>
                    <div class="project-meta">
                        <span>Создан: 29.05.2026</span>
                        <span>В процессе...</span>
                    </div>
                </div>

                <div class="project-card">
                    <div class="project-header">
                        <span class="project-icon">📝</span>
                        <h3 class="project-title">Эссе по философии</h3>
                        <span class="project-status status-draft">Черновик</span>
                    </div>
                    <p class="project-description">
                        Концепция свободы воли в контексте детерминизма. Философский анализ проблемы выбора и ответственности человека.
                    </p>
                    <div class="project-meta">
                        <span>Создан: 29.05.2026</span>
                        <span>Черновик</span>
                    </div>
                </div>

                <div class="project-card">
                    <div class="project-header">
                        <span class="project-icon">🔬</span>
                        <h3 class="project-title">Задачи по физике</h3>
                        <span class="project-status status-completed">Завершен</span>
                    </div>
                    <p class="project-description">
                        Решение задач по механике: движение тел в поле тяжести, законы сохранения энергии и импульса.
                    </p>
                    <div class="project-meta">
                        <span>Создан: 28.05.2026</span>
                        <span>8 задач</span>
                    </div>
                </div>

                <div class="project-card">
                    <div class="project-header">
                        <span class="project-icon">💼</span>
                        <h3 class="project-title">Отчет по практике</h3>
                        <span class="project-status status-completed">Завершен</span>
                    </div>
                    <p class="project-description">
                        Отчет о прохождении производственной практики в IT-компании. Анализ полученного опыта и навыков.
                    </p>
                    <div class="project-meta">
                        <span>Создан: 27.05.2026</span>
                        <span>25 страниц</span>
                    </div>
                </div>
            </div>

            <!-- Empty State (показывается когда проектов нет) -->
            <!--
            <div class="welcome-section">
                <div class="empty-state">
                    <div class="empty-icon">📋</div>
                    <h3 class="empty-title">У вас пока нет проектов</h3>
                    <p class="empty-description">
                        Создайте свой первый проект, чтобы начать работать с AI-помощником
                    </p>
                    <a href="{{ route('profile.new-project') }}" class="btn btn-primary">
                        Создать первый проект
                    </a>
                </div>
            </div>
            -->
        </main>
    </div>
</body>
</html> 