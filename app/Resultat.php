<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resultat extends Model
{
    //
    protected $fillable = ['id', 'moyenne','rang','decision','mention','etudiant_matricule','cycle_id','filiere_id','filiere_id','semestre_id','session_id'];

       public function etudiant() 
     {
         return $this->belongsTo('App\Etudiant');
     }
       public function cycle() 
     {
         return $this->belongsTo('App\Cycle');
     }

     public function filiere() 
     {
         return $this->belongsTo('App\Filiere');
     }
      public function semestre() 
     {
         return $this->belongsTo('App\Cycle');
     }


}
