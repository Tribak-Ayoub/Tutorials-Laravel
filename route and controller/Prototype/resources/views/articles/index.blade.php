@extends('layouts.app')

@section('title', 'Liste des Articles')

@section('content')
<h1>Liste des Articles</h1>

@foreach($articles as $article)

<div>
    <h3>{{$article['title']}}</h3>
    <a href="/articles/{{$article['id']}}">Lire l'article</a>
<form action="/articles/{{$article['id']}}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Supprimer</button>
</form>
</div>
@endforeach


@endsection