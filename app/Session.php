<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    //
    protected $fillable = ['id','intitule'];

     public function resultat() {

     return $this->hasMany('App\Resultat');
    }

     public function moyenne_module() {

     return $this->hasMany('App\MoyenneModule');
   }

    public function notes() {

     return $this->hasMany('App\Note');
    }


}
