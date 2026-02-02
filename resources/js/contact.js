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

    const submitBtn = contactForm.querySelector(".btn-submit");
    const originalText = submitBtn.innerHTML;

    // On récupère les données du formulaire
    const formData = new FormData(this);

    submitBtn.disabled = true;
    submitBtn.innerHTML = "<span>Envoi en cours...</span>";

    // Envoi via Fetch API vers Laravel
    fetch(window.contactRoute, {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
            Accept: "application/json",
        },
        body: formData,
    })
        .then((response) => response.json().then((data) => ({ ok: response.ok, status: response.status, data })))
        .then(({ ok, status, data }) => {
            if (ok && data.success) {
                // Affichage du message de succès
                successMessage.classList.add("show");

                // Réinitialisation du formulaire
                contactForm.reset();
                formGroups.forEach((group) => group.classList.remove("filled"));

                // Scroll vers le message de succès
                successMessage.scrollIntoView({ behavior: "smooth", block: "center" });

                // Masquage du message après 5 secondes
                setTimeout(() => {
                    successMessage.classList.remove("show");
                }, 5000);
            } else if (status === 422 && data.errors) {
                // Afficher erreurs de validation
                const messages = Object.values(data.errors).flat().join('\n');
                alert("Erreurs de validation:\n" + messages);
            } else {
                console.error("Erreur serveur:", data.message || data);
                alert("Erreur: " + (data.message || "Impossible d'envoyer le message"));
            }
        })
        .catch((error) => {
            console.error("Erreur réseau:", error);
            alert("Erreur lors de l'envoi. Veuillez réessayer.");
        })
        .finally(() => {
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalText;
        });
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
