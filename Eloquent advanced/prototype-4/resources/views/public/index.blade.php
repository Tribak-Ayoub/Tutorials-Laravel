@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($articles as $article)
    <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white hover:shadow-xl transition-shadow duration-300">
        <!-- Titre de la Carte -->
        <div class="px-6 py-4 border-b bg-gray-100">
            <h2 class="font-bold text-xl text-gray-800 truncate">{{$article->title}}</h2>
        </div>
        <!-- Contenu de la Carte -->
        <div class="px-6 py-4">
            <p class="text-gray-700 text-base line-clamp-3">{{$article->content}}</p>
        </div>
        <!-- Pied de la Carte -->
        <div class="px-6 py-4 border-t flex justify-between items-center bg-gray-50">
            <span class="text-sm text-gray-500">Published: {{ $article->created_at->format('M d, Y') }}</span>
            <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded shadow hover:shadow-md transition">
                Show
            </button>
        </div>
    </div>
    @endforeach
</div>
@endsection
