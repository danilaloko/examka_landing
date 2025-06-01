// Landing Page JavaScript
document.addEventListener('DOMContentLoaded', function() {
    
    // Обработка переключателя типа работы
    const textWorkRadio = document.getElementById('text-work');
    const taskWorkRadio = document.getElementById('task-work');
    const topicInput = document.querySelector('.topic-input');
    const generateBtn = document.querySelector('.btn-generate');
    const topicLabel = document.querySelector('.topic-label');
    const topicHint = document.querySelector('.topic-hint');
    
    // Проверяем, что все элементы найдены
    console.log('Elements found:', {
        textWorkRadio: !!textWorkRadio,
        taskWorkRadio: !!taskWorkRadio,
        topicInput: !!topicInput,
        generateBtn: !!generateBtn,
        topicLabel: !!topicLabel,
        topicHint: !!topicHint
    });
    
    // Плейсхолдеры для разных типов работ
    const placeholders = {
        text: "Например: Правовое сознание: понятие и структура",
        task: "Например: Решить уравнение x² + 5x - 6 = 0"
    };
    
    // Тексты кнопок для разных типов работ
    const buttonTexts = {
        text: "Сгенерировать работу",
        task: "Решить задачу"
    };

    // Заголовки для разных типов работ
    const labelTexts = {
        text: "Название работы",
        task: "Текст задачи"
    };

    // Тексты подсказок для разных типов работ
    const hintTexts = {
        text: "Введите тему работы, и ИИ сгенерирует для вас качественный материал",
        task: "Введите условие задачи, и ИИ предоставит подробное решение"
    };
    
    // Функция обновления интерфейса
    function updateInterface() {
        const selectedType = document.querySelector('input[name="workType"]:checked')?.value;
        console.log('Selected type:', selectedType);
        
        if (!selectedType || !topicInput || !generateBtn || !topicLabel) {
            console.error('Missing elements for interface update');
            return;
        }
        
        // Обновляем placeholder
        topicInput.placeholder = placeholders[selectedType];
        
        // Обновляем текст кнопки
        generateBtn.textContent = buttonTexts[selectedType];

        // Обновляем заголовок поля
        topicLabel.textContent = labelTexts[selectedType];

        // Обновляем текст подсказки
        if (topicHint) {
            topicHint.textContent = hintTexts[selectedType];
        }
        
        // Анимация при смене типа
        topicInput.style.transform = 'scale(0.98)';
        topicLabel.style.opacity = '0.7';
        if (topicHint) {
            topicHint.style.opacity = '0.7';
        }
        setTimeout(() => {
            topicInput.style.transform = 'scale(1)';
            topicLabel.style.opacity = '1';
            if (topicHint) {
                topicHint.style.opacity = '1';
            }
        }, 150);
    }
    
    // Обработчики событий для радио-кнопок
    if (textWorkRadio && taskWorkRadio) {
        textWorkRadio.addEventListener('change', function() {
            console.log('Text work selected');
            updateInterface();
        });
        taskWorkRadio.addEventListener('change', function() {
            console.log('Task work selected');
            updateInterface();
        });
    }
    
    // Обработка отправки формы
    const topicForm = document.querySelector('.topic-form');
    if (topicForm) {
        topicForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const selectedType = document.querySelector('input[name="workType"]:checked')?.value;
            const topic = topicInput?.value.trim();
            
            if (!topic) {
                // Анимация ошибки
                if (topicInput) {
                    topicInput.style.borderColor = '#EF4444';
                    topicInput.style.boxShadow = '0 0 0 4px rgba(239, 68, 68, 0.1)';
                    
                    setTimeout(() => {
                        topicInput.style.borderColor = '#E5E7EB';
                        topicInput.style.boxShadow = 'none';
                    }, 2000);
                }
                return;
            }
            
            // Анимация загрузки
            if (generateBtn) {
                generateBtn.disabled = true;
                generateBtn.innerHTML = '<span class="loading-spinner"></span> Генерируем...';
                
                // Имитация отправки (здесь будет реальная логика)
                setTimeout(() => {
                    alert(`Генерируем ${selectedType === 'text' ? 'текст' : 'решение задачи'} по теме: "${topic}"`);
                    
                    // Возвращаем кнопку в исходное состояние
                    generateBtn.disabled = false;
                    generateBtn.textContent = buttonTexts[selectedType];
                }, 2000);
            }
        });
    }
    
    // Анимация фокуса на input
    if (topicInput) {
        topicInput.addEventListener('focus', function() {
            this.parentElement.style.transform = 'translateY(-2px)';
        });
        
        topicInput.addEventListener('blur', function() {
            this.parentElement.style.transform = 'translateY(0)';
        });
    }

    // Smooth scrolling для якорных ссылок с учетом навбара
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            const target = document.querySelector(targetId);
            
            if (target) {
                const navHeight = document.querySelector('.nav').offsetHeight;
                const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - navHeight - 20;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });

    // Добавляем эффект ripple для кнопок
    document.querySelectorAll('.btn').forEach(button => {
        button.addEventListener('click', function(e) {
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;
            
            const ripple = document.createElement('span');
            ripple.style.cssText = `
                position: absolute;
                width: ${size}px;
                height: ${size}px;
                left: ${x}px;
                top: ${y}px;
                background: rgba(255, 255, 255, 0.3);
                border-radius: 50%;
                transform: scale(0);
                animation: ripple 0.6s linear;
                pointer-events: none;
            `;
            
            this.style.position = 'relative';
            this.style.overflow = 'hidden';
            this.appendChild(ripple);
            
            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });

    // CSS для ripple анимации
    const style = document.createElement('style');
    style.textContent = `
        @keyframes ripple {
            to {
                transform: scale(2);
                opacity: 0;
            }
        }
    `;
    document.head.appendChild(style);

    // Анимация элементов при скролле
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);
    
    // Наблюдаем за элементами для анимации
    document.querySelectorAll('.tool-block, .feature-card, .stat-card').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(el);
    });

    // Мобильное меню
    const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
    const mobileMenu = document.querySelector('.mobile-menu');
    const mobileNavLinks = document.querySelectorAll('.mobile-nav-link');
    
    console.log('Mobile menu elements:', {
        mobileMenuBtn: !!mobileMenuBtn,
        mobileMenu: !!mobileMenu,
        mobileNavLinks: mobileNavLinks.length
    });
    
    if (mobileMenuBtn && mobileMenu) {
        console.log('Mobile menu initialized');
        
        // Переключение мобильного меню
        mobileMenuBtn.addEventListener('click', function(e) {
            e.preventDefault();
            console.log('Mobile menu button clicked');
            
            this.classList.toggle('active');
            mobileMenu.classList.toggle('active');
            
            console.log('Menu state:', {
                buttonActive: this.classList.contains('active'),
                menuActive: mobileMenu.classList.contains('active')
            });
            
            // Блокируем скролл когда меню открыто
            if (mobileMenu.classList.contains('active')) {
                document.body.style.overflow = 'hidden';
            } else {
                document.body.style.overflow = '';
            }
        });
        
        // Закрытие меню при клике на ссылку
        mobileNavLinks.forEach(link => {
            link.addEventListener('click', function() {
                console.log('Mobile nav link clicked');
                mobileMenuBtn.classList.remove('active');
                mobileMenu.classList.remove('active');
                document.body.style.overflow = '';
            });
        });
        
        // Закрытие меню при клике вне его
        document.addEventListener('click', function(e) {
            if (!mobileMenuBtn.contains(e.target) && !mobileMenu.contains(e.target)) {
                mobileMenuBtn.classList.remove('active');
                mobileMenu.classList.remove('active');
                document.body.style.overflow = '';
            }
        });
    } else {
        console.error('Mobile menu elements not found!');
    }
});

