<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    protected $table='categories';
    protected $fillable=['categorie'];
    protected $primaryKey='idcategorie';

    public function poste(){
        return $this->hasMany('App\Models\Post','idcategorie');
    }
}
