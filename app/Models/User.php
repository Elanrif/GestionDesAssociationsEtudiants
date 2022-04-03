<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Comment ; 

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'password',
        'code_apogée',
        'num_tel',
        'filiere',
        'role',
        'active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

      public function associations() { 
        return $this->belongsToMany(Association::class , 'membres') ;
    }
   // faire très attentions aux relations . seule le manyTomany ou il y'a belongsToMany. donc bien respecter les syntaxes de laravel 
     public function comment() { 
         
         return $this->hasOne(Comment::class) ; //signifie que c'est dans comment que j'ai une foreignKey reférençant la table "User"
     }
}
