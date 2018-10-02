<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model
{
    //
    protected $fillable = [ 'id','user_id','nom','prenom','telephone','email'];


       public function users() 
     {
         return $this->belongsTo('App\User');
     }

   public function modules()
    {
       return $this->belongsToMany('App\Module');
    }

    public function instituts() {

     return $this->hasMany('App\Institut');
   }

    public function departements() {

     return $this->hasMany('App\Departement');

   }

}


  