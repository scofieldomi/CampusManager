<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resultat extends Model
{
    //
    protected $fillable = ['id','annee_id', 'moyenne','rang','decision','mention','etudiant_matricule','cycle_id','filiere_id','filiere_id','semestre_id','session_id'];

    public function annees() 
     {
         return $this->belongsTo('App\Annee');
     }

       public function etudiants() 
     {
         return $this->belongsTo('App\Etudiant');
     }
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
         return $this->belongsTo('App\Cycle');
     }


}
