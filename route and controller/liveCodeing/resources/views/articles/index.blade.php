@extends('layouts.app')
@section('content')
<h1>list des articles</h1>
@foreach($articles as $article)
<h1>{{$article['title']}}</h1>
@endforeach
@endsection