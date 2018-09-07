<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unite extends Model
{
    //
    protected $fillable = [
       'id','cycle_id', 'filiere_id','semestre_id','code','intitule'
    ];

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
         return $this->belongsTo('App\Semestre');
     }

     public function module(){

     return $this->hasMany('\App\Module');

    }

     public function inscription(){

     return $this->hasMany('\App\Inscription');

    }

       public function etudiant()
     {
       return $this->belongsToMany('App\Etudiant');
     }

}
