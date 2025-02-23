
@extends('layouts.master')

@section('title', 'Announcement page')

@section('content')
   <div class="max-w-4xl mx-auto p-4">
        <!-- Annonce -->
        <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
            <h1 class="text-3xl font-bold mb-4">{{ $annonce->titre }}</h1>
            <img src="{{ asset('storage/' . $annonce->image) }}" alt="iPhone" class="w-full rounded-lg mb-4"/>
            <p class="text-gray-600 mb-4">
                {{ $annonce->description }}
            </p>
         
        </div>

        <!-- Section Commentaires -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-2xl font-bold mb-6">Commentaires</h2>

            <!-- Formulaire nouveau commentaire -->
            <form action="{{ route('comments.store', $annonce->id) }}" method="POST">
                @csrf
                <textarea name="content" placeholder="  commonter ..." required class="w-full p-2 border border-gray-300 rounded-md"></textarea>
                <button type="submit" class="mt-2 px-6 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    ajouté commonter
                </button>
            </form>
            

            <!-- Liste des commentaires -->
            <div class="space-y-6">
                <!-- Commentaire 1 -->
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


            
            </div>
        </div>
    </div>
    @endsection 