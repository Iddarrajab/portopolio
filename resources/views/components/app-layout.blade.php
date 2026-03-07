<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Document' }}</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    @stack('styles')
</head>

<body class="mx-auto p-0 min-h-screen bg-gradient-to-b from-black to-white">



    {{-- Spasi agar konten tidak tertutup navbar --}}
    <div class="h-16"></div>

    <main class="container mx-auto p-4">
        {{-- render heading slot --}}
        @isset($heading)
        <h1 class="text-xl font-bold mb-4">
            {{ $heading }}
        </h1>
        @endisset

        {{-- render body slot --}}
        {{ $body ?? $slot }}
    </main>

    {{-- Hamburger toggle script --}}
    <script>
        const hamburgerBtn = document.getElementById('hamburgerBtn');
        const mobileMenu = document.getElementById('mobileMenu');

        hamburgerBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>

</body>

</html>