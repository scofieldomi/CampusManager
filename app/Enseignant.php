<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model
{
    //
    protected $fillable = [ 'id','user_id','nom','prenom','telephone','email'];


       public function user() 
     {
         return $this->belongsTo('App\User');
     }


   public function module()
     {
       return $this->belongsToMany('App\Module');
    }


}


  