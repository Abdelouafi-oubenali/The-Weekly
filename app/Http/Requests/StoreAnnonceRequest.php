<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAnnonceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'titre' => 'required|max:255',  
            'description' => 'required',     
            'prix' => 'nullable|numeric',           
            'categorie_id' => 'required|exists:categories,id', 
            'image' => 'nullable|image|max:10240', 
        ];
    }



    public function messages()
    {
        return [
            'titre.required' => 'Le titre est requis.',
            'description.required' => 'La description est requise.',
            'prix.numeric' => 'Le prix doit être un nombre.',
            'categorie_id.required' => 'Une catégorie doit être sélectionnée.',
            'image.image' => 'L\'image doit être dans un format valide (ex : jpg, png, etc.).',
            'image.max' => 'La taille de l\'image ne doit pas dépasser 10 Mo.',
        ];
        
    }
}
