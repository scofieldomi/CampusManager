<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    //
   protected $fillable = ['id','institut_id','intitule'];

       public function enseignants() 
     {
         return $this->belongsTo('App\Enseignant');
     }

      public function instituts() 
     {
         return $this->belongsTo('App\Institut');
     }

    public function resultats() {

     return $this->hasMany('App\Resultat');
   }

    public function unites() {

     return $this->hasMany('App\Unite');
   }
}
