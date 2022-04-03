<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['commentaire'] ; 

    // pour les ralishionship j'ai compris l'inverse . 

   // sur les belongsTo il n'a ya pas nécessairement de foreignId qui reférence l'autre table
   // par exemple ici dans le modle User j'ai pas un ' comment_id'
    public function user()
    { 
        // N'oubliez pas d'importez la classe dans le $this aussi la classe car par défaut elle n'est pas importer et ça n'affiche pas d'erreur 
       return  $this->belongsTo(User::class) ; // ne jamais oublié le 'RETURN' 
       
    }
}
