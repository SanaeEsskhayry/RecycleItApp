<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable=['user_id','categorie_id','Titre','Description','Prix_Produit','is_valid'];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
      }
      public function  commentaires(){
        return $this->hasMany('App\Models\Commentaire','post_id','id');
    } 
  
    public function images(){
        return $this->hasMany('App\Models\ImagePost','post_id','id');
    }

    public function categorie() {
        return $this->belongsTo(Categorie::class,'categorie_id','id');
    }

    public static function boot(){
        parent::boot();
        Static::deleting(function( Post $poste){
            $poste->imageposte()->delete();
        });
    }
}
