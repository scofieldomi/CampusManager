<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MoyenneModule extends Model
{
    //
  protected $fillable = ['id','session_id','annee_id','etudiant_matricule','module_id','moyenne'];

     public function etudiant() 
     {
         return $this->belongsTo('App\Etudiant');
     }

   public function module() 
     {
         return $this->belongsTo('App\Module');
     }

}
