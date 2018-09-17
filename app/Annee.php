<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Annee extends Model
{
    //
    protected $fillable = [ 'id','intitule'];

    public function moyenne_modules() {

     return $this->hasMany('App\MoyenneModule');
 }

     public function inscriptions() {

     return $this->hasMany('App\Inscription');
   }

       public function cours() {

     return $this->hasMany('App\Cours');
    }

     public function resultats() {

     return $this->hasMany('App\Resultat');
   }

}
