<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    //
    protected $fillable = [ 'id', 'module_id','enseignant_id','annee_id'];

       public function annees() 
     {
         return $this->belongsTo('App\Annee');
     }

      public function enseignants()
     {
       return $this->belongsToMany('App\Enseignant');
     }

     

}
