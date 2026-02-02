<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau message de contact</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f8fafc;
            color: #020617;
            line-height: 1.6;
        }

        .email-wrapper {
            background: #f8fafc;
            padding: 40px 20px;
            min-height: 100vh;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(250, 0, 217, 0.15);
        }

        /* HEADER */
        .email-header {
            background: linear-gradient(135deg, #fa00d9, #6d071a);
            padding: 40px 30px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .email-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .header-icon {
            font-size: 3rem;
            margin-bottom: 15px;
            display: inline-block;
            position: relative;
            z-index: 2;
        }

        .email-header h1 {
            color: #ffffff;
            font-size: 1.8rem;
            margin-bottom: 8px;
            font-weight: 700;
            position: relative;
            z-index: 2;
            letter-spacing: -0.5px;
        }

        .email-header p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 0.95rem;
            position: relative;
            z-index: 2;
        }

        /* MAIN CONTENT */
        .email-content {
            padding: 40px 30px;
        }

        .greeting {
            color: #6d071a;
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 30px;
        }

        /* INFO SECTION */
        .info-section {
            background: #f8fafc;
            padding: 25px;
            border-radius: 12px;
            margin-bottom: 30px;
            border-left: 4px solid #fa00d9;
        }

        .info-row {
            display: flex;
            margin-bottom: 18px;
            align-items: flex-start;
        }

        .info-row:last-child {
            margin-bottom: 0;
        }

        .info-label {
            color: #6d071a;
            font-weight: 700;
            min-width: 100px;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .info-label::before {
            content: '';
            display: inline-block;
            width: 6px;
            height: 6px;
            background: linear-gradient(135deg, #fa00d9, #6d071a);
            border-radius: 50%;
        }

        .info-value {
            color: #64748b;
            font-size: 0.95rem;
            word-break: break-word;
            flex: 1;
        }

        .info-value a {
            color: #009414;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .info-value a:hover {
            color: #6d071a;
            text-decoration: underline;
        }

        /* MESSAGE SECTION */
        .message-section {
            background: #ffe8fc;
            padding: 25px;
            border-radius: 12px;
            margin-bottom: 30px;
            border-left: 4px solid #009414;
        }

        .message-label {
            color: #6d071a;
            font-weight: 700;
            font-size: 0.95rem;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .message-label::before {
            content: '';
            display: inline-block;
            width: 6px;
            height: 6px;
            background: linear-gradient(135deg, #009414, #00c41d);
            border-radius: 50%;
        }

        .message-content {
            color: #020617;
            font-size: 0.95rem;
            line-height: 1.8;
            white-space: pre-wrap;
            word-wrap: break-word;
        }

        /* DIVIDER */
        .email-divider {
            height: 2px;
            background: linear-gradient(90deg, transparent, #fa00d9, transparent);
            margin: 30px 0;
            opacity: 0.3;
        }

        /* FOOTER */
        .email-footer {
            background: #f8fafc;
            padding: 30px;
            text-align: center;
            border-top: 1px solid #e2e8f0;
        }

        .footer-text {
            color: #64748b;
            font-size: 0.85rem;
            margin-bottom: 15px;
            line-height: 1.6;
        }

        .footer-text strong {
            color: #6d071a;
        }

        .footer-timestamp {
            color: #94a3b8;
            font-size: 0.8rem;
            font-style: italic;
        }

        /* CALL TO ACTION */
        .cta-section {
            background: linear-gradient(135deg, rgba(250, 0, 217, 0.05), rgba(0, 148, 20, 0.05));
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            margin: 30px 0;
        }

        .cta-text {
            color: #020617;
            font-size: 0.9rem;
            margin-bottom: 12px;
        }

        .cta-text strong {
            color: #6d071a;
        }

        /* SOCIAL/CONTACT INFO */
        .contact-info {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            margin: 20px 0;
        }

        .contact-info-title {
            color: #6d071a;
            font-weight: 700;
            font-size: 0.9rem;
            margin-bottom: 12px;
        }

        .contact-links {
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .contact-link {
            color: #009414;
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .contact-link:hover {
            color: #6d071a;
        }

        /* RESPONSIVE */
        @media (max-width: 600px) {
            .email-container {
                border-radius: 0;
            }

            .email-header {
                padding: 30px 20px;
            }

            .email-header h1 {
                font-size: 1.4rem;
            }

            .email-content {
                padding: 25px 20px;
            }

            .info-section,
            .message-section {
                padding: 20px;
            }

            .email-footer {
                padding: 25px 20px;
            }

            .info-row {
                flex-direction: column;
            }

            .info-label {
                min-width: auto;
                margin-bottom: 5px;
            }
        }

        @media (max-width: 480px) {
            .email-wrapper {
                padding: 20px 10px;
            }

            .email-header h1 {
                font-size: 1.2rem;
            }

            .greeting {
                font-size: 1rem;
            }

            .contact-links {
                gap: 8px;
            }

            .contact-link {
                font-size: 0.8rem;
            }
        }
    </style>
</head>

<body>
    <div class="email-wrapper">
        <div class="email-container">
            <!-- HEADER -->
            <div class="email-header">
                <div class="header-icon">📨</div>
                <h1>Nouveau message de contact</h1>
                <p>Vous avez reçu un message via votre formulaire de contact</p>
            </div>

            <!-- CONTENT -->
            <div class="email-content">
                <p class="greeting">Bonjour,</p>

                <!-- INFO SECTION -->
                <div class="info-section">
                    <div class="info-row">
                        <span class="info-label">Nom :</span>
                        <span class="info-value"><?php echo e($data['name']); ?></span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Email :</span>
                        <span class="info-value">
                            <a href="mailto:<?php echo e($data['email']); ?>"><?php echo e($data['email']); ?></a>
                        </span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Sujet :</span>
                        <span class="info-value"><?php echo e($data['subject'] ?? 'Non renseigné'); ?></span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Téléphone :</span>
                        <span class="info-value">
                            <?php if($data['phone']): ?>
                                <a href="tel:<?php echo e($data['phone']); ?>"><?php echo e($data['phone']); ?></a>
                            <?php else: ?>
                                Non renseigné
                            <?php endif; ?>
                        </span>
                    </div>
                </div>

                <!-- MESSAGE SECTION -->
                <div class="message-section">
                    <div class="message-label">Message :</div>
                    <div class="message-content"><?php echo e($data['message']); ?></div>
                </div>

                <div class="email-divider"></div>

                <!-- CTA SECTION -->
                <div class="cta-section">
                    <p class="cta-text">
                        <strong>Prochaine étape :</strong> Répondez à ce message ou contactez directement le visiteur
                        via les informations fournies ci-dessus.
                    </p>
                </div>

                <!-- CONTACT INFO -->
                <div class="contact-info">
                    <div class="contact-info-title">Vos informations de contact</div>
                    <div class="contact-links">
                        <a href="mailto:contact@votresite.com" class="contact-link">Email</a>
                        <a href="tel:+33612345678" class="contact-link">Téléphone</a>
                        <a href="https://votresite.com" class="contact-link">Portfolio</a>
                    </div>
                </div>
            </div>

            <!-- FOOTER -->
            <div class="email-footer">
                <p class="footer-text">
                    Cet email a été envoyé automatiquement depuis votre <strong>formulaire de contact</strong>.
                    Veuillez ne pas répondre directement à cet email, mais plutôt en contactant l'expéditeur via les
                    coordonnées fournies.
                </p>
                <p class="footer-timestamp">
                    📅 Reçu le <?php echo e(now()->format('d/m/Y à H:i')); ?>

                </p>
            </div>
        </div>
    </div>
</body>

</html>
<?php /**PATH D:\sites\portfolio-nathalie\resources\views/emails/contact-message.blade.php ENDPATH**/ ?>