<?php $__env->startSection('title', 'Contact - Nathalie Taffot'); ?>

<?php $__env->startPush('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/contact.css']); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/js/contact.js']); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Localisation -->
     <section class="contact-page">
        <!-- HERO SECTION -->
        <div class="hero-section">
            <div class="profile-container">
                <div class="profile-image">
                    <img src="<?php echo e(asset('logo1.png')); ?>" alt="Votre Portrait">
                </div>
            </div>
            <h1>Parlons de votre projet</h1>
            <p class="subtitle">Développeur Full Stack | 7 ans d'expérience</p>
            <p>Je suis passionné par la création de solutions web innovantes et performantes. Que vous ayez un projet en tête ou simplement envie de discuter, je serais ravi de vous entendre.</p>
        </div>

        <!-- INFO CARDS -->
        <div class="info-cards">
            <div class="info-card">
                <div class="card-icon">
                    <i class="fas fa-phone"></i>
                </div>
                <div class="card-title">Téléphone</div>
                <div class="card-content">
                    <a href="tel:+33612345678">+33 6 12 34 56 78</a>
                </div>
            </div>

            <div class="info-card">
                <div class="card-icon">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div class="card-title">Localisation</div>
                <div class="card-content">
                    Yaoundé, Cameroun
                </div>
            </div>

            <div class="info-card">
                <div class="card-icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="card-title">Email</div>
                <div class="card-content">
                    <a href="mailto:contact@votresite.com">contact@votresite.com</a>
                </div>
            </div>
        </div>

        <!-- FORMULAIRE -->
        <div class="form-section">
            <h2>Envoyer un message</h2>
            <p class="form-subtitle">Remplissez le formulaire ci-dessous et je vous répondrai au plus tôt</p>

            <div class="success-message" id="successMessage">
                ✓ Merci ! Votre message a été envoyé avec succès. Je vous répondrai rapidement.
            </div>

            <form id="contactForm">
                <div class="form-row">
                    <div class="form-group">
                        <input type="text" id="name" name="name" placeholder="Votre nom" required>
                        <label for="name">Nom complet *</label>
                    </div>
                    <div class="form-group">
                        <input type="email" id="email" name="email" placeholder="votre.email@example.com" required>
                        <label for="email">Adresse email *</label>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <input type="tel" id="phone" name="phone" placeholder="+33 6 12 34 56 78">
                        <label for="phone">Numéro de téléphone</label>
                    </div>
                    <div class="form-group">
                        <input type="text" id="subject" name="subject" placeholder="Objet de votre demande" required>
                        <label for="subject">Sujet *</label>
                    </div>
                </div>

                <div class="form-group">
                    <textarea id="message" name="message" placeholder="Décrivez votre projet, vos besoins..." required></textarea>
                    <label for="message">Message *</label>
                </div>

                <div class="form-group submit">
                    <button type="submit" class="btn-submit">
                        <span>Envoyer mon message</span>
                    </button>
                </div>
            </form>
        </div>
    </section>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\sites\portfolio-nathalie\resources\views\contact.blade.php ENDPATH**/ ?>