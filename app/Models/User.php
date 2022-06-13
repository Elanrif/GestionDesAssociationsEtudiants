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

     public function evenements() // pour les evenements et utilisateurs
    {
        return $this->belongsToMany(Evenement::class, 'participes') ;
    }

    public function evenement_s() 
    { 
        return $this->belongsToMany(Evenement::class , 'likes');
    }

       public function suit($association) 
    { 
        // associations() avec parenthèse , je fais la relation dans le model pas dans le controller 
       // et la methode association avec () , car on parle de la methode ,ici je vais sur les associations de la personne connecté et je ver
       //verife si il y'a une associations qui a le même id que l'association passé en paramètre dans la vue index , car dans ce dernier j'avais bien l'association
       // association_id comme si on etait la table pivot , car il va faire des inner join etc.....

        return $this->associations()->where('association_id',$association->id)->exists() ;
        
        //exists return un booléan 
    }

    //pour les particpe
    public function participe($evenement)
    { 
        return $this->evenements()->where('evenement_id',$evenement->id)->exists() ; 
    }

    //pour les likes 

    public function like($evenement)
    { 
        return $this->evenement_s()->where('evenement_id',$evenement->id)->exists();
    }
  

    public function usercontacts() // ici dans la migration Usercontact il y'a user_id 
     { 
         return $this->hasMany(Usercontact::class) ; 
     }

    


     // d'abord user_id car c'est lui qui reference ce model user ; aussi dans la migration il a referencé 
     // la with methode permet de prendre les colones via le pivot dans la vue 
     
      public function reponses(){ 

        return $this->belongsToMany(Usercontact::class ,'reponses' ,'user_id', 'usercontact_id')->withPivot('message','created_at','id','status') ; 
    }
    public function association_comments() {

        return $this->belongsToMany(Association::class , 'commentaires')->withPivot('id','created_at','commentaire','user_id','association_id')->orderByPivot('id','desc') ; 
    }

}
