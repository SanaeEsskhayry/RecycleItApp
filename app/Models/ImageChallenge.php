<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagechallenge extends Model
{
    use HasFactory;
    
    protected $fillable=['path','challenge_id'];

    public function challenge(){
        return $this->belongsTo('App\Models\Challenge','challenge_id','id');
    }
}
