<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio Premium - Développeur Full Stack</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;900&family=Inter:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #6D071A;
            --accent: #6D071A;
            --secondary: #009414;
            --bg-light: #F8FAFC;
            --bg-gray: #ffe8fc;
            --text-dark: #020617;
            --text-muted: #64748b;
            --white: #ffffff;
            --gradient-1: linear-gradient(135deg, #fa00d9, #6D071A);
            --gradient-2: linear-gradient(135deg, #009414, #00c41d);
            --shadow-sm: 0 2px 8px rgba(250, 0, 217, 0.1);
            --shadow-md: 0 4px 20px rgba(250, 0, 217, 0.15);
            --shadow-lg: 0 10px 40px rgba(250, 0, 217, 0.2);
        }

        body {
            font-family: 'Times New Roman', 'Inter', sans-serif;
            background: var(--bg-light);
            color: var(--text-dark);
            overflow-x: hidden;
            line-height: 1.6;
        }

        body.dark-mode {
            --bg-light: #0f172a;
            --text-dark: #f1f5f9;
            --text-muted: #94a3b8;
            --white: #1e293b;
            --shadow-sm: 0 2px 8px rgba(250, 0, 217, 0.3);
            --shadow-md: 0 4px 20px rgba(250, 0, 217, 0.4);
            --shadow-lg: 0 10px 40px rgba(250, 0, 217, 0.5);
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Poppins', sans-serif;
        }

        /* Loader */
        .loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background: var(--bg-light);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            flex-direction: column;
            gap: 20px;
        }

        .loader-spinner {
            width: 60px;
            height: 60px;
            border: 4px solid rgba(250, 0, 217, 0.1);
            border-top: 4px solid var(--primary);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        .loader-text {
            font-family: 'Poppins', sans-serif;
            font-size: 1.2rem;
            font-weight: 600;
            background: var(--gradient-1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Progress Bar */
        .scroll-progress {
            position: fixed;
            top: 0;
            left: 0;
            width: 0%;
            height: 4px;
            background: var(--gradient-1);
            z-index: 9998;
            transition: width 0.3s ease;
        }

        /* Header */
        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            padding: 0.75rem 5%;
            background: rgba(248, 250, 252, 0.8);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(250, 0, 217, 0.1);
            z-index: 1000;
            transition: all 0.3s ease;
        }

        body.dark-mode header {
            background: rgba(15, 23, 42, 0.8);
        }

        .nav-container {
            max-width: 1000px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-family: 'Poppins', sans-serif;
            font-size: 1.5rem;
            font-weight: 900;
            background: var(--gradient-1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            flex-shrink: 0;
        }

        .logo img {
            width: 100px;
            height: 100px;
            border-radius: 8px;
            object-fit: cover;
            flex-shrink: 0;
            transform: scale(1.5) translateY(5px);
        }


        nav ul {
            display: flex;
            list-style: none;
            gap: 2.5rem;
            align-items: center;
        }

        nav a {
            color: var(--text-dark);
            text-decoration: none;
            font-weight: 700;
            position: relative;
            transition: color 0.3s ease;
            font-size: 22px;
        }

        nav a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--gradient-1);
            transition: width 0.3s ease;
        }

        nav a:hover::after,
        nav a.active::after {
            width: 100%;
        }

        nav a:hover {
            color: var(--primary);
        }

        .theme-toggle {
            background: none;
            border: 2px solid var(--primary);
            color: var(--primary);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            transition: all 0.3s ease;
        }

        .theme-toggle:hover {
            background: var(--gradient-1);
            color: white;
            transform: rotate(180deg);
        }

        .burger {
            display: none;
            flex-direction: column;
            gap: 5px;
            cursor: pointer;
            z-index: 1001;
        }

        .burger span {
            width: 25px;
            height: 3px;
            background: var(--primary);
            transition: all 0.3s ease;
        }

        .burger.active span:nth-child(1) {
            transform: rotate(45deg) translate(8px, 8px);
        }

        .burger.active span:nth-child(2) {
            opacity: 0;
        }

        .burger.active span:nth-child(3) {
            transform: rotate(-45deg) translate(7px, -7px);
        }

        /* Hero Section */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            padding: 100px 5% 50px;
        }

        .hero-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
        }

        .shape {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.3;
        }

        .shape-1 {
            width: 500px;
            height: 500px;
            background: var(--primary);
            top: -150px;
            right: -150px;
        }

        .shape-2 {
            width: 400px;
            height: 400px;
            background: var(--secondary);
            bottom: -100px;
            left: -100px;
        }

        .shape-3 {
            width: 300px;
            height: 300px;
            background: var(--accent);
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .hero-content {
            max-width: 1400px;
            width: 100%;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
            position: relative;
            z-index: 1;
        }

        .hero-text h1 {
            font-size: 4rem;
            font-weight: 900;
            line-height: 1.1;
            margin-bottom: 1rem;
        }

        .hero-text .gradient-text {
            background: var(--gradient-1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-text p {
            font-size: 1.3rem;
            color: var(--text-muted);
            margin-bottom: 2rem;
            line-height: 1.8;
        }

        .hero-buttons {
            display: flex;
            gap: 1.5rem;
            flex-wrap: wrap;
        }

        .btn {
            padding: 1rem 2.5rem;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 1rem;
        }

        .btn-primary {
            background: var(--gradient-1);
            color: white;
            box-shadow: var(--shadow-md);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-lg);
        }

        .btn-secondary {
            background: transparent;
            color: var(--primary);
            border: 2px solid var(--primary);
        }

        .btn-secondary:hover {
            background: var(--gradient-1);
            color: white;
            border-color: transparent;
            transform: translateY(-3px);
        }

        .hero-image {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-image-wrapper {
            width: 400px;
            height: 400px;
            background: var(--gradient-1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            box-shadow: var(--shadow-lg);
        }

        .hero-image-wrapper::before {
            content: '';
            position: absolute;
            width: 420px;
            height: 420px;
            border: 3px solid var(--primary);
            border-radius: 50%;
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
                opacity: 1;
            }

            50% {
                transform: scale(1.1);
                opacity: 0.5;
            }
        }

        .floating-icons {
            position: absolute;
            width: 100%;
            height: 100%;
        }

        .floating-icon {
            position: absolute;
            width: 60px;
            height: 60px;
            background: var(--white);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: var(--shadow-md);
            font-size: 1.8rem;
        }

        .floating-icon:nth-child(1) {
            top: 10%;
            left: -10%;
        }

        .floating-icon:nth-child(2) {
            top: 20%;
            right: -10%;
        }

        .floating-icon:nth-child(3) {
            bottom: 20%;
            left: -5%;
        }

        .floating-icon:nth-child(4) {
            bottom: 10%;
            right: -5%;
        }

        /* Stats Section */
        .stats {
            padding: 5rem 5%;
            background: var(--white);
            position: relative;
        }

        body.dark-mode .stats {
            background: #1e293b;
        }

        .stats-container {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 3rem;
        }

        .stat-card {
            text-align: center;
            padding: 2rem;
        }

        .stat-number {
            font-size: 3.5rem;
            font-weight: 900;
            background: var(--gradient-1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            font-size: 1.1rem;
            color: var(--text-muted);
            font-weight: 500;
        }

        /* CTA Section */
        .cta {
            padding: 8rem 5%;
            text-align: center;
        }

        .cta-container {
            max-width: 800px;
            margin: 0 auto;
            background: var(--white);
            padding: 4rem;
            border-radius: 30px;
            box-shadow: var(--shadow-lg);
            position: relative;
            overflow: hidden;
        }

        body.dark-mode .cta-container {
            background: #1e293b;
        }

        .cta-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: var(--gradient-1);
        }

        .cta h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .cta p {
            font-size: 1.2rem;
            color: var(--text-muted);
            margin-bottom: 2rem;
        }

        /* Footer */
        footer {
            background: var(--bg-gray);
            padding: 3rem 5%;
            border-top: 1px solid rgba(250, 0, 217, 0.1);
        }

        body.dark-mode footer {
            background: #1e293b;
        }

        .footer-container {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 2rem;
        }

        .social-links {
            display: flex;
            gap: 1rem;
        }

        .social-link {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: var(--bg-light);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            text-decoration: none;
            font-size: 1.2rem;
            transition: all 0.3s ease;
        }

        .social-link:hover {
            background: var(--gradient-1);
            color: white;
            transform: translateY(-3px);
        }

        .social-link img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
            display: block;
        }

        /* Responsive */
        @media (max-width: 968px) {
            nav ul {
                position: fixed;
                top: 0;
                right: -100%;
                width: 300px;
                height: 100vh;
                background: var(--white);
                flex-direction: column;
                padding: 100px 40px;
                box-shadow: -5px 0 20px rgba(0, 0, 0, 0.1);
                transition: right 0.3s ease;
            }

            nav ul.active {
                right: 0;
            }

            .burger {
                display: flex;
            }

            .hero-content {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .hero-text h1 {
                font-size: 2.5rem;
            }

            .hero-buttons {
                justify-content: center;
            }

            .hero-image {
                order: -1;
            }

            .stats-container {
                grid-template-columns: repeat(2, 1fr);
            }

            .hero-image-wrapper {
                width: 300px;
                height: 300px;
            }
        }

        @media (max-width: 576px) {
            .hero-text h1 {
                font-size: 2rem;
            }

            .hero-text p {
                font-size: 1rem;
            }

            .stats-container {
                grid-template-columns: 1fr;
            }

            .stat-number {
                font-size: 2.5rem;
            }

            .cta-container {
                padding: 2rem;
            }

            .cta h2 {
                font-size: 1.8rem;
            }
        }
    </style>
</head>

<body>
    <!-- Loader -->
    <div class="loader">
        <div class="loader-spinner"></div>
        <div class="loader-text">Chargement...</div>
    </div>

    <!-- Scroll Progress -->
    <div class="scroll-progress"></div>

    <!-- Header -->
    <header>
        <div class="nav-container">
            <a href="/" class="logo">
                <img src="/logo1.png" alt="Nathalie Taffot">
            </a>
            <nav>
                <ul>
                    <li><a href="/" class="active">Accueil</a></li>
                    <li><a href="projects">Projets</a></li>
                    <li><a href="cv">CV</a></li>
                    <li><a href="formation">Formation</a></li>
                    <li><a href="contact">Contact</a></li>
                </ul>
            </nav>
            <button class="theme-toggle" aria-label="Toggle theme">🌙</button>
            <div class="burger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-background">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
            <div class="shape shape-3"></div>
        </div>

        <div class="hero-content">
            <div class="hero-text">
                <h1>
                    Bonjour, je suis<br>
                    <span class="gradient-text">Développeur Full Stack</span>
                </h1>
                <p>
                    En tant que professionnelle passionnée et motivée, j'essaie toujours d'améliorer ma technique,
                    d'étendre mon champ de compétences et de trouver de nouvelles opportunités de développement.
                    Tous mes projets, aussi bien individuels que collaboratifs, m'ont permis de progresser et d'établir
                    mon activité dans ce secteur très compétitif.
                    Consultez mon portfolio et n'hésitez pas à me contacter si vous avez des questions.
                </p>
                <div class="hero-buttons">
                    <a href="projects.html" class="btn btn-primary">
                        Voir mes projets →
                    </a>
                    <a href="contact.html" class="btn btn-secondary">
                        Me contacter
                    </a>
                </div>
            </div>

            <div class="hero-image">
                <div class="hero-image-wrapper">
                    <div style="font-size: 8rem;">👨‍💻</div>
                </div>
                <div class="floating-icons">
                    <div class="floating-icon">⚛️</div>
                    <div class="floating-icon">🎨</div>
                    <div class="floating-icon">💻</div>
                    <div class="floating-icon">🚀</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats">
        <div class="stats-container">
            <div class="stat-card">
                <div class="stat-number" data-target="10">0</div>
                <div class="stat-label">Projets réalisés</div>
            </div>
            <div class="stat-card">
                <div class="stat-number" data-target="6">0</div>
                <div class="stat-label">Clients satisfaits</div>
            </div>
            <div class="stat-card">
                <div class="stat-number" data-target="8">0</div>
                <div class="stat-label">Années d'expérience</div>
            </div>
            <div class="stat-card">
                <div class="stat-number" data-target="5">0</div>
                <div class="stat-label">Technologies maîtrisées</div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta">
        <div class="cta-container">
            <h2>Prêt à démarrer un projet ?</h2>
            <p>Discutons de votre prochain projet et créons quelque chose d'extraordinaire ensemble.</p>
            <a href="contact" class="btn btn-primary">Démarrer un projet →</a>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-container">
            <p>&copy; 2026 Nathalie Taffot. Tous droits réservés.</p>
            <div class="social-links">
                <a href="https://github.com/nath-hub" class="social-link" aria-label="GitHub">
                    <img src="/github.png" alt="GitHub">
                </a>
                <a href="https://linkedin.com/in/nathalie-taffot-0b6b931b4/" class="social-link" aria-label="LinkedIn">
                    <img src="/linkedlin.png" alt="LinkedIn">
                </a>
                <a href="#" class="social-link" aria-label="Twitter">
                    <img src="/twitter.png" alt="Twitter">
                </a>
                <a href="mailto:floretaffot@gmail.com" class="social-link" aria-label="Gmail">
                    <img src="/gmail.webp" alt="Gmail">
                </a>

                <a href="tel:+237677851618">Tel: 677851619</a>
            </div>
        </div>
    </footer>

    <script>
        // GSAP Animations
        gsap.registerPlugin(ScrollTrigger);

        // Loader Animation
        window.addEventListener('load', () => {
            gsap.to('.loader', {
                opacity: 0,
                duration: 0.5,
                delay: 1,
                onComplete: () => {
                    document.querySelector('.loader').style.display = 'none';
                }
            });
        });

        // Scroll Progress
        window.addEventListener('scroll', () => {
            const scrollTop = window.pageYOffset;
            const docHeight = document.documentElement.scrollHeight - window.innerHeight;
            const scrollPercent = (scrollTop / docHeight) * 100;
            document.querySelector('.scroll-progress').style.width = scrollPercent + '%';
        });

        // Theme Toggle
        const themeToggle = document.querySelector('.theme-toggle');
        const body = document.body;

        themeToggle.addEventListener('click', () => {
            body.classList.toggle('dark-mode');
            themeToggle.textContent = body.classList.contains('dark-mode') ? '☀️' : '🌙';
            localStorage.setItem('theme', body.classList.contains('dark-mode') ? 'dark' : 'light');
        });

        // Load saved theme
        const savedTheme = localStorage.getItem('theme');
        if (savedTheme === 'dark') {
            body.classList.add('dark-mode');
            themeToggle.textContent = '☀️';
        }

        // Mobile Menu
        const burger = document.querySelector('.burger');
        const nav = document.querySelector('nav ul');

        burger.addEventListener('click', () => {
            burger.classList.toggle('active');
            nav.classList.toggle('active');
        });

        // Hero Text Animation
        gsap.from('.hero-text h1', {
            opacity: 0,
            y: 50,
            duration: 1,
            delay: 1.2
        });

        gsap.from('.hero-text p', {
            opacity: 0,
            y: 30,
            duration: 1,
            delay: 1.4
        });

        gsap.from('.hero-buttons', {
            opacity: 0,
            y: 30,
            duration: 1,
            delay: 1.6
        });

        // Hero Image Animation
        gsap.from('.hero-image-wrapper', {
            scale: 0,
            duration: 1,
            delay: 1.3,
            ease: 'back.out(1.7)'
        });

        gsap.from('.floating-icon', {
            scale: 0,
            duration: 0.5,
            delay: 1.8,
            stagger: 0.1,
            ease: 'back.out(1.7)'
        });

        // Floating Animation
        gsap.to('.floating-icon', {
            y: -20,
            duration: 2,
            repeat: -1,
            yoyo: true,
            stagger: 0.2,
            ease: 'sine.inOut'
        });

        // Shapes Animation
        gsap.to('.shape-1', {
            x: -50,
            y: 50,
            duration: 5,
            repeat: -1,
            yoyo: true,
            ease: 'sine.inOut'
        });

        gsap.to('.shape-2', {
            x: 50,
            y: -50,
            duration: 4,
            repeat: -1,
            yoyo: true,
            ease: 'sine.inOut'
        });

        gsap.to('.shape-3', {
            scale: 1.2,
            duration: 3,
            repeat: -1,
            yoyo: true,
            ease: 'sine.inOut'
        });

        // Stats Counter Animation
        const statNumbers = document.querySelectorAll('.stat-number');

        const animateCounter = (element) => {
            const target = parseInt(element.getAttribute('data-target'));
            const duration = 2000;
            const increment = target / (duration / 16);
            let current = 0;

            const updateCounter = () => {
                current += increment;
                if (current < target) {
                    element.textContent = Math.floor(current) + '+';
                    requestAnimationFrame(updateCounter);
                } else {
                    element.textContent = target + '+';
                }
            };

            updateCounter();
        };

        ScrollTrigger.create({
            trigger: '.stats',
            start: 'top 80%',
            onEnter: () => {
                statNumbers.forEach(stat => animateCounter(stat));
            },
            once: true
        });

        // Stats Cards Animation
        gsap.from('.stat-card', {
            scrollTrigger: {
                trigger: '.stats',
                start: 'top 80%'
            },
            y: 50,
            opacity: 0,
            duration: 0.8,
            stagger: 0.2
        });

        // CTA Animation
        gsap.from('.cta-container', {
            scrollTrigger: {
                trigger: '.cta',
                start: 'top 80%'
            },
            scale: 0.9,
            opacity: 0,
            duration: 1,
            ease: 'back.out(1.7)'
        });

        // Smooth Scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
</body>

</html>
