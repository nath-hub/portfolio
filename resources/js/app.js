import "./bootstrap";
import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";


class VisitorTracker {
    constructor() {
        this.sessionId = this.generateSessionId();
        this.startTime = Date.now();
        this.pageViews = this.getPageViews();
        this.visitorData = {};
        this.cachedLocationData = null; // Cache pour les données de localisation

        this.init();
    }

    // Générer un ID de session unique
    generateSessionId() {
        let sessionId = sessionStorage.getItem('visitor_session_id');
        if (!sessionId) {
            sessionId = 'session_' + Date.now() + '_' + Math.random().toString(36).substr(2, 9);
            sessionStorage.setItem('visitor_session_id', sessionId);
        }
        return sessionId;
    }

    // Compter les pages vues
    getPageViews() {
        let views = parseInt(localStorage.getItem('total_page_views') || '0');
        views++;
        localStorage.setItem('total_page_views', views);
        return views;
    }

    // Détecter le pays via API (gratuit) - avec cache
    async getLocationData() {
        // Retourner le cache si disponible
        if (this.cachedLocationData) {
            return this.cachedLocationData;
        }

        try {
            const response = await fetch('https://ipapi.co/json/');

            // Gestion des erreurs de limite de débit
            if (response.status === 429) {
                console.warn('⚠️ API limite atteinte, utilisation des données par défaut');
                this.cachedLocationData = {
                    country: 'Inconnu',
                    city: 'Inconnu',
                    region: 'Inconnu',
                    ip: 'Inconnu',
                    timezone: 'Inconnu',
                    latitude: null,
                    longitude: null
                };
                return this.cachedLocationData;
            }

            const data = await response.json();
            this.cachedLocationData = {
                country: data.country_name || 'Inconnu',
                city: data.city || 'Inconnu',
                region: data.region || 'Inconnu',
                ip: data.ip || 'Inconnu',
                timezone: data.timezone || 'Inconnu',
                latitude: data.latitude || null,
                longitude: data.longitude || null
            };
            return this.cachedLocationData;
        } catch (error) {
            console.error('Erreur récupération localisation:', error);
            this.cachedLocationData = {
                country: 'Non disponible',
                city: 'Non disponible',
                region: 'Non disponible',
                ip: 'Non disponible'
            };
            return this.cachedLocationData;
        }
    }

    // Détecter le type d'appareil
    getDeviceInfo() {
        const ua = navigator.userAgent;
        let deviceType = 'Desktop';

        if (/(tablet|ipad|playbook|silk)|(android(?!.*mobi))/i.test(ua)) {
            deviceType = 'Tablette';
        } else if (/Mobile|Android|iP(hone|od)|IEMobile|BlackBerry|Kindle|Silk-Accelerated|(hpw|web)OS|Opera M(obi|ini)/.test(ua)) {
            deviceType = 'Mobile';
        }

        // Détecter le système d'exploitation
        let os = 'Inconnu';
        if (ua.indexOf('Win') !== -1) os = 'Windows';
        else if (ua.indexOf('Mac') !== -1) os = 'MacOS';
        else if (ua.indexOf('Linux') !== -1) os = 'Linux';
        else if (ua.indexOf('Android') !== -1) os = 'Android';
        else if (ua.indexOf('iOS') !== -1 || ua.indexOf('iPhone') !== -1 || ua.indexOf('iPad') !== -1) os = 'iOS';

        // Détecter le navigateur
        let browser = 'Inconnu';
        if (ua.indexOf('Firefox') !== -1) browser = 'Firefox';
        else if (ua.indexOf('SamsungBrowser') !== -1) browser = 'Samsung Internet';
        else if (ua.indexOf('Opera') !== -1 || ua.indexOf('OPR') !== -1) browser = 'Opera';
        else if (ua.indexOf('Trident') !== -1) browser = 'Internet Explorer';
        else if (ua.indexOf('Edge') !== -1) browser = 'Edge';
        else if (ua.indexOf('Chrome') !== -1) browser = 'Chrome';
        else if (ua.indexOf('Safari') !== -1) browser = 'Safari';

        return {
            type: deviceType,
            os: os,
            browser: browser,
            screenWidth: window.screen.width,
            screenHeight: window.screen.height,
            viewportWidth: window.innerWidth,
            viewportHeight: window.innerHeight,
            orientation: window.innerWidth > window.innerHeight ? 'Paysage' : 'Portrait',
            touchSupport: 'ontouchstart' in window || navigator.maxTouchPoints > 0,
            userAgent: ua
        };
    }

