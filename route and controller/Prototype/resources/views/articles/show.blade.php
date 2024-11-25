@extends('layouts.app')

@section('title', $article['title'])

@section('content')
<h1>{{$article['title']}}</h1>
<p>{{$article['content']}}</p>
<a href="/articles/">Retour à la liste</a>
@endsection