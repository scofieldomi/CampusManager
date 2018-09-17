<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    //
    protected $fillable = ['id','intitule'];

     public function resultats() {

     return $this->hasMany('App\Resultat');
    }

     public function moyenne_modules() {

     return $this->hasMany('App\MoyenneModule');
   }

    public function notes() {

     return $this->hasMany('App\Note');
    }


}
