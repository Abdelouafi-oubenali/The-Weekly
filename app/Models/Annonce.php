<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Annonce extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'annonnces';

    protected $fillable = [
        'titre', 'description', 'prix', 'image', 'user_id', 'categorie_id', 'status'
    ];
     
//    la rolasion avec user 
    public function user(){
        return $this->belongsTo(User::class);
    }

    // la rolasion avec categry
    public function categorie (){
        return $this->belongsTo(Category::class);
    }

    // la rolasion entre commonter 

    public function comments()
{
    return $this->hasMany(Comment::class);
}


}