    // Calculer le temps passé sur la page
    getTimeSpent() {
        const seconds = Math.floor((Date.now() - this.startTime) / 1000);
        const minutes = Math.floor(seconds / 60);
        const remainingSeconds = seconds % 60;

        return {
            totalSeconds: seconds,
            formatted: `${minutes}m ${remainingSeconds}s`,
            minutes: minutes,
            seconds: remainingSeconds
        };
    }

    // Obtenir des infos sur la page actuelle
    getPageInfo() {
        return {
            url: window.location.href,
            path: window.location.pathname,
            title: document.title,
            referrer: document.referrer || 'Direct',
            language: navigator.language || 'Inconnu'
        };
    }

    // Tracker le comportement de scroll
    getScrollBehavior() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        const docHeight = document.documentElement.scrollHeight - window.innerHeight;
        const scrollPercent = docHeight > 0 ? Math.round((scrollTop / docHeight) * 100) : 0;

        return {
            scrollTop: scrollTop,
            scrollPercent: scrollPercent,
            maxScroll: this.maxScroll || 0
        };
    }

    // Afficher toutes les statistiques en console
    async displayStats() {
        console.clear();
        console.log('%c📊 STATISTIQUES DU VISITEUR', 'color: #fa00d9; font-size: 20px; font-weight: bold;');
        console.log('%c━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━', 'color: #6d071a;');

        // 1. Session & Visiteur
        console.log('\n%c🔑 SESSION & VISITEUR', 'color: #009414; font-size: 16px; font-weight: bold;');
        console.log('Session ID:', this.sessionId);
        console.log('Pages vues (total):', this.pageViews);
        console.log('Nouveau visiteur:', this.pageViews === 1 ? 'Oui ✅' : 'Non (récurrent) 🔄');

        // 2. Localisation
        console.log('\n%c🌍 LOCALISATION', 'color: #009414; font-size: 16px; font-weight: bold;');
        const location = await this.getLocationData();
        console.log('Pays:', location.country);
        console.log('Ville:', location.city);
        console.log('Région:', location.region);
        console.log('IP:', location.ip);
        console.log('Timezone:', location.timezone);
        if (location.latitude && location.longitude) {
            console.log('Coordonnées:', `${location.latitude}, ${location.longitude}`);
        }

        // 3. Appareil
        console.log('\n%c💻 APPAREIL & SYSTÈME', 'color: #009414; font-size: 16px; font-weight: bold;');
        const device = this.getDeviceInfo();
        console.log('Type:', device.type);
        console.log('Système:', device.os);
        console.log('Navigateur:', device.browser);
        console.log('Écran:', `${device.screenWidth}x${device.screenHeight}px`);
        console.log('Viewport:', `${device.viewportWidth}x${device.viewportHeight}px`);
        console.log('Orientation:', device.orientation);
        console.log('Tactile:', device.touchSupport ? 'Oui ✅' : 'Non ❌');

        // 4. Page
        console.log('\n%c📄 PAGE ACTUELLE', 'color: #009414; font-size: 16px; font-weight: bold;');
        const page = this.getPageInfo();
        console.log('URL:', page.url);
        console.log('Chemin:', page.path);
        console.log('Titre:', page.title);
        console.log('Référent:', page.referrer);
        console.log('Langue:', page.language);

        // 5. Temps passé
        console.log('\n%c⏱️ TEMPS PASSÉ', 'color: #009414; font-size: 16px; font-weight: bold;');
        const time = this.getTimeSpent();
        console.log('Temps sur la page:', time.formatted);
        console.log('Total secondes:', time.totalSeconds);

        // 6. Comportement de scroll
        console.log('\n%c📜 COMPORTEMENT', 'color: #009414; font-size: 16px; font-weight: bold;');
        const scroll = this.getScrollBehavior();
        console.log('Scroll actuel:', scroll.scrollPercent + '%');
        console.log('Scroll max:', (this.maxScroll || 0) + '%');

        // 7. Date & Heure
        console.log('\n%c🕐 DATE & HEURE', 'color: #009414; font-size: 16px; font-weight: bold;');
        const now = new Date();
        console.log('Date:', now.toLocaleDateString('fr-FR'));
        console.log('Heure:', now.toLocaleTimeString('fr-FR'));
        console.log('Timestamp:', now.getTime());

        console.log('\n%c━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━', 'color: #6d071a;');

        // Stocker les données
        this.visitorData = {
            session: { id: this.sessionId, pageViews: this.pageViews },
            location: location,
            device: device,
            page: page,
            time: time,
            scroll: scroll,
            timestamp: now.toISOString()
        };

        // Retourner l'objet complet
        console.log('\n%c💾 OBJET COMPLET:', 'color: #fa00d9; font-size: 14px; font-weight: bold;');
        console.log(this.visitorData);

        return this.visitorData;
    }

    // Initialiser le tracking
    async init() {
        // Afficher les stats au chargement
        await this.displayStats();

        // Mettre à jour le scroll max
        this.maxScroll = 0;
        window.addEventListener('scroll', () => {
            const scroll = this.getScrollBehavior();
            if (scroll.scrollPercent > this.maxScroll) {
                this.maxScroll = scroll.scrollPercent;
            }
        });

        // Afficher et envoyer les stats toutes les 30 secondes
        setInterval(async () => {
            this.displayStats();
            await this.sendToBackend();
        }, 30000);

        // Envoyer les stats avant de quitter la page
        window.addEventListener('beforeunload', async () => {
            const time = this.getTimeSpent();
            console.log('%c👋 VISITEUR QUITTE LA PAGE', 'color: #fa00d9; font-size: 16px; font-weight: bold;');
            console.log('Temps total passé:', time.formatted);
            console.log('Scroll maximum:', this.maxScroll + '%');

            // Envoyer les données finales au backend
            await this.sendToBackend();
        });

        // Créer une fonction globale pour afficher les stats manuellement
        window.showVisitorStats = () => this.displayStats();
    }

    // Envoyer les données à votre backend (optionnel)
    async sendToBackend() {
        // Construire l'objet de données
        const location = await this.getLocationData();
        const device = this.getDeviceInfo();
        const page = this.getPageInfo();
        const time = this.getTimeSpent();
        const scroll = this.getScrollBehavior();
        const now = new Date();

        const data = {
            session: { id: this.sessionId, pageViews: this.pageViews },
            location: location,
            device: device,
            page: page,
            time: time,
            scroll: scroll,
            timestamp: now.toISOString()
        };

        try {
            const response = await fetch('/api/analytics', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content
                },
                body: JSON.stringify(data)
            });

            if (response.ok) {
                console.log('✅ Données envoyées au serveur');
            } else {
                console.error('❌ Erreur serveur:', response.statusText);
            }
        } catch (error) {
            console.error('❌ Erreur envoi serveur:', error);
        }
    }
}

