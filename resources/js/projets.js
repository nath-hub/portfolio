const projects = [
    {
        title: "Lecture Facile",
        description:
            "Application de gestion de projets avec collaboration en temps réel, tableaux Kanban avancés et analytics.",
        image: "https://images.unsplash.com/photo-1611224923853-80b023f02d71?w=800&h=600&fit=crop",
        tags: ["SaaS", "Featured"],
        category: "saas",
        tech: ["React", "Node", "MongoDB", "WebSocket"],
    },
    {
        title: "Bill'lib",
        description:
            "Plateforme e-commerce complète avec système de paiement, gestion des stocks et tableau de bord vendeur.",
        image: "https://images.unsplash.com/photo-1557821552-17105176677c?w=800&h=600&fit=crop",
        tags: ["E-commerce", "Featured"],
        category: "ecommerce",
        tech: ["Vue", "Laravel", "Stripe", "MySQL"],
    },
    {
        title: "Hotel Booking",
        description:
            "Application mobile de suivi de santé avec synchronisation cloud, graphiques et rappels intelligents.",
        image: "https://images.unsplash.com/photo-1576091160550-2173dba999ef?w=800&h=600&fit=crop",
        tags: ["Mobile", "Health"],
        category: "mobile",
        tech: ["React Native", "Firebase", "Charts"],
    },
    {
        title: "Talma",
        description:
            "Dashboard analytique interactif avec visualisations de données en temps réel et exports personnalisables.",
        image: "https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=800&h=600&fit=crop",
        tags: ["Web App", "Analytics"],
        category: "web",
        tech: ["D3.js", "Python", "PostgreSQL"],
    },
    {
        title: "Tandis",
        description:
            "Application de livraison de repas avec tracking GPS, système de notation et recommandations AI.",
        image: "https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?w=800&h=600&fit=crop",
        tags: ["Mobile", "Featured"],
        category: "mobile",
        tech: ["Flutter", "Node", "Maps API"],
    },
    {
        title: "Aggregator",
        description:
            "Plateforme de portfolio pour créatifs avec galeries personnalisables et système de réservation.",
        image: "https://images.unsplash.com/photo-1561070791-2526d30994b5?w=800&h=600&fit=crop",
        tags: ["Web App", "Portfolio"],
        category: "web",
        tech: ["Next.js", "Tailwind", "Sanity"],
    },
    {
        title: "Chat",
        description:
            "Application de suivi de cryptomonnaies avec alertes de prix, graphiques avancés et portfolio tracking.",
        image: "https://images.unsplash.com/photo-1621416894569-0f39ed31d247?w=800&h=600&fit=crop",
        tags: ["Web App", "Crypto"],
        category: "web",
        tech: ["React", "Chart.js", "API"],
    },
    {
        title: "Limescribe",
        description:
            "Boutique en ligne haut de gamme avec expérience utilisateur premium et configurateur 3D de produits.",
        image: "https://images.unsplash.com/photo-1441986300917-64674bd600d8?w=800&h=600&fit=crop",
        tags: ["E-commerce", "Luxury"],
        category: "ecommerce",
        tech: ["Three.js", "Shopify", "GSAP"],
    },
    {
        title: "Hablamundo",
        description:
            "App de coaching sportif avec plans d'entraînement personnalisés, vidéos HD et suivi de progression.",
        image: "https://images.unsplash.com/photo-1571019614242-c5c5dee9f50b?w=800&h=600&fit=crop",
        tags: ["Mobile", "Fitness"],
        category: "mobile",
        tech: ["React Native", "Video", "AI"],
    },
    {
        title: "Damam",
        description:
            "Plateforme de gestion d'événements avec billetterie, QR codes et analytics en temps réel.",
        image: "https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=800&h=600&fit=crop",
        tags: ["SaaS", "Events"],
        category: "saas",
        tech: ["Angular", "Express", "QR"],
    },
    {
        title: "Solutravo",
        description:
            "Plateforme e-learning interactive avec cours vidéo, quiz, certificats et communauté d'apprenants.",
        image: "https://images.unsplash.com/photo-1501504905252-473c47e087f8?w=800&h=600&fit=crop",
        tags: ["SaaS", "Education"],
        category: "saas",
        tech: ["Vue", "Django", "WebRTC"],
    },

];

