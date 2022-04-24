<?php

namespace App\Models;

use App\Models\Evenement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Association extends Model
{
    use HasFactory;
    
    protected $guarded = [] ; 

      public function users() { 
        return $this->belongsToMany(User::class , 'membres') ;
    }
    
    public function bureaus() { 

        return $this->hasMany(Bureau::class) ; 

    }

    public function evenements() { 

        return $this->hasMany(Evenement::class) ;
    }
}
