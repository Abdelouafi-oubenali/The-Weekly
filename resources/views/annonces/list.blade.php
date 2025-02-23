

@extends('layouts.master')

@section('title', 'Announcement page')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold text-gray-900">Liste des Annonces</h1>
    <a href="{{ route('annonces.create') }}" 
       class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
        Nouvelle Annonce
    </a>
</div>
    <div class="min-h-screen p-6">
        <div class="max-w-7xl mx-auto">
        <!-- Grid des annonces -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($annonces as $annonce)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <!-- Image de l'annonce -->
                <div class="aspect-w-16 aspect-h-9 bg-gray-200">
                    @if($annonce->image)
                        <img src="{{ asset('storage/' . $annonce->image) }}" 
                            alt="{{ $annonce->titre }} "
                            class="object-cover w-full h-48">
                    @else
                        <div class="flex items-center justify-center h-48 bg-gray-100">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                    @endif
                </div>

                <!-- Contenu de l'annonce -->
                <div class="p-4">
                    <h2 class="text-xl font-semibold text-gray-900 mb-2">{{ $annonce->titre }}</h2>
                    <p class="text-gray-600 mb-4 line-clamp-3">{{ $annonce->description }}</p>
                    
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-lg font-bold text-blue-600">
                            {{ $annonce->prix ? number_format($annonce->prix, 2, ',', ' ') . ' €' : 'Prix non défini' }}
                        </span>
                        <span class="px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-sm">
                            {{ $annonce->categorie->nom }}
                        </span>
                    </div>

                    <!-- Actions -->
                    <div class="flex justify-between items-center pt-4 border-t border-gray-200">
                        <a href="{{ route('annonces.edit', $annonce) }}" 
                        class="text-blue-600 hover:text-blue-800 font-medium">
                        <i class="fa-solid fa-pen-to-square"></i>
                        hh
                        </a>

                        {{-- <form action="{{route('annonces.show', $annonce->id) }}"  --}}
                            {{-- method="POST"  --}}
                            {{-- class="inline" --}}
                            {{-- onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette annonce ?')"> --}}
                            @csrf
                            <a href="{{ route('comments.index', $annonce->id) }}" class="text-green-600 hover:text-red-800 font-medium">
                                <i class="fa-solid fa-comment"></i>
                                commm   
                            </a>
                            
                        {{-- </form> --}}
                        
                        <form action="{{ route('annonces.destroy', $annonce) }}" 
                            method="POST" 
                            class="inline"
                            onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette annonce ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="text-red-600 hover:text-red-800 font-medium">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Comment Section -->
                {{-- <div class="p-4 mt-4 border-t border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">Commentaires :</h3>
                    @if($annonce->comments->count() > 0)
                        <ul class="space-y-4">
                            @foreach($annonce->comments as $comment)
                                <li class="bg-gray-50 p-4 rounded-lg shadow-sm">
                                    <strong class="text-blue-600">{{ $comment->user->name }}</strong>
                                    <p class="text-gray-600 mt-2">{{ $comment->content }}</p>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-600">Il n'y a pas encore de commentaires.</p>
                    @endif

                    <!-- New Comment Form -->
                    <form action="{{ route('comments.store') }}" method="POST" class="mt-6">
                        @csrf
                        <input type="hidden" name="annonce_id" value="{{ $annonce->id }}">

                        <div class="flex flex-col">
                            <label for="content" class="text-gray-800 font-medium">Ajouter un commentaire :</label>
                            <input id="content" name="content" rows="4" class="mt-2 p-3 border rounded-lg w-full" placeholder="Écrivez votre commentaire..."></input>
                            <button type="submit" class="mt-3 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">Soumettre</button>
                        </div>
                    </form>
                </div> --}}

            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $annonces->links() }}
        </div>

        </div>
    </div>
@endsection