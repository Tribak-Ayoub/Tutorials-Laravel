@extends('layouts.app')

@section('content')
<h1>{{$article['title']}}</h1>
<p>{{$article['content']}}</p>
<a href="/articles/">Retour à la liste</a>
@endsection

<!-- <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <h1>{{$article['title']}}</h1>
    <p>{{$article['content']}}</p>
    <a href="/articles/">Retour à la liste</a>
</body>
</html> -->