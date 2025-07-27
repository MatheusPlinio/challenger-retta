<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Dashboard</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    
    <style>
        body {
            font-family: 'Instrument Sans', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9fafb;
            color: #111827;
        }

        header {
            position: fixed;
            top: 0;
            width: 100%;
            background-color: white;
            border-bottom: 1px solid #e5e7eb;
            padding: 1rem 2rem;
            z-index: 10;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        main {
            padding: 6rem 2rem 4rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        footer {
            text-align: center;
            padding: 1rem 0;
            color: #6b7280;
            font-size: 0.875rem;
            border-top: 1px solid #e5e7eb;
            margin-top: 2rem;
        }

        .brand {
            font-weight: 600;
            font-size: 1.25rem;
            color: #111827;
        }

        .nav-links a {
            margin-left: 1rem;
            color: #4b5563;
            text-decoration: none;
        }

        .nav-links a:hover {
            color: #111827;
        }
    </style>
</head>

<body>
    <header>
        <div class="brand">Meu Painel</div>
        <nav class="nav-links">
            <a href="#">Dashboard</a>
            <a href="#">Relatórios</a>
            <a href="#">Configurações</a>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        &copy; {{ date('Y') }} Meu Projeto. Todos os direitos reservados.
    </footer>
</body>

</html>