// ============================================
// INITIALISATION
// ============================================

// Initialiser le tracker dès que la page est chargée
const visitorTracker = new VisitorTracker();

// Commandes disponibles dans la console :
// - showVisitorStats() : Afficher les statistiques manuellement
// - visitorTracker.sendToBackend() : Envoyer les données au serveur

console.log('%c💡 COMMANDES DISPONIBLES:', 'color: #009414; font-size: 14px; font-weight: bold;');
console.log('• showVisitorStats() - Afficher les stats');
console.log('• visitorTracker.sendToBackend() - Envoyer au serveur');











// GSAP Animations
gsap.registerPlugin(ScrollTrigger);

// Loader Animation
window.addEventListener("load", () => {
    gsap.to(".loader", {
        opacity: 0,
        duration: 0.5,
        delay: 1,
        onComplete: () => {
            document.querySelector(".loader").style.display = "none";
        },
    });
});

// Scroll Progress
window.addEventListener("scroll", () => {
    const scrollTop = window.pageYOffset;
    const docHeight =
        document.documentElement.scrollHeight - window.innerHeight;
    const scrollPercent = (scrollTop / docHeight) * 100;
    document.querySelector(".scroll-progress").style.width =
        scrollPercent + "%";
});

// Theme Toggle
const themeToggle = document.querySelector(".theme-toggle");
const body = document.body;

