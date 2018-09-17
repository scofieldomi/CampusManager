<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    //
     protected $fillable = ['user_id','matricule','nom','prenom','dateNaissance','lieuNaissance','telephone'];

       public function unites()
     {
       return $this->belongsToMany('App\Unite');
     }

     public function module_modules() {

     return $this->hasMany('App\MoyenneModule');
   }

   public function resultats() {

     return $this->hasMany('App\Resultat');
   }

   public function notes() {

     return $this->hasMany('App\Note');
   }



}
