<?php

namespace Database\Seeders;

use App\Models\Education;
use App\Models\Project;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Projets exemples
        Project::create([
            'title' => 'API E-commerce',
            'slug' => 'api-e-commerce',
            'description' => 'Développement d\'une API REST complète pour une plateforme e-commerce avec gestion des utilisateurs, produits, commandes et paiements. Implémentation de l\'authentification JWT, cache Redis et optimisation des requêtes.',
            'stack' => 'Laravel, MySQL, Redis, JWT, Stripe',
            'link' => 'https://github.com/nathalie/ecommerce-api',
        ]);

        Project::create([
            'title' => 'Système de Gestion Scolaire',
            'slug' => 'systeme-gestion-scolaire',
            'description' => 'Plateforme complète de gestion scolaire avec modules pour les étudiants, professeurs, cours, notes et présences. Architecture microservices avec Docker.',
            'stack' => 'Laravel, PostgreSQL, Docker, Vue.js, Tailwind',
            'link' => null,
        ]);

        Project::create([
            'title' => 'Dashboard Analytics',
            'slug' => 'dashboard-analytics',
            'description' => 'Tableau de bord analytique en temps réel pour le suivi des KPIs d\'entreprise. Intégration de multiple sources de données et génération de rapports automatisés.',
            'stack' => 'Laravel, MySQL, Chart.js, Redis, Queue',
            'link' => 'https://analytics.demo.com',
        ]);

        // Parcours éducatif
        Education::create([
            'year' => '2020 - 2022',
            'degree' => 'Master en Génie Logiciel',
            'school' => 'Université de Yaoundé I',
            'description' => 'Spécialisation en architecture logicielle, bases de données avancées et développement d\'applications distribuées.',
        ]);

        Education::create([
            'year' => '2017 - 2020',
            'degree' => 'Licence en Informatique',
            'school' => 'Université de Douala',
            'description' => 'Formation fondamentale en programmation, algorithmique, structures de données et systèmes d\'exploitation.',
        ]);

        Education::create([
            'year' => '2023',
            'degree' => 'Certification Laravel',
            'school' => 'Laravel Certification Program',
            'description' => 'Certification officielle Laravel couvrant tous les aspects avancés du framework.',
        ]);
    }
}
