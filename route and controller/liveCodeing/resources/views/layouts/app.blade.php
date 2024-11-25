<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="/css/bootstrap.min.css">
   <title>@yield('title', 'Mon Blog Minimaliste')</title>
</head>
<body>
    <header class="bg-dark">
        <nav class="navbar navbar-expand-lg navbar-dark container">
            <a class="navbar-brand" href="{{ url('/') }}">My Blog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/articles') }}">Articles</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/articles/create') }}">Créer un article</a>
                    </li>
                    
                </ul>
            </div>
        </nav>
    </header>

    <main class="container my-5">
        @yield('content')
    </main>

    <footer class="bg-dark text-white text-center py-3 mt-auto">
        &copy; 2024 All rights reserved.
    </footer>

</body>

</html>
