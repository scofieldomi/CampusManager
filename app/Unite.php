<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unite extends Model
{
    //
    protected $fillable = [
       'id','cycle_id', 'filiere_id','semestre_id','code','intitule'
    ];

   public function cycles() 
     {
         return $this->belongsTo('App\Cycle');
     }

     public function filieres() 
     {
         return $this->belongsTo('App\Filiere');
     }

      public function semestres() 
     {
         return $this->belongsTo('App\Semestre');
     }

     public function modules(){

     return $this->hasMany('\App\Module');

    }

     public function inscriptions(){

     return $this->hasMany('\App\Inscription');

    }

       public function etudiants()
     {
       return $this->belongsToMany('App\Etudiant');
     }

}
