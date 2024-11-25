@extends('layouts.app')

@section('title', 'Liste des Articles')

@section('content')
@include('partials.flash-message')
<h1>Liste des Articles</h1>
<a href="/articles/create" class="">Créer un nouvel article</a>
    <ul>
        @foreach($articles as $article)
            <li class="m-3">
            <x-article-card :article="$article" />
         
                <a href="/articles/{{$article['id']}}/edit" class="btn btn-info text-white ms-2 me-2">Modifier</a>
                
                <form action="/articles/{{$article['id']}}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </li>
        @endforeach
    </ul>

@endsection


