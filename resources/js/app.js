
import './bootstrap';
import Typed from 'typed.js';

// Effet "Typing" sur la page d'accueil
document.addEventListener('DOMContentLoaded', () => {
    if (document.getElementById('typing-effect')) {
        new Typed('#typing-effect', {
            strings: [
                'Développeuse Full Stack',
                'Experte Laravel',
                'Fan de Flutter',
                "Créatrice d'API intelligentes"
            ],
            typeSpeed: 50,
            backSpeed: 30,
            loop: true,
            smartBackspace: true,
        });
    }

    // Animation d'apparition au scroll
    const sections = document.querySelectorAll('section');
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-fade-in');
                entry.target.classList.remove('opacity-0');
            }
        });
    }, { threshold: 0.1 });

    sections.forEach(section => {
        if(section.id !== 'home') { // On n'anime pas la première section
            section.classList.add('opacity-0', 'transition-opacity', 'duration-1000');
            observer.observe(section);
        }
    });
});
