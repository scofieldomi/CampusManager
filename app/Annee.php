<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Annee extends Model
{
    //
    protected $fillable = [ 'id','intitule'];

    public function moyenne_module() {

     return $this->hasMany('App\MoyenneModule');
 }

     public function inscription() {

     return $this->hasMany('App\Inscription');
   }

       public function cours() {

     return $this->hasMany('App\Cours');
    }

}
