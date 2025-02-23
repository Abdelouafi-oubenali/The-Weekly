<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            // 'annonce_id' => 'required|exists:annonnces,id', 
            // 'user_id' => 'required|exists:users,id', 
            'content' => 'required|string|min:3|max:500', 
        ];
    }

    public function messages(): array
    {
        return [
            'annonce_id.required' => 'L\'annonce doit être spécifiée',
            'annonce_id.exists' => 'L\'annonce n\'existe pas',
            'user_id.required' => 'L\'utilisateur doit être spécifié',
            'user_id.exists' => 'L\'utilisateur n\'existe pas',
            'content.required' => 'Le texte du commentaire est requis',
            'content.min' => 'Le commentaire doit contenir au moins 3 caractères',
            'content.max' => 'Le commentaire ne doit pas dépasser 500 caractères',
        ];
    }
    
}
