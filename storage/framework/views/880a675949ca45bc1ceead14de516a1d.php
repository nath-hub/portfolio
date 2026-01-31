<?php $__env->startSection('title', 'À propos - Nathalie'); ?>

<?php $__env->startPush('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/about.css']); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/js/about.js']); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
 <main class="about-section">
        <div class="hero-about">
            <h1>À Propos de Moi</h1>
            <p>Passionné par le développement web et la création d'expériences digitales innovantes</p>
        </div>

        <div class="content-grid">
            <div class="profile-image">
                <img src="https://images.unsplash.com/photo-1549692520-acc6669e2f0c?w=800&h=1000&fit=crop" alt="Photo de profil">
            </div>

            <div class="bio-content">
                <h2>Bonjour !</h2>
                <p>
                    Je suis un <span class="highlight">développeur full-stack</span> passionné par la création d'applications web modernes et performantes. Avec plusieurs années d'expérience, je transforme des idées créatives en solutions digitales concrètes.
                </p>
                <p>
                    Mon parcours m'a permis de maîtriser diverses technologies et frameworks, tout en développant une approche centrée sur l'utilisateur et la qualité du code. Je crois fermement que le <span class="highlight">code propre</span> et les <span class="highlight">bonnes pratiques</span> sont essentiels pour créer des produits durables.
                </p>
                <p>
                    Au-delà du code, j'aime collaborer avec des équipes créatives, apprendre de nouvelles technologies et contribuer à des projets open-source. Mon objectif est de créer des expériences web qui font vraiment la différence.
                </p>
            </div>
        </div>

        <div class="skills-section">
            <h2>Compétences & Technologies</h2>
            <div class="skills-grid">
                <div class="skill-card">
                    <h3>Frontend</h3>
                    <ul class="skill-list">
                        <li>HTML5 / CSS3 / JavaScript</li>
                        <li>React / Vue.js</li>
                        <li>TypeScript</li>
                        <li>Tailwind CSS / SASS</li>
                        <li>Responsive Design</li>
                    </ul>
                </div>

                <div class="skill-card">
                    <h3>Backend</h3>
                    <ul class="skill-list">
                        <li>Node.js / Express</li>
                        <li>Python / Django</li>
                        <li>PHP / Laravel</li>
                        <li>REST API / GraphQL</li>
                        <li>Bases de données SQL/NoSQL</li>
                    </ul>
                </div>

                <div class="skill-card">
                    <h3>Outils & DevOps</h3>
                    <ul class="skill-list">
                        <li>Git / GitHub</li>
                        <li>Docker</li>
                        <li>CI/CD</li>
                        <li>AWS / Heroku</li>
                        <li>Webpack / Vite</li>
                    </ul>
                </div>

                <div class="skill-card">
                    <h3>Design & UX</h3>
                    <ul class="skill-list">
                        <li>Figma / Adobe XD</li>
                        <li>UI/UX Design</li>
                        <li>Prototypage</li>
                        <li>Accessibilité Web</li>
                        <li>Design Systems</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="stats-section">
            <div class="stat-card">
                <div class="stat-number" data-target="50">0</div>
                <div class="stat-label">Projets Réalisés</div>
            </div>
            <div class="stat-card">
                <div class="stat-number" data-target="5">0</div>
                <div class="stat-label">Années d'Expérience</div>
            </div>
            <div class="stat-card">
                <div class="stat-number" data-target="30">0</div>
                <div class="stat-label">Clients Satisfaits</div>
            </div>
            <div class="stat-card">
                <div class="stat-number" data-target="100">0</div>
                <div class="stat-label">Tasses de Café</div>
            </div>
        </div>

        <div class="cta-section">
            <h2>Travaillons Ensemble</h2>
            <p>Vous avez un projet en tête ? Je serais ravi d'en discuter avec vous !</p>
            <a href="<?php echo e(route('contact')); ?>" class="cta-button">Me Contacter</a>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\sites\portfolio-nathalie\resources\views\about.blade.php ENDPATH**/ ?>