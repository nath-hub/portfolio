<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title', 'Nathalie — Développeuse Full Stack')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Fonts -->
     @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">


    <script defer src="{{ asset('js/animations.js') }}"></script>
</head>

<body class="bg-white text-gray-800 antialiased">
    <header class="bg-vert-600 text-white shadow-lg">
        <div class="max-w-6xl mx-auto px-4 py-5 flex items-center justify-between">
            <a href="{{ route('home') }}" class="font-bold text-xl tracking-wide">Nathalie</a>
            <nav class="space-x-6 text-sm font-medium">
                <a href="{{ route('home') }}" class="hover:underline transition">Accueil</a>
                <a href="{{ route('about') }}" class="hover:underline transition">À propos</a>
                <a href="{{ route('projects') }}" class="hover:underline transition">Projets</a>
                <a href="{{ route('education') }}" class="hover:underline transition">Parcours</a>
                <a href="{{ route('contact') }}" class="hover:underline transition">Contact</a>
            </nav>
        </div>
    </header>

    <main class="max-w-6xl mx-auto px-4 py-12">
        @if (session('success'))
            <div class="p-4 bg-green-100 text-green-800 rounded-lg mb-6 fade-in visible">
                {{ session('success') }}
            </div>
        @endif
        @yield('content')
    </main>

    <footer class="bg-gray-50 border-t mt-20 py-8">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="text-sm text-gray-600 mb-4 md:mb-0">
                    © {{ date('Y') }} Nathalie — Développeuse Full Stack Backend
                </div>
                <div class="flex space-x-6">
                    <a href="https://github.com/nathalie" target="_blank"
                        class="text-gray-600 hover:text-vert-600 transition">GitHub</a>
                    <a href="https://linkedin.com/in/nathalie" target="_blank"
                        class="text-gray-600 hover:text-vert-600 transition">LinkedIn</a>
                    <a href="mailto:contact@nathalie.dev" class="text-gray-600 hover:text-vert-600 transition">Email</a>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
