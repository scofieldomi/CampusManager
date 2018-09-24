<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cycle;
use App\Filiere;
use App\Semestre;
use App\Unite;
use App\Institut;
use App\Departement;

class uvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
      $institut = Institut::All() ;
      $departement = Departement::All() ;
      $cycle = Cycle::All();
      $filiere = Filiere::All();
      $semestre = Semestre::All();


      $uv= Unite::join('cycles', 'cycles.id', '=','unites.cycle_id')
                        ->join('filieres', 'filieres.id', '=','unites.filiere_id')
                        ->join('semestres', 'semestres.id', '=','unites.semestre_id')
                        ->join('instituts', 'instituts.id', '=','unites.institut_id')
                        ->join('departements', 'departements.id', '=','unites.departement_id')
                        ->select('unites.code','unites.intitule as uv','cycles.intitule as c','filieres.intitule as f','semestres.intitule as s','instituts.intitule as i','departements.intitule as d')
                        ->OrderBy('filieres.intitule','asc')
                        ->paginate(2);

      return view('frontEnd.uv', compact('cycle','filiere','semestre','uv','institut','departement')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        $institut = Institut::where('intitule', '=' ,$request->institut)->first();
        $institut_id = $institut->id ;

        $departement = Departement::where('intitule', '=' ,$request->departement)->first();
        $departement_id = $departement->id ;

        $cycle = Cycle::where('intitule', '=' ,$request->cycle)->first();
        //$cycle = $cycle->fresh(); 
        $cycle_id = $cycle->id ;

        $filiere = Filiere::where('intitule', '=',$request->filiere)->first() ;
        $filiere_id = $filiere->id ;

        $semestre = Semestre::where('intitule', '=',$request->semestre)->first() ;
        $semestre_id = $semestre->id ;

        $u = new Unite ;
        $u->code = $request->code ;
        $u->intitule = $request->uv ;
        $u->institut_id = $institut_id ;
        $u->departement_id = $departement_id ;
        $u->cycle_id = $cycle_id ; 
        $u->filiere_id = $filiere_id ;
        $u->semestre_id = $semestre_id ;

        $u->save() ;


        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
