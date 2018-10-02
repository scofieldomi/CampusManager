<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institut extends Model
{
    //
    protected $fillable = ['id','intitule'];

    public function enseignants() 
     {
         return $this->belongsTo('App\Enseignant');
     }

   public function departements() {

     return $this->hasMany('App\Departement');
   }

    public function resultats() {

     return $this->hasMany('App\Resultat');
   }

    public function unites() {

     return $this->hasMany('App\Unite');
   }
}
