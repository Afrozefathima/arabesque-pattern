<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Dashboard' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen font-sans">
    <nav class="bg-white shadow-md p-4">
        <div class="container mx-auto flex justify-between">
            <h1 class="text-xl font-bold text-red-600">Parts Marketplace</h1>
            <a href="/" class="text-gray-600 hover:text-red-600">Home</a>
        </div>
    </nav>

    <main class="container mx-auto py-10">
        @yield('content')
    </main>
</body>

</html>
