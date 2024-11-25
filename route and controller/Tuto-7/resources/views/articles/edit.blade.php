@extends('layouts.app')

@section('content')
<h1>Modifier un Article</h1>
<form action="/articles/{{$article['id']}}" method="POST">
    @csrf
    @if(isset($article))
    @method('PUT')
    @endif
    <div class="form-group">
        <label for="title" class="form-label">Titre :</label><br>
        <input type="text" name="title" required value="{{$article['title']}}" class="form-control">
    </div><br>
    <div class="form-group">
        <label for="content" class="form-label">Contenu :</label><br>
        <textarea name="content" required class="form-control">{{$article['content']}}</textarea>
    </div><br>
    <button type="submit" class="btn btn-info text-white">Modifier</button>
    <a href="/articles" class="btn btn-secondary text-white">Annuler</a>
</form>
@endsection