<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usercontact extends Model
{
    use HasFactory;

    protected $guarded = [] ; 

    public function user()  // dans User il n'a pas une clé étrangère 
    { 
        return $this->belongsTo(User::class) ; 
    }

    public function reponses() { 

        return $this->belongsToMany(User::class,'reponses','usercontact_id','user_id')->withPivot('message','created_at') ;
    }
}