// Утилитарные функции
function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

// Обработка ошибок
window.addEventListener('error', function(e) {
    console.error('Landing page error:', e.error);
});

// Поддержка клавиатуры
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        // Можно добавить логику для закрытия модалов и т.д.
        console.log('Escape pressed');
    }
});

// Слайдер отзывов
let currentSlide = 0;
let totalSlides = 0;
let visibleSlides = 1;

// Получение количества видимых слайдов в зависимости от ширины экрана
function getVisibleSlides() {
    const screenWidth = window.innerWidth;
    if (screenWidth > 1024) return 3; // Большие экраны - 3 отзыва
    if (screenWidth > 768) return 2;  // Планшеты - 2 отзыва
    return 1; // Мобильные - 1 отзыв
}

// Получение размеров gap в зависимости от экрана
function getGapSize() {
    const screenWidth = window.innerWidth;
    if (screenWidth > 1024) return 32; // 2rem для больших экранов
    if (screenWidth > 768) return 24;  // 1.5rem для планшетов
    return 16; // 1rem для мобильных
}

// Расчет точной ширины карточек
function calculateCardWidth() {
    const reviewsContainer = document.querySelector('.reviews-container');
    if (!reviewsContainer) return 0;
    
    const containerWidth = reviewsContainer.offsetWidth;
    const visibleSlides = getVisibleSlides();
    const gap = getGapSize();
    
    // Для мобильных устройств делаем карточку на всю ширину контейнера
    if (visibleSlides === 1) {
        return containerWidth; // Полная ширина для мобильных
    }
    
    // Общая ширина всех gap'ов между видимыми карточками
    const totalGapWidth = (visibleSlides - 1) * gap;
    
    // Ширина одной карточки
    const cardWidth = (containerWidth - totalGapWidth) / visibleSlides;
    
    console.log(`Расчет размеров: контейнер ${containerWidth}px, ${visibleSlides} карточек, gap ${gap}px, ширина карточки ${cardWidth}px`);
    
    return Math.floor(cardWidth);
}

