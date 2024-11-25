@extends('layouts.app')

@section('content')
<h1>Créer Un Article</h1>
<form action="/articles" method="POST">
    @csrf
    <div class="form-group">
        <label for="title" class="form-label">Titre :</label><br>
        <input type="text" name="title" value="" required class="form-control">
    </div><br>
    <div class="form-group">
        <label for="content" class="form-label">Contenu :</label><br>
        <textarea name="content" required class="form-control"></textarea>
    </div><br>

    <button type="submit" class="btn btn-info text-white">Create</button>
</form>
@endsection