<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bureau extends Model
{
    use HasFactory;
    protected $guarded =[] ; 

    public function association() { 

        return $this->belongsTo(Association::class) ; 
    }
}
