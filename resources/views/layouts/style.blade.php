<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>@yield('title')</title>
</head>
<body>
    <div class="container">
        <header>
            <h1>掲示板</h1>
            <nav>
                <a href="{{ route('threads.create') }}">新しいスレッドを作成</a>
            </nav>
        </header>

        <main>
            @yield('content')
        </main>

        <footer>
            <p>© 2025 掲示板</p>
        </footer>
    </div>
</body>
</html>

