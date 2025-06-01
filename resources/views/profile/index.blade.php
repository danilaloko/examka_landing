<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль - Экзамка</title>
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <style>
        /* Additional styles for form */
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--text-dark);
        }
        
        .form-input {
            width: 100%;
            padding: 0.75rem;
            border: 2px solid #E5E7EB;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }
        
        .form-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(5, 150, 105, 0.1);
        }
        
        .form-textarea {
            min-height: 120px;
            resize: vertical;
        }
        
        .form-select {
            appearance: none;
            background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3E%3Cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3E%3C/svg%3E");
            background-position: right 0.5rem center;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
            padding-right: 2.5rem;
        }
        
        .work-type-selector {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-bottom: 2rem;
        }
        
        .work-type-card {
            border: 2px solid #E5E7EB;
            border-radius: 12px;
            padding: 1.5rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background: var(--white);
        }
        
        .work-type-card:hover {
            border-color: var(--primary);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(5, 150, 105, 0.1);
        }
        
        .work-type-card.selected {
            border-color: var(--primary);
            background: var(--primary-light);
        }
        
        .work-type-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }
        
        .work-type-title {
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
        }
        
        .work-type-description {
            color: var(--text-light);
            font-size: 0.9rem;
        }
        
        .form-actions {
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
            margin-top: 2rem;
        }
        
        /* Hide inactive sections */
        .section {
            display: none;
        }
        
        .section.active {
            display: block;
        }
        
        @media (max-width: 768px) {
            .work-type-selector {
                grid-template-columns: 1fr;
            }
            
            .form-actions {
                flex-direction: column;
            }
        }
    </style>
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
                    <a href="#" class="nav-link" data-section="new-project">
                        <span class="icon">➕</span>
                        Новый проект
                    </a>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav-link" data-section="projects">
                        <span class="icon">📋</span>
                        Мои проекты
                    </a>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav-link active" data-section="profile">
                        <span class="icon">👤</span>
                        Профиль
                    </a>
                </div>
            </nav>
        </div>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Profile Section -->
            <div id="profile-section" class="section active">
                <div class="content-header">
                    <h1 class="content-title">Профиль</h1>
                    <p class="content-subtitle">Управляйте своими проектами и настройками</p>
                </div>

                <!-- Welcome Section -->
                <div class="welcome-section">
                    <h2 class="welcome-title">Добро пожаловать в Экзамку! 🎓</h2>
                    <p class="welcome-text">
                        Ваш персональный AI-помощник для учебы готов к работе. Создавайте проекты, 
                        генерируйте работы и решайте задачи с помощью искусственного интеллекта.
                    </p>
                    
                    <div class="quick-actions">
                        <a href="#" class="action-card" data-section="new-project">
                            <div class="action-icon">📝</div>
                            <h3 class="action-title">Создать работу</h3>
                            <p class="action-description">Сгенерируйте реферат, эссе или курсовую работу</p>
                        </a>
                        
                        <a href="#" class="action-card" data-section="new-project">
                            <div class="action-icon">🧮</div>
                            <h3 class="action-title">Решить задачу</h3>
                            <p class="action-description">Получите решение любой задачи с объяснением</p>
                        </a>
                        
                        <a href="#" class="action-card" data-section="projects">
                            <div class="action-icon">📊</div>
                            <h3 class="action-title">Мои проекты</h3>
                            <p class="action-description">Просмотрите все созданные работы и задачи</p>
                        </a>
                    </div>
                </div>

                <!-- Stats Section -->
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-number">0</div>
                        <div class="stat-label">Созданных<br>проектов</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">0</div>
                        <div class="stat-label">Решенных<br>задач</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">Безлимит</div>
                        <div class="stat-label">Доступных<br>запросов</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">24/7</div>
                        <div class="stat-label">Поддержка<br>AI</div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="welcome-section">
                    <h2 class="welcome-title">Последняя активность</h2>
                    <div class="empty-state">
                        <div class="empty-icon">📋</div>
                        <h3 class="empty-title">Пока здесь пусто</h3>
                        <p class="empty-description">
                            Создайте свой первый проект, чтобы увидеть активность здесь
                        </p>
                        <a href="#" class="btn btn-primary" data-section="new-project">
                            Создать первый проект
                        </a>
                    </div>
                </div>
            </div>

            <!-- Projects Section -->
            <div id="projects-section" class="section">
                <div class="content-header">
                    <h1 class="content-title">Мои проекты</h1>
                    <p class="content-subtitle">Все ваши работы и задачи в одном месте</p>
                </div>

                <!-- Filter Section -->
                <div class="welcome-section">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                        <h2 class="welcome-title" style="margin-bottom: 0;">Фильтры</h2>
                        <a href="#" class="btn btn-primary" data-section="new-project">
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
                    <!-- Example Projects -->
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
            </div>

            <!-- New Project Section -->
            <div id="new-project-section" class="section">
                <div class="content-header">
                    <h1 class="content-title">Новый проект</h1>
                    <p class="content-subtitle">Создайте новую работу или задачу с помощью AI</p>
                </div>

                <!-- Project Type Selection -->
                <div class="welcome-section">
                    <h2 class="welcome-title">Выберите тип проекта</h2>
                    <div class="work-type-selector">
                        <div class="work-type-card selected" data-type="text">
                            <div class="work-type-icon">📝</div>
                            <h3 class="work-type-title">Текстовая работа</h3>
                            <p class="work-type-description">
                                Реферат, эссе, курсовая работа, дипломная работа, отчет по практике
                            </p>
                        </div>
                        
                        <div class="work-type-card" data-type="task">
                            <div class="work-type-icon">🧮</div>
                            <h3 class="work-type-title">Решение задачи</h3>
                            <p class="work-type-description">
                                Математика, физика, химия, программирование и другие дисциплины
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Project Form -->
                <div class="welcome-section">
                    <h2 class="welcome-title">Детали проекта</h2>
                    
                    <form id="project-form">
                        <div class="form-group">
                            <label for="project-title" class="form-label">Название проекта</label>
                            <input 
                                type="text" 
                                id="project-title" 
                                class="form-input" 
                                placeholder="Например: Правовое сознание: понятие и структура"
                                required
                            >
                        </div>

                        <div class="form-group" id="work-type-specific">
                            <label for="work-type" class="form-label">Тип работы</label>
                            <select id="work-type" class="form-input form-select">
                                <option value="">Выберите тип работы</option>
                                <option value="referat">Реферат</option>
                                <option value="essay">Эссе</option>
                                <option value="course">Курсовая работа</option>
                                <option value="diploma">Дипломная работа</option>
                                <option value="report">Отчет по практике</option>
                                <option value="other">Другое</option>
                            </select>
                        </div>

                        <div class="form-group" id="subject-group">
                            <label for="subject" class="form-label">Предмет/Дисциплина</label>
                            <input 
                                type="text" 
                                id="subject" 
                                class="form-input" 
                                placeholder="Например: История, Математика, Физика"
                            >
                        </div>

                        <div class="form-group">
                            <label for="description" class="form-label">Подробное описание</label>
                            <textarea 
                                id="description" 
                                class="form-input form-textarea" 
                                placeholder="Опишите подробнее, что нужно сделать. Укажите требования, объем, особые пожелания..."
                            ></textarea>
                        </div>

                        <div class="form-group" id="pages-group">
                            <label for="pages" class="form-label">Примерный объем (страниц)</label>
                            <select id="pages" class="form-input form-select">
                                <option value="">Выберите объем</option>
                                <option value="5-10">5-10 страниц</option>
                                <option value="10-15">10-15 страниц</option>
                                <option value="15-20">15-20 страниц</option>
                                <option value="20-30">20-30 страниц</option>
                                <option value="30-50">30-50 страниц</option>
                                <option value="50+">Более 50 страниц</option>
                            </select>
                        </div>

                        <div class="form-actions">
                            <a href="#" class="btn btn-secondary" data-section="projects">
                                Отмена
                            </a>
                            <button type="submit" class="btn btn-primary">
                                Создать проект
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Navigation between sections
        function showSection(sectionName) {
            // Hide all sections
            document.querySelectorAll('.section').forEach(section => {
                section.classList.remove('active');
            });
            
            // Show target section
            document.getElementById(sectionName + '-section').classList.add('active');
            
            // Update active nav link
            document.querySelectorAll('.nav-link').forEach(link => {
                link.classList.remove('active');
            });
            
            document.querySelector(`[data-section="${sectionName}"]`).classList.add('active');
            
            // Update page title
            const titles = {
                'profile': 'Профиль - Экзамка',
                'projects': 'Мои проекты - Экзамка',
                'new-project': 'Новый проект - Экзамка'
            };
            document.title = titles[sectionName] || 'Профиль - Экзамка';
        }

        // Handle navigation clicks
        document.addEventListener('click', function(e) {
            const target = e.target.closest('[data-section]');
            if (target) {
                e.preventDefault();
                const section = target.getAttribute('data-section');
                showSection(section);
            }
        });

        // Work type selection
        document.querySelectorAll('.work-type-card').forEach(card => {
            card.addEventListener('click', function() {
                // Remove selection from other cards
                document.querySelectorAll('.work-type-card').forEach(c => c.classList.remove('selected'));
                // Select current card
                this.classList.add('selected');
                
                const type = this.dataset.type;
                const workTypeGroup = document.getElementById('work-type-specific');
                const pagesGroup = document.getElementById('pages-group');
                
                if (type === 'text') {
                    workTypeGroup.style.display = 'block';
                    pagesGroup.style.display = 'block';
                } else {
                    workTypeGroup.style.display = 'none';
                    pagesGroup.style.display = 'none';
                }
            });
        });

        // Handle form submission
        document.getElementById('project-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Here would be logic to send data to server
            alert('Проект создается... В реальном приложении здесь будет отправка данных на сервер.');
            
            // Navigate to projects section
            showSection('projects');
        });

        // Set initial state
        showSection('profile');
    </script>
</body>
</html> 