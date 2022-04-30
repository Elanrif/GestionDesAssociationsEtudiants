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
}