// Расчет одинаковой высоты для всех карточек
function calculateCardHeight() {
    const reviewCards = document.querySelectorAll('.review-card');
    if (!reviewCards.length) return 0;
    
    // Сначала сбрасываем высоту всех карточек
    reviewCards.forEach(card => {
        card.style.height = 'auto';
    });
    
    // Находим максимальную высоту
    let maxHeight = 0;
    reviewCards.forEach(card => {
        const cardHeight = card.offsetHeight;
        if (cardHeight > maxHeight) {
            maxHeight = cardHeight;
        }
    });
    
    console.log(`Максимальная высота карточки: ${maxHeight}px`);
    return maxHeight;
}

// Применение размеров к карточкам
function applyCardSizes() {
    const reviewCards = document.querySelectorAll('.review-card');
    const reviewsContainer = document.querySelector('.reviews-container');
    
    if (!reviewCards.length || !reviewsContainer) return;
    
    const cardWidth = calculateCardWidth();
    const gap = getGapSize();
    
    // Применяем ширину к каждой карточке
    reviewCards.forEach(card => {
        card.style.width = `${cardWidth}px`;
        card.style.minWidth = `${cardWidth}px`;
        card.style.maxWidth = `${cardWidth}px`;
    });
    
    // Устанавливаем gap для контейнера
    reviewsContainer.style.gap = `${gap}px`;
    
    // Небольшая задержка для пересчета высоты после применения ширины
    setTimeout(() => {
        const cardHeight = calculateCardHeight();
        
        // Применяем одинаковую высоту ко всем карточкам
        reviewCards.forEach(card => {
            card.style.height = `${cardHeight}px`;
        });
        
        console.log(`Применены размеры: ${reviewCards.length} карточек ${cardWidth}px x ${cardHeight}px с gap ${gap}px`);
    }, 10);
}

// Функция переключения слайдов
function slideReviews(direction) {
    const reviewsContainer = document.querySelector('.reviews-container');
    const reviewCards = document.querySelectorAll('.review-card');
    
    if (!reviewsContainer || reviewCards.length === 0) return;
    
    totalSlides = reviewCards.length;
    visibleSlides = getVisibleSlides();
    
    currentSlide += direction;
    
    // Ограничения для слайдов
    const maxSlide = Math.max(0, totalSlides - visibleSlides);
    
    if (currentSlide < 0) {
        currentSlide = 0;
    } else if (currentSlide > maxSlide) {
        currentSlide = maxSlide;
    }
    
    updateSliderPosition();
    updateControls();
}

