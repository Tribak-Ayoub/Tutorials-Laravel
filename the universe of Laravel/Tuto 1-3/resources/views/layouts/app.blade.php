<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Laravel application</title>
</head>
<body>
    <header>
        <nav>
            <li>home</li>
            <li>services</li>
            <li>about</li>
            <li>contact</li>
        </nav>
    </header>
    @yield('content')
    <footer>
        &copy; 2024 All rights reserved.
    </footer>
</body>
</html>