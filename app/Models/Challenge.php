<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    use HasFactory;
    protected $fillable=['Titre','Explication'];

    
    public function images(){
        return $this->hasMany('App\Models\ImageChallenge','');
    }



    public static function boot(){
        parent::boot();
        Static::deleting(function( Challenge $challenge){
            $challenge->imagechallenge()->delete();
        });
    }
}
