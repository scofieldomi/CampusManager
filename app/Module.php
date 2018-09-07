<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    //
protected $fillable = ['id','unite_id','intitule','coef'];


      public function cours() {

     return $this->hasMany('App\Cours');
   }


       public function unite() {

     return $this->hasMany('App\Unite');
   }

       public function notes() {

     return $this->hasMany('App\Note');
   }

      public function enseignant()
     {
       return $this->belongsToMany('App\Enseignant');
     }

}
