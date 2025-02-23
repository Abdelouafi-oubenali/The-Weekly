<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Models\Annonce;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CommentController extends Controller
{
    use AuthorizesRequests;

    public function store(Request $request, $annonceId)
    {
        $request->validate([
            'content' => 'required|string|max:500',
        ]);

        $annonce = Annonce::findOrFail($annonceId);

        $comment = new Comment();
        $comment->content = $request->content;
        $comment->user_id = auth()->id();  
        $comment->annonce_id = $annonceId;  
        $comment->save();

        return redirect()->route('annonces.index', $annonceId)->with('success', 'تم إضافة التعليق بنجاح!');
    }
// app/Http/Controllers/AnnonceController.php

        public function show($id)
        {
            $annonce = Annonce::with('comments')->findOrFail($id);

            return view('annonces.show', compact('annonce'));
        }

        public function index($annonceId)
        {
            $annonce = Annonce::with('comments.user')->findOrFail($annonceId);
            return view('comments.index', compact('annonce'));
        }

    // public function index()
    // {
    //     $comments = Comment::latest()->paginate(10);
    //     return view('comments.index', compact('comments'));
    // }
    
    public function create($annonceId)
    {
        $annonce = Annonce::with('comments')->findOrFail($annonceId);
        return view('Comment.create', compact('annonce'));
    }
    

    public function destroy($id)
    {
        $comment = Comment::find($id);

        if (!$comment) {
            return back()->with('error', 'Le commentaire n\'existe pas');
        }

        $comment->delete();

        return back()->with('success', 'Commentaire supprimé avec succès');
    }
}
