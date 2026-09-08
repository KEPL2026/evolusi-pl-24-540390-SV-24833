<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Evolusi PL')</title>
</head>
<body>
    <main style="max-width: 640px; margin: 2rem auto; font-family: sans-serif;">
        @if (session('status'))
            <p style="color: green;">{{ session('status') }}</p>
        @endif

        @yield('content')
    </main>
</body>
</html>
