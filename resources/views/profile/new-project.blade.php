<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Новый проект - Экзамка</title>
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
            color: #333;
        }
        
        .form-input {
            width: 100%;
            padding: 0.75rem;
            border: 2px solid rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }
        
        .form-input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
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
            border: 2px solid rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            padding: 1.5rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background: white;
        }
        
        .work-type-card:hover {
            border-color: #667eea;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.1);
        }
        
        .work-type-card.selected {
            border-color: #667eea;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
        }
        
        .work-type-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }
        
        .work-type-title {
            font-weight: 600;
            color: #333;
            margin-bottom: 0.5rem;
        }
        
        .work-type-description {
            color: #666;
            font-size: 0.9rem;
        }
        
        .form-actions {
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
            margin-top: 2rem;
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
                    <a href="{{ route('profile.new-project') }}" class="nav-link active">
                        <span class="icon">➕</span>
                        Новый проект
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('profile.projects') }}" class="nav-link">
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
                        <a href="{{ route('profile.projects') }}" class="btn btn-secondary">
                            Отмена
                        </a>
                        <button type="submit" class="btn btn-primary">
                            Создать проект
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <script>
        // Переключение между типами проектов
        document.querySelectorAll('.work-type-card').forEach(card => {
            card.addEventListener('click', function() {
                // Убираем выделение с других карточек
                document.querySelectorAll('.work-type-card').forEach(c => c.classList.remove('selected'));
                // Выделяем текущую карточку
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

        // Обработка отправки формы
        document.getElementById('project-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Здесь будет логика отправки данных на сервер
            alert('Проект создается... В реальном приложении здесь будет отправка данных на сервер.');
            
            // Перенаправление на страницу проектов
            // window.location.href = "{{ route('profile.projects') }}";
        });
    </script>
</body>
</html> 