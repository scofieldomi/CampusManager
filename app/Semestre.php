<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semestre extends Model
{
    //
    protected $fillable = ['id','intitule'];

    public function resultats() {

     return $this->hasMany('App\Resultat');
   }

    public function unites() {

     return $this->hasMany('App\Unite');
   }
}