// Обновление позиции слайдера
function updateSliderPosition() {
    const reviewsContainer = document.querySelector('.reviews-container');
    const reviewCards = document.querySelectorAll('.review-card');
    
    if (!reviewsContainer || reviewCards.length === 0) return;
    
    const visibleSlides = getVisibleSlides();
    
    // Для мобильных устройств (1 отзыв) используем простое позиционирование
    if (visibleSlides === 1) {
        const cardWidth = reviewCards[0].offsetWidth;
        const gap = getGapSize();
        const offset = -currentSlide * (cardWidth + gap);
        reviewsContainer.style.transform = `translateX(${offset}px)`;
        console.log(`Мобильное позиционирование: слайд ${currentSlide}, смещение ${offset}px`);
        return;
    }
    
    // Для больших экранов используем рассчитанную ширину
    const cardWidth = calculateCardWidth();
    const gap = getGapSize();
    const slideWidth = cardWidth + gap;
    const offset = -currentSlide * slideWidth;
    
    reviewsContainer.style.transform = `translateX(${offset}px)`;
    
    console.log(`Позиционирование: слайд ${currentSlide}, смещение ${offset}px`);
}

// Обновление состояния кнопок управления
function updateControls() {
    const prevBtn = document.querySelector('.review-btn-prev');
    const nextBtn = document.querySelector('.review-btn-next');
    
    if (!prevBtn || !nextBtn) return;
    
    const maxSlide = Math.max(0, totalSlides - visibleSlides);
    
    // Обновляем кнопку "Назад"
    prevBtn.disabled = currentSlide <= 0;
    prevBtn.style.opacity = prevBtn.disabled ? '0.3' : '1';
    
    // Обновляем кнопку "Вперед"
    nextBtn.disabled = currentSlide >= maxSlide;
    nextBtn.style.opacity = nextBtn.disabled ? '0.3' : '1';
}

// Инициализация слайдера отзывов
function initReviewsSlider() {
    const reviewsContainer = document.querySelector('.reviews-container');
    const reviewCards = document.querySelectorAll('.review-card');
    
    if (!reviewsContainer || reviewCards.length === 0) {
        console.log('Элементы слайдера отзывов не найдены');
        return;
    }
    
    totalSlides = reviewCards.length;
    visibleSlides = getVisibleSlides();
    currentSlide = 0;
    
    // Применяем точные размеры
    applyCardSizes();
    
    // Обновляем позицию и кнопки
    updateSliderPosition();
    updateControls();
    
    // Добавляем обработчики для кнопок
    const prevBtn = document.querySelector('.review-btn-prev');
    const nextBtn = document.querySelector('.review-btn-next');
    
    if (prevBtn) {
        // Удаляем старые обработчики
        const newPrevBtn = prevBtn.cloneNode(true);
        prevBtn.parentNode.replaceChild(newPrevBtn, prevBtn);
        
        newPrevBtn.addEventListener('click', (e) => {
            e.preventDefault();
            if (!newPrevBtn.disabled) {
                slideReviews(-1);
            }
        });
    }
    
    if (nextBtn) {
        // Удаляем старые обработчики
        const newNextBtn = nextBtn.cloneNode(true);
        nextBtn.parentNode.replaceChild(newNextBtn, nextBtn);
        
        newNextBtn.addEventListener('click', (e) => {
            e.preventDefault();
            if (!newNextBtn.disabled) {
                slideReviews(1);
            }
        });
    }
    
    console.log(`Слайдер отзывов инициализирован: ${totalSlides} отзывов, ${visibleSlides} видимых`);
}

// Обработка изменения размера окна
window.addEventListener('resize', () => {
    const newVisibleSlides = getVisibleSlides();
    
    // Пересчитываем размеры при изменении экрана
    applyCardSizes();
    
    if (newVisibleSlides !== visibleSlides) {
        visibleSlides = newVisibleSlides;
        
        // Проверяем, не выходит ли текущая позиция за границы
        const maxSlide = Math.max(0, totalSlides - visibleSlides);
        if (currentSlide > maxSlide) {
            currentSlide = maxSlide;
        }
        
        updateSliderPosition();
        updateControls();
    } else {
        // Просто обновляем позицию с новыми размерами
        updateSliderPosition();
    }
});

// Инициализация слайдера после загрузки DOM
document.addEventListener('DOMContentLoaded', () => {
    // Небольшая задержка чтобы убедиться что все элементы загружены
    setTimeout(() => {
        initReviewsSlider();
    }, 100);
});

// Обработка кнопки "Оставить отзыв"
const btnLeaveReview = document.querySelector('.btn-leave-review');
if (btnLeaveReview) {
    btnLeaveReview.addEventListener('click', function() {
        // Здесь может быть модальное окно или переход на форму отзыва
        alert('Функция добавления отзыва будет реализована позже!');
    });
} 