<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Institut;
use App\Departement;

class rechercheSousElementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function departement(Request $request)
    {
          if($request->ajax()){


                $institut = Institut::where('intitule', '=' ,$request->institut)->first();
                $institut_id = $institut->id ;

               $dep = Institut::join('departements', 'departements.institut_id', '=' ,'instituts.id')
                        ->where('instituts.id', '=', $institut_id)
                        ->select('departements.intitule')
                        ->get() ; 

                        return response(['dep'=>$dep]) ;

          }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cycle(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function filiere(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function semestre(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function module(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
