@extends('layouts.app')
@section('content')

<h1>Ajoute un article</h1>
<form action="{{ route('articles.store') }}" method="Get">
    @csrf
    <div class="form-group">
        <label for="title">Titre</label>
        <input type="text" name="title" id="title" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="content">Contenu</label>
        <textarea name="content" id="content" class="form-control" required></textarea>
    </div>
    <button type="submit" class="btn btn-success">Enregistrer</button>
</form>

@endsection