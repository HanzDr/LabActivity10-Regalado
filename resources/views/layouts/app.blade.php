<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Announcements and community updates for Purok Regalado, Barangay Matina Crossing.">
    <title>Barangay Bulletin – Purok Regalado</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen flex-col bg-stone-50 font-sans text-slate-800">
    <header class="border-b border-emerald-800 bg-emerald-950 text-white">
        <div class="mx-auto flex max-w-6xl flex-col gap-4 px-4 py-6 sm:flex-row sm:items-center sm:justify-between sm:px-6">
            <div>
                <p class="mb-2 text-sm text-emerald-200">Barangay Matina Crossing · Davao City</p>
                <a href="{{ route('posts.index') }}" class="text-xl font-bold sm:text-2xl">
                    Barangay Bulletin – Purok Regalado
                </a>
            </div>
            <nav aria-label="Main navigation">
                <a href="{{ route('posts.index') }}" class="inline-block rounded-lg border border-emerald-700 px-4 py-2 text-sm font-medium hover:bg-emerald-900 focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-white">
                    All posts
                </a>
            </nav>
        </div>
    </header>

    <main class="mx-auto w-full max-w-6xl flex-1 px-4 py-8 sm:px-6 sm:py-12">
        @yield('content')
    </main>

    <footer class="border-t border-stone-200 bg-white px-4 py-5 text-center text-sm text-slate-600">
        Barangay Bulletin – Purok Regalado · Community updates for our residents
    </footer>
</body>
</html>