themeToggle.addEventListener("click", () => {
    body.classList.toggle("dark-mode");
    themeToggle.textContent = body.classList.contains("dark-mode")
        ? "☀️"
        : "🌙";
    localStorage.setItem(
        "theme",
        body.classList.contains("dark-mode") ? "dark" : "light",
    );
});

// Load saved theme
const savedTheme = localStorage.getItem("theme");
if (savedTheme === "dark") {
    body.classList.add("dark-mode");
    themeToggle.textContent = "☀️";
}

// Mobile Menu
const burger = document.querySelector(".burger");
const nav = document.querySelector("nav ul");

burger.addEventListener("click", () => {
    burger.classList.toggle("active");
    nav.classList.toggle("active");
});

// Hero Text Animation
gsap.from(".hero-text h1", {
    opacity: 0,
    y: 50,
    duration: 1,
    delay: 1.2,
});

gsap.from(".hero-text p", {
    opacity: 0,
    y: 30,
    duration: 1,
    delay: 1.4,
});

gsap.from(".hero-buttons", {
    opacity: 0,
    y: 30,
    duration: 1,
    delay: 1.6,
});

// Hero Image Animation
gsap.from(".hero-image-wrapper", {
    scale: 0,
    duration: 1,
    delay: 1.3,
    ease: "back.out(1.7)",
});

gsap.from(".floating-icon", {
    scale: 0,
    duration: 0.5,
    delay: 1.8,
    stagger: 0.1,
    ease: "back.out(1.7)",
});

// Floating Animation
gsap.to(".floating-icon", {
    y: -20,
    duration: 2,
    repeat: -1,
    yoyo: true,
    stagger: 0.2,
    ease: "sine.inOut",
});

// Shapes Animation
gsap.to(".shape-1", {
    x: -50,
    y: 50,
    duration: 5,
    repeat: -1,
    yoyo: true,
    ease: "sine.inOut",
});

gsap.to(".shape-2", {
    x: 50,
    y: -50,
    duration: 4,
    repeat: -1,
    yoyo: true,
    ease: "sine.inOut",
});

gsap.to(".shape-3", {
    scale: 1.2,
    duration: 3,
    repeat: -1,
    yoyo: true,
    ease: "sine.inOut",
});

// Stats Counter Animation
const statNumbers = document.querySelectorAll(".stat-number");

const animateCounter = (element) => {
    const target = parseInt(element.getAttribute("data-target"));
    const duration = 2000;
    const increment = target / (duration / 16);
    let current = 0;

    const updateCounter = () => {
        current += increment;
        if (current < target) {
            element.textContent = Math.floor(current) + "+";
            requestAnimationFrame(updateCounter);
        } else {
            element.textContent = target + "+";
        }
    };

    updateCounter();
};

ScrollTrigger.create({
    trigger: ".stats",
    start: "top 80%",
    onEnter: () => {
        statNumbers.forEach((stat) => animateCounter(stat));
    },
    once: true,
});

// Stats Cards Animation
gsap.from(".stat-card", {
    scrollTrigger: {
        trigger: ".stats",
        start: "top 80%",
    },
    y: 50,
    opacity: 0,
    duration: 0.8,
    stagger: 0.2,
});

// CTA Animation
gsap.from(".cta-container", {
    scrollTrigger: {
        trigger: ".cta",
        start: "top 80%",
    },
    scale: 0.9,
    opacity: 0,
    duration: 1,
    ease: "back.out(1.7)",
});

// Smooth Scroll
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute("href"));
        if (target) {
            target.scrollIntoView({
                behavior: "smooth",
            });
        }
    });
});
