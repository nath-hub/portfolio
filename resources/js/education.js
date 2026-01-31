  const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -100px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        document.querySelectorAll(
            '.timeline-item, .formation-card, .stat-card, .competence-item'
        ).forEach(el => {
            observer.observe(el);
        });

        // Animation des nombres dans les statistiques
        const statNumbers = document.querySelectorAll('.stat-number');

        const animateNumbers = (element) => {
            const text = element.textContent;
            const number = parseInt(text);
            let current = 0;
            const increment = Math.ceil(number / 30);

            const timer = setInterval(() => {
                current += increment;
                if (current >= number) {
                    element.textContent = text;
                    clearInterval(timer);
                } else {
                    element.textContent = current + '+';
                }
            }, 30);
        };

        // Déclencher l'animation au scroll
        const statsObserver = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting && !entry.target.dataset.animated) {
                    entry.target.dataset.animated = 'true';
                    animateNumbers(entry.target);
                    statsObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        statNumbers.forEach(el => statsObserver.observe(el));

        // Animation au hover des markers timeline
        document.querySelectorAll('.timeline-marker').forEach(marker => {
            marker.addEventListener('mouseenter', function() {
                this.style.animation = 'pulse 0.6s ease-out';
            });
        });