let currentFilter = "all";
let visibleCount = 6;
const incrementCount = 6;

function createProjectCard(project, index) {
    return `
                <div class="project-card" data-category="${project.category}" style="animation-delay: ${index * 0.1}s">
                    <div class="project-image">
                        <img src="${project.image}" alt="${project.title}">
                        <div class="project-overlay">
                            <div class="overlay-content">
                                <h4>Voir le projet</h4>
                                <p>→</p>
                            </div>
                        </div>
                        <div class="project-tags">
                            ${project.tags.map((tag) => `<span class="tag">${tag}</span>`).join("")}
                        </div>
                    </div>
                    <div class="project-content">
                        <h3 class="project-title">${project.title}</h3>
                        <p class="project-description">${project.description}</p>
                        <div class="project-footer">
                            <div class="tech-stack">
                                ${project.tech.map((tech) => `<div class="tech-icon" title="${tech}">${tech.slice(0, 2).toUpperCase()}</div>`).join("")}
                            </div>
                            <button class="view-btn">Voir Plus →</button>
                        </div>
                    </div>
                </div>
            `;
}

function renderProjects() {
    const grid = document.getElementById("projectsGrid");
    const filteredProjects =
        currentFilter === "all"
            ? projects
            : projects.filter((p) => p.category === currentFilter);

    const projectsToShow = filteredProjects.slice(0, visibleCount);
    grid.innerHTML = projectsToShow
        .map((project, index) => createProjectCard(project, index))
        .join("");

    setTimeout(() => {
        document.querySelectorAll(".project-card").forEach((card, index) => {
            setTimeout(() => {
                card.classList.add("show");
            }, index * 100);
        });
    }, 50);

    document.getElementById("currentCount").textContent = projectsToShow.length;
    document.getElementById("totalCount").textContent = filteredProjects.length;

    const loadMoreBtn = document.getElementById("loadMoreBtn");
    if (projectsToShow.length >= filteredProjects.length) {
        loadMoreBtn.style.display = "none";
    } else {
        loadMoreBtn.style.display = "inline-block";
    }
}

// Filtres
document.querySelectorAll(".filter-btn").forEach((btn) => {
    btn.addEventListener("click", () => {
        document
            .querySelectorAll(".filter-btn")
            .forEach((b) => b.classList.remove("active"));
        btn.classList.add("active");
        currentFilter = btn.getAttribute("data-filter");
        visibleCount = 6;
        renderProjects();
    });
});

// Charger plus
document.getElementById("loadMoreBtn").addEventListener("click", function () {
    visibleCount += incrementCount;
    renderProjects();

    this.style.transform = "scale(0.95)";
    setTimeout(() => {
        this.style.transform = "scale(1)";
    }, 200);
});

// Animation au scroll
const observerOptions = {
    threshold: 0.1,
    rootMargin: "0px 0px -50px 0px",
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = "1";
            entry.target.style.transform = "translateY(0)";
        }
    });
}, observerOptions);

// Parallaxe des cartes au mouvement de la souris
document.addEventListener("mousemove", (e) => {
    const cards = document.querySelectorAll(".project-card");
    const x = e.clientX / window.innerWidth;
    const y = e.clientY / window.innerHeight;

    cards.forEach((card, index) => {
        const speed = ((index % 3) + 1) * 0.5;
        const xMove = (x - 0.5) * speed;
        const yMove = (y - 0.5) * speed;

        if (!card.matches(":hover")) {
            card.style.transform = `translate(${xMove}px, ${yMove}px)`;
        }
    });
});

// Click sur les cartes
document.addEventListener("click", (e) => {
    if (e.target.closest(".project-card")) {
        const card = e.target.closest(".project-card");
        card.style.transform = "scale(0.98)";
        setTimeout(() => {
            card.style.transform = "";
        }, 200);
    }
});

// Initialisation
renderProjects();
