// Gestion du slider
let currentSlide = 0;
const slides = document.querySelectorAll('.slider-item');
const dots = document.querySelectorAll('.slider-dot');
const totalSlides = slides.length;

function showSlide(index) {
    // Normaliser l'index
    if (index >= totalSlides) {
        currentSlide = 0;
    } else if (index < 0) {
        currentSlide = totalSlides - 1;
    } else {
        currentSlide = index;
    }

    // Mettre à jour les slides
    slides.forEach((slide, i) => {
        slide.classList.remove('active');
        if (i === currentSlide) {
            slide.classList.add('active');
        }
    });

    // Mettre à jour les dots
    dots.forEach((dot, i) => {
        dot.classList.remove('active');
        if (i === currentSlide) {
            dot.classList.add('active');
        }
    });
}

function nextSlide() {
    showSlide(currentSlide + 1);
}

function prevSlide() {
    showSlide(currentSlide - 1);
}

function goToSlide(index) {
    showSlide(index);
}

// Auto-slide toutes les 6 secondes
const autoSlideInterval = setInterval(() => {
    nextSlide();
}, 6000);

// Pause l'auto-slide au survol du slider
const sliderContainer = document.querySelector('.slider-container');
if (sliderContainer) {
    sliderContainer.addEventListener('mouseenter', () => {
        clearInterval(autoSlideInterval);
    });

    sliderContainer.addEventListener('mouseleave', () => {
        autoSlideInterval = setInterval(() => {
            nextSlide();
        }, 6000);
    });
}

// Navigation au clavier
document.addEventListener('keydown', (e) => {
    if (e.key === 'ArrowRight') nextSlide();
    if (e.key === 'ArrowLeft') prevSlide();
});

// Animations et interactions pour la page de détail du projet
document.addEventListener('DOMContentLoaded', function() {
    // Animation du contenu au chargement
    const projectContent = document.querySelector('.project-content');
    if (projectContent) {
        projectContent.style.opacity = '0';
        projectContent.style.transform = 'translateY(20px)';

        setTimeout(() => {
            projectContent.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            projectContent.style.opacity = '1';
            projectContent.style.transform = 'translateY(0)';
        }, 100);
    }

    // Gestion du clic sur le lien de retour
    const backButton = document.querySelector('.back-button');
    if (backButton) {
        backButton.addEventListener('click', function(e) {
            e.preventDefault();
            history.back();
        });
    }

    // Animation des tags de technologies
    const tags = document.querySelectorAll('.tag');
    tags.forEach((tag, index) => {
        tag.style.animationDelay = `${index * 0.1}s`;
    });

    // Hover effect sur les liens de navigation
    const navLinks = document.querySelectorAll('.nav-prev, .nav-next');
    navLinks.forEach(link => {
        link.addEventListener('mouseenter', function() {
            this.style.transform = 'translateX(' + (this.classList.contains('nav-next') ? '10px' : '-10px') + ')';
        });

        link.addEventListener('mouseleave', function() {
            this.style.transform = 'translateX(0)';
        });
    });

    // Animation au scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -100px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
            }
        });
    }, observerOptions);

    document.querySelectorAll('.section-block, .stat-box, .gallery-item').forEach(el => {
        observer.observe(el);
    });
});

