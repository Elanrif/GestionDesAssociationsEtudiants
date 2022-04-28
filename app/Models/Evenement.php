<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    use HasFactory;
   
    protected $table = 'evenements' ; 
    
    protected $guarded = [] ; 

    public function association() { 

        return $this->belongsTo(Association::class) ;
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'participes') ;
    }

    public function user_s() 
    { 
        return $this->belongsToMany(User::class ,'likes') ; 
    }
}
