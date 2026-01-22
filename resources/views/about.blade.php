@extends('layouts.app')

@section('title', 'À propos - Nathalie')

@section('content')
<div class="max-w-4xl mx-auto">
  <h1 class="text-4xl md:text-5xl font-bold text-vert-600 mb-8 fade-in">À propos de moi</h1>

  <div class="grid md:grid-cols-3 gap-8 mb-12">
    <div class="md:col-span-1 fade-in">
      <div class="card">
        <img src="{{ asset('images/profile.jpg') }}" alt="Nathalie" class="w-full rounded-lg mb-4">
        <h3 class="font-semibold text-lg mb-2">Nathalie</h3>
        <p class="text-sm text-gray-600">Développeuse Full Stack Backend</p>
      </div>
    </div>

    <div class="md:col-span-2 fade-in">
      <div class="card">
        <h2 class="text-2xl font-semibold text-bordeaux-600 mb-4">Mon parcours</h2>
        <p class="text-gray-700 leading-relaxed mb-4">
          Passionnée par le développement web depuis plus de {{ date('Y') - 2018 }} ans, je me spécialise dans la création d'applications backend robustes et évolutives.
        </p>
        <p class="text-gray-700 leading-relaxed mb-4">
          Mon expertise se concentre sur l'architecture logicielle, la conception d'APIs performantes et l'optimisation des bases de données. J'aime résoudre des problèmes complexes et créer des solutions techniques élégantes.
        </p>
        <p class="text-gray-700 leading-relaxed">
          Actuellement, je travaille principalement avec l'écosystème PHP/Laravel, mais je reste constamment à jour avec les nouvelles technologies et les meilleures pratiques du secteur.
        </p>
      </div>
    </div>
  </div>

  <div class="fade-in">
    <h2 class="text-3xl font-bold text-vert-600 mb-8">Compétences techniques</h2>

    <div class="grid md:grid-cols-2 gap-6 mb-12">
      <div class="card">
        <h3 class="text-xl font-semibold text-bordeaux-600 mb-4">Backend</h3>
        <div class="space-y-3">
          <div>
            <div class="flex justify-between mb-1">
              <span>PHP / Laravel</span>
              <span class="text-vert-600 font-semibold">Expert</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-2">
              <div class="bg-vert-600 h-2 rounded-full" style="width: 95%"></div>
            </div>
          </div>
          <div>
            <div class="flex justify-between mb-1">
              <span>MySQL / PostgreSQL</span>
              <span class="text-vert-600 font-semibold">Expert</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-2">
              <div class="bg-vert-600 h-2 rounded-full" style="width: 90%"></div>
            </div>
          </div>
          <div>
            <div class="flex justify-between mb-1">
              <span>API REST / GraphQL</span>
              <span class="text-vert-600 font-semibold">Avancé</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-2">
              <div class="bg-vert-600 h-2 rounded-full" style="width: 85%"></div>
            </div>
          </div>
        </div>
      </div>

      <div class="card">
        <h3 class="text-xl font-semibold text-bordeaux-600 mb-4">DevOps & Tools</h3>
        <div class="space-y-3">
          <div>
            <div class="flex justify-between mb-1">
              <span>Git / GitHub</span>
              <span class="text-vert-600 font-semibold">Expert</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-2">
              <div class="bg-vert-600 h-2 rounded-full" style="width: 90%"></div>
            </div>
          </div>
          <div>
            <div class="flex justify-between mb-1">
              <span>Docker</span>
              <span class="text-vert-600 font-semibold">Avancé</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-2">
              <div class="bg-vert-600 h-2 rounded-full" style="width: 80%"></div>
            </div>
          </div>
          <div>
            <div class="flex justify-between mb-1">
              <span>Linux / Server</span>
              <span class="text-vert-600 font-semibold">Avancé</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-2">
              <div class="bg-vert-600 h-2 rounded-full" style="width: 85%"></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="card">
      <h3 class="text-xl font-semibold text-bordeaux-600 mb-4">Technologies & Frameworks</h3>
      <div class="flex flex-wrap gap-2">
        <span class="skill-tag">PHP</span>
        <span class="skill-tag">Laravel</span>
        <span class="skill-tag">Symfony</span>
        <span class="skill-tag">Node.js</span>
        <span class="skill-tag">MySQL</span>
        <span class="skill-tag">PostgreSQL</span>
        <span class="skill-tag">MongoDB</span>
        <span class="skill-tag">Redis</span>
        <span class="skill-tag">Docker</span>
        <span class="skill-tag">Git</span>
        <span class="skill-tag">Vue.js</span>
        <span class="skill-tag">React</span>
        <span class="skill-tag">Tailwind CSS</span>
        <span class="skill-tag">RESTful API</span>
        <span class="skill-tag">GraphQL</span>
        <span class="skill-tag">AWS</span>
        <span class="skill-tag">CI/CD</span>
      </div>
    </div>
  </div>
</div>
@endsection
