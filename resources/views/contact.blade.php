<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Nous Joindre</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
        }

        header {
            background: linear-gradient(135deg, #e91e63 0%, #4caf50 100%);
            color: white;
            padding: 2rem 0;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        header h1 {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }

        header p {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .section {
            padding: 3rem 0;
        }

        .section-title {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 2rem;
            color: #e91e63;
        }

        /* Localisation */
        .location-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .location-card {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            border-left: 4px solid #4caf50;
            transition: transform 0.3s;
        }

        .location-card:hover {
            transform: translateY(-5px);
        }

        .location-card h3 {
            color: #e91e63;
            margin-bottom: 1rem;
        }

        .location-card p {
            margin: 0.5rem 0;
            color: #666;
        }

        /* Formulaire */
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #4caf50;
            font-weight: bold;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 0.8rem;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            transition: border-color 0.3s;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #e91e63;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 150px;
        }

        .submit-btn {
            background: linear-gradient(135deg, #e91e63 0%, #4caf50 100%);
            color: white;
            padding: 1rem 2rem;
            border: none;
            border-radius: 5px;
            font-size: 1.1rem;
            cursor: pointer;
            width: 100%;
            transition: opacity 0.3s;
        }

        .submit-btn:hover {
            opacity: 0.9;
        }

        /* Réseaux sociaux */
        .social-section {
            background: linear-gradient(135deg, #f8bbd0 0%, #c8e6c9 100%);
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 2rem;
            flex-wrap: wrap;
            margin-top: 2rem;
        }

        .social-link {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-decoration: none;
            color: #333;
            transition: transform 0.3s;
        }

        .social-link:hover {
            transform: scale(1.1);
        }

        .social-icon {
            width: 60px;
            height: 60px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .facebook { color: #3b5998; }
        .twitter { color: #1da1f2; }
        .instagram { color: #e1306c; }
        .linkedin { color: #0077b5; }

        /* Footer */
        footer {
            background: #333;
            color: white;
            text-align: center;
            padding: 2rem 0;
        }

        footer p {
            margin: 0.5rem 0;
        }

        footer a {
            color: #4caf50;
            text-decoration: none;
        }

        footer a:hover {
            color: #e91e63;
        }

        @media (max-width: 768px) {
            header h1 {
                font-size: 2rem;
            }

            .section-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container">
            <h1>Contactez-Nous</h1>
            <p>Nous sommes là pour vous aider</p>
        </div>
    </header>

    <!-- Localisation -->
    <section class="section">
        <div class="container">
            <h2 class="section-title">📍 Notre Localisation</h2>
            <div class="location-grid">
                <div class="location-card">
                    <h3>Bureau Principal</h3>
                    <p><strong>Adresse:</strong> 123 Avenue des Champs</p>
                    <p><strong>Ville:</strong> Paris, 75008</p>
                    <p><strong>Téléphone:</strong> +33 1 23 45 67 89</p>
                    <p><strong>Email:</strong> contact@entreprise.fr</p>
                </div>
                <div class="location-card">
                    <h3>Horaires d'Ouverture</h3>
                    <p><strong>Lundi - Vendredi:</strong> 9h00 - 18h00</p>
                    <p><strong>Samedi:</strong> 10h00 - 16h00</p>
                    <p><strong>Dimanche:</strong> Fermé</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Formulaire de Contact -->
    <section class="section">
        <div class="container">
            <h2 class="section-title">✉️ Envoyez-nous un Message</h2>
            <div class="form-container">
                <form id="contactForm">
                    <div class="form-group">
                        <label for="name">Nom complet</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Téléphone</label>
                        <input type="tel" id="phone" name="phone">
                    </div>
                    <div class="form-group">
                        <label for="subject">Sujet</label>
                        <input type="text" id="subject" name="subject" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" required></textarea>
                    </div>
                    <button type="submit" class="submit-btn">Envoyer le Message</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Réseaux Sociaux -->
    <section class="section social-section">
        <div class="container">
            <h2 class="section-title">🌐 Suivez-Nous</h2>
            <div class="social-links">
                <a href="#" class="social-link">
                    <div class="social-icon facebook">f</div>
                    <span>Facebook</span>
                </a>
                <a href="#" class="social-link">
                    <div class="social-icon twitter">𝕏</div>
                    <span>Twitter</span>
                </a>
                <a href="#" class="social-link">
                    <div class="social-icon instagram">📷</div>
                    <span>Instagram</span>
                </a>
                <a href="#" class="social-link">
                    <div class="social-icon linkedin">in</div>
                    <span>LinkedIn</span>
                </a>


            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>&copy; 2026 Nathalie Taffot. Tous droits réservés.</p>
            <p>Design avec 💚 et 💖</p>
        </div>
    </footer>

    <script>
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Merci pour votre message ! Nous vous répondrons dans les plus brefs délais.');
            this.reset();
        });
    </script>
</body>
</html>
