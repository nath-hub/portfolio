const formGroups = document.querySelectorAll(".form-group");

formGroups.forEach((group) => {
    const input = group.querySelector("input, textarea");
    if (input) {
        input.addEventListener("input", function () {
            if (this.value.trim()) {
                group.classList.add("filled");
            } else {
                group.classList.remove("filled");
            }
        });
    }
});

// Gestion du formulaire
const contactForm = document.getElementById("contactForm");
const successMessage = document.getElementById("successMessage");

contactForm.addEventListener("submit", function (e) {
    e.preventDefault();

    // Récupération des données
    const formData = {
        name: document.getElementById("name").value,
        email: document.getElementById("email").value,
        phone: document.getElementById("phone").value,
        subject: document.getElementById("subject").value,
        message: document.getElementById("message").value,
    };

    // Validation simple
    if (
        !formData.name ||
        !formData.email ||
        !formData.subject ||
        !formData.message
    ) {
        alert("Veuillez remplir tous les champs obligatoires");
        return;
    }

    // Validation email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(formData.email)) {
        alert("Veuillez entrer une adresse email valide");
        return;
    }

    // Simulation d'envoi
    const submitBtn = contactForm.querySelector(".btn-submit");
    const originalText = submitBtn.innerHTML;
    submitBtn.disabled = true;
    submitBtn.innerHTML = "<span>Envoi en cours...</span>";

    // Simulation du délai d'envoi
    setTimeout(() => {
        // Affichage du message de succès
        successMessage.classList.add("show");

        // Réinitialisation du formulaire
        contactForm.reset();
        formGroups.forEach((group) => group.classList.remove("filled"));

        // Restauration du bouton
        submitBtn.disabled = false;
        submitBtn.innerHTML = originalText;

        // Masquage du message après 5 secondes
        setTimeout(() => {
            successMessage.classList.remove("show");
        }, 5000);

        // Scroll vers le message de succès
        successMessage.scrollIntoView({ behavior: "smooth", block: "center" });
    }, 1000);
});

// Animation au scroll pour les cartes
const observerOptions = {
    threshold: 0.1,
    rootMargin: "0px 0px -100px 0px",
};

const observer = new IntersectionObserver(function (entries) {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = "1";
            observer.unobserve(entry.target);
        }
    });
}, observerOptions);

document.querySelectorAll(".info-card, .form-section").forEach((el) => {
    observer.observe(el);
});

// Animation ripple au clic du bouton (effet de vague)
const submitBtn = document.querySelector(".btn-submit");
submitBtn.addEventListener("click", function (e) {
    const ripple = document.createElement("span");
    const rect = this.getBoundingClientRect();
    const size = Math.max(rect.width, rect.height);
    const x = e.clientX - rect.left - size / 2;
    const y = e.clientY - rect.top - size / 2;

    ripple.style.width = ripple.style.height = size + "px";
    ripple.style.left = x + "px";
    ripple.style.top = y + "px";
    ripple.classList.add("ripple");

    this.appendChild(ripple);

    setTimeout(() => ripple.remove(), 600);
});
