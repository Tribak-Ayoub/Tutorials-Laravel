@extends('layouts.app')

@section('content')
<h2>cree un article</h2>
<form action="/articles" method="POST">
@csrf
        <label for="title">Titre :</label>
        <input type="text" name="title" value="" required>
        <label for="content">Contenu :</label>
        <textarea name="content" required></textarea>

    <button type="submit">add</button>
</form>
@endsection