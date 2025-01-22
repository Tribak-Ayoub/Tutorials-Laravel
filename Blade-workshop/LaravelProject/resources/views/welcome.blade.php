<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atelier</title>
</head>
<body>
    <h1>Hello {{ $name}}</h1>
    <h1>Hello @{{ $name}}</h1>
    
    <p>the currnt time is : {{ time() }}</p>

    {{ '<script>alert("XSS")</script>' }}
    


</body>
</html>