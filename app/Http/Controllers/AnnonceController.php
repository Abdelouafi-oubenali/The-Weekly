<?php 
// app/Http/Controllers/AnnonceController.php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Category;
use App\Http\Requests\StoreAnnonceRequest; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; 

class AnnonceController extends Controller
{

    public function index()
    {
        $annonces = Annonce::paginate(10); 

        $categories = Category::all();
        return view('annonces.list', compact('annonces', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('annonces.create', compact('categories'));
    }

    public function store(StoreAnnonceRequest $request)
    {
        $imagePath = null;
        if ($request->hasFile('image')) {
            // $imagePath = $request->file('image')->store('public/annonces');
            $imagePath = $request->file('image')->store('annonces', 'public'); 
        }

        $userId = Auth::id();
        Annonce::create([
            'titre' => $request->titre,
            'description' => $request->description,
            'prix' => $request->prix, 
            'image' => $imagePath, 
            'user_id' => $userId, 
            'categorie_id' => $request->categorie_id, 
            'status' => 'brouillon', 
        ]);
        return redirect()->route('annonces.index')->with('success', 'add new annonces');
    }

    public function edit($id)
    {
        $annonce = Annonce::findOrFail($id); 
        $categories = Category::all();
        
        return view('annonces.edit', compact('annonce', 'categories')); 
    }
    
    

    public function update(StoreAnnonceRequest $request, $id)
    {

        $annonce = Annonce::findOrFail($id);

        $imagePath = $annonce->image; 
        if ($request->hasFile('image')) {
            
            if ($imagePath) {
                Storage::delete($imagePath);
            }
            // $imagePath = $request->file('image')->store('public/annonces');
            $imagePath = $request->file('image')->store('annonces','public'); 
        }

        $annonce->update([
            'titre' => $request->titre,
            'description' => $request->description,
            'prix' => $request->prix, 
            'image' => $imagePath, 
            'categorie_id' => $request->categorie_id, 
            // 'status' => $request->status, 
        ]);

        return redirect()->route('annonces.index')->with('success', 'updated');
    }

    public function destroy($id)
    {
        $annonce = Annonce::findOrFail($id);
        $annonce->delete();
        return redirect()->route('annonces.index')->with('success', 'supremed');
    }

    public function show($id)
    {
        $annonce = Annonce::with('comments')->findOrFail($id);
        return view('annonces.comment', compact('annonce'));
    }

    
}
