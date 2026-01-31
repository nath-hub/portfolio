<?php $__env->startSection('title', 'Parcours - Nathalie'); ?>

<?php $__env->startPush('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/education.css']); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/js/education.js']); ?>
<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>


    <section class="formations-page">
        <!-- HERO SECTION -->
        <div class="hero-section">
            <h1>Mon Parcours Académique</h1>
            <p class="subtitle">7 ans d'expérience et une formation continue</p>
            <p>Découvrez le chemin qui m'a menée à devenir développeur Full Stack. Une formation solide en informatique,
                complétée par des apprentissages pratiques et des certifications spécialisées.</p>
        </div>

        <!-- TIMELINE PARCOURS -->
        <div class="timeline-section">
            <h2 class="timeline-title">Chronologie de mon parcours</h2>
            <div class="timeline-container">
                <div class="timeline-item">
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <div class="timeline-date">
                            <i class="fas fa-calendar"></i>
                            2017 - 2020
                        </div>
                        <div class="timeline-degree">Licence en Informatique</div>
                        <div class="timeline-institution">Université de Yaoundé I</div>
                        <div class="timeline-description">
                            Formation fondamentale en informatique couvrant les algorithmes, les structures de données, et
                            les bases du développement web et desktop.
                        </div>
                        <div class="timeline-skills">
                            <span class="skill-tag">C++</span>
                            <span class="skill-tag">Java</span>
                            <span class="skill-tag">Algorithmes</span>
                            <span class="skill-tag">BD</span>
                        </div>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <div class="timeline-date">
                            <i class="fas fa-calendar"></i>
                            2020 - 2022
                        </div>
                        <div class="timeline-degree">Master en Développement Web</div>
                        <div class="timeline-institution">École Nationale Supérieure Polytechnique</div>
                        <div class="timeline-description">
                            Spécialisation en développement web moderne avec focus sur les architectures scalables et les
                            bonnes pratiques.
                        </div>
                        <div class="timeline-skills">
                            <span class="skill-tag">JavaScript</span>
                            <span class="skill-tag">React</span>
                            <span class="skill-tag">Node.js</span>
                            <span class="skill-tag">MongoDB</span>
                        </div>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <div class="timeline-date">
                            <i class="fas fa-calendar"></i>
                            2022 - 2023
                        </div>
                        <div class="timeline-degree">Bootcamp Intensif Full Stack</div>
                        <div class="timeline-institution">Coding Academy</div>
                        <div class="timeline-description">
                            Programme accéléré de 6 mois couvrant le full stack moderne avec projets réels et préparation au
                            marché du travail.
                        </div>
                        <div class="timeline-skills">
                            <span class="skill-tag">React</span>
                            <span class="skill-tag">Next.js</span>
                            <span class="skill-tag">TypeScript</span>
                            <span class="skill-tag">Docker</span>
                        </div>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <div class="timeline-date">
                            <i class="fas fa-calendar"></i>
                            2023 - Présent
                        </div>
                        <div class="timeline-degree">Formation Continue & Certifications</div>
                        <div class="timeline-institution">Plateformes en ligne</div>
                        <div class="timeline-description">
                            Apprentissage continu des technologies émergentes et amélioration des compétences en
                            architecture logicielle et DevOps.
                        </div>
                        <div class="timeline-skills">
                            <span class="skill-tag">Kubernetes</span>
                            <span class="skill-tag">AWS</span>
                            <span class="skill-tag">GraphQL</span>
                            <span class="skill-tag">AI/ML</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- STATISTIQUES -->
        <div class="stats-section">
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-number">7+</div>
                    <div class="stat-label">Ans d'expérience</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">15+</div>
                    <div class="stat-label">Formations complétées</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">30+</div>
                    <div class="stat-label">Technologies maîtrisées</div>
                </div>
            </div>
        </div>

        <!-- FORMATIONS SPÉCIALISÉES -->
        <div class="formations-grid-section">
            <h2 class="formations-grid-title">Formations et Certifications</h2>
            <div class="formations-grid">
                <div class="formation-card">
                    <div class="formation-header">
                        <div class="formation-icon">
                            <i class="fas fa-laptop-code"></i>
                        </div>
                    </div>
                    <div class="formation-content">
                        <div class="formation-category">Frontend</div>
                        <div class="formation-name">React Advanced</div>
                        <div class="formation-org">Udemy - React Community</div>
                        <div class="formation-details">
                            Maîtrise avancée de React incluant les Hooks, Context API, et patterns modernes.
                        </div>
                        <div class="formation-footer">
                            <div class="formation-badge">Certifié</div>
                            <div class="formation-duration">40h</div>
                        </div>
                    </div>
                </div>

                <div class="formation-card">
                    <div class="formation-header">
                        <div class="formation-icon">
                            <i class="fas fa-server"></i>
                        </div>
                    </div>
                    <div class="formation-content">
                        <div class="formation-category">Backend</div>
                        <div class="formation-name">Node.js & Express</div>
                        <div class="formation-org">Coursera - IBM</div>
                        <div class="formation-details">
                            Développement backend robuste avec Node.js, Express et intégration de bases de données.
                        </div>
                        <div class="formation-footer">
                            <div class="formation-badge">Certifié</div>
                            <div class="formation-duration">50h</div>
                        </div>
                    </div>
                </div>

                <div class="formation-card">
                    <div class="formation-header">
                        <div class="formation-icon">
                            <i class="fas fa-database"></i>
                        </div>
                    </div>
                    <div class="formation-content">
                        <div class="formation-category">Données</div>
                        <div class="formation-name">MongoDB & NoSQL</div>
                        <div class="formation-org">MongoDB University</div>
                        <div class="formation-details">
                            Design et gestion de bases de données NoSQL pour applications modernes et scalables.
                        </div>
                        <div class="formation-footer">
                            <div class="formation-badge">Certifié</div>
                            <div class="formation-duration">35h</div>
                        </div>
                    </div>
                </div>

                <div class="formation-card">
                    <div class="formation-header">
                        <div class="formation-icon">
                            <i class="fas fa-docker"></i>
                        </div>
                    </div>
                    <div class="formation-content">
                        <div class="formation-category">DevOps</div>
                        <div class="formation-name">Docker & Kubernetes</div>
                        <div class="formation-org">Linux Academy</div>
                        <div class="formation-details">
                            Containerisation et orchestration pour déploiements fiables et scalables.
                        </div>
                        <div class="formation-footer">
                            <div class="formation-badge">Certifié</div>
                            <div class="formation-duration">45h</div>
                        </div>
                    </div>
                </div>

                <div class="formation-card">
                    <div class="formation-header">
                        <div class="formation-icon">
                            <i class="fas fa-cloud"></i>
                        </div>
                    </div>
                    <div class="formation-content">
                        <div class="formation-category">Cloud</div>
                        <div class="formation-name">AWS Solutions Architect</div>
                        <div class="formation-org">Amazon Web Services</div>
                        <div class="formation-details">
                            Architecture et déploiement de solutions cloud scalables sur la plateforme AWS.
                        </div>
                        <div class="formation-footer">
                            <div class="formation-badge">Certifié</div>
                            <div class="formation-duration">60h</div>
                        </div>
                    </div>
                </div>

                <div class="formation-card">
                    <div class="formation-header">
                        <div class="formation-icon">
                            <i class="fas fa-brain"></i>
                        </div>
                    </div>
                    <div class="formation-content">
                        <div class="formation-category">IA/ML</div>
                        <div class="formation-name">Machine Learning Basics</div>
                        <div class="formation-org">Stanford Online</div>
                        <div class="formation-details">
                            Introduction au machine learning et applications pratiques en développement.
                        </div>
                        <div class="formation-footer">
                            <div class="formation-badge">Certifié</div>
                            <div class="formation-duration">55h</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- COMPÉTENCES PAR DOMAINE -->
        <div class="competences-section">
            <h2 class="competences-title">Compétences Acquises</h2>

            <div class="competence-item">
                <div class="competence-header">
                    <div class="competence-icon">
                        <i class="fas fa-paint-brush"></i>
                    </div>
                    <div class="competence-title">Frontend</div>
                </div>
                <div class="competence-skills">
                    <span class="competence-skill">HTML5</span>
                    <span class="competence-skill">CSS3</span>
                    <span class="competence-skill">JavaScript (ES6+)</span>
                    <span class="competence-skill">React</span>
                    <span class="competence-skill">Vue.js</span>
                    <span class="competence-skill">TypeScript</span>
                    <span class="competence-skill">Tailwind CSS</span>
                    <span class="competence-skill">Responsive Design</span>
                </div>
            </div>

            <div class="competence-item">
                <div class="competence-header">
                    <div class="competence-icon">
                        <i class="fas fa-cogs"></i>
                    </div>
                    <div class="competence-title">Backend</div>
                </div>
                <div class="competence-skills">
                    <span class="competence-skill">Node.js</span>
                    <span class="competence-skill">Express.js</span>
                    <span class="competence-skill">Python</span>
                    <span class="competence-skill">Django</span>
                    <span class="competence-skill">RESTful APIs</span>
                    <span class="competence-skill">GraphQL</span>
                    <span class="competence-skill">Authentication</span>
                    <span class="competence-skill">Sécurité Web</span>
                </div>
            </div>

            <div class="competence-item">
                <div class="competence-header">
                    <div class="competence-icon">
                        <i class="fas fa-database"></i>
                    </div>
                    <div class="competence-title">Bases de Données</div>
                </div>
                <div class="competence-skills">
                    <span class="competence-skill">MongoDB</span>
                    <span class="competence-skill">PostgreSQL</span>
                    <span class="competence-skill">MySQL</span>
                    <span class="competence-skill">Redis</span>
                    <span class="competence-skill">Firebase</span>
                    <span class="competence-skill">Query Optimization</span>
                    <span class="competence-skill">Database Design</span>
                </div>
            </div>

            <div class="competence-item">
                <div class="competence-header">
                    <div class="competence-icon">
                        <i class="fas fa-tools"></i>
                    </div>
                    <div class="competence-title">DevOps & Tools</div>
                </div>
                <div class="competence-skills">
                    <span class="competence-skill">Git & GitHub</span>
                    <span class="competence-skill">Docker</span>
                    <span class="competence-skill">Kubernetes</span>
                    <span class="competence-skill">AWS</span>
                    <span class="competence-skill">CI/CD</span>
                    <span class="competence-skill">Jenkins</span>
                    <span class="competence-skill">Linux</span>
                    <span class="competence-skill">Nginx</span>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\sites\portfolio-nathalie\resources\views/education.blade.php ENDPATH**/ ?>