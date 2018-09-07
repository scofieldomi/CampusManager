<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cycle;
use App\Filiere;
use App\Semestre;
use App\Unite;

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
      $cycle = Cycle::All();
      $filiere = Filiere::All();
      $semestre = Semestre::All();

      $uv= Unite::join('cycles', 'cycles.id', '=','unites.cycle_id')
                        ->join('filieres', 'filieres.id', '=','unites.filiere_id')
                        ->join('semestres', 'semestres.id', '=','unites.semestre_id')
                        ->select('unites.code','unites.intitule as uv','cycles.intitule as c','filieres.intitule as f','semestres.intitule as s')
                        ->OrderBy('filieres.intitule','asc')
                        ->paginate(2);

      return view('frontEnd.uv', compact('cycle','filiere','semestre','uv')) ;
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
        
        $cycle = Cycle::where('intitule', '=' ,$request->cycle)->first();
        //$cycle = $cycle->fresh(); 
        $cycle_id = $cycle->id ;

        $filiere = Filiere::where('intitule', '=',$request->filiere)->first() ;
        $filiere_id = $filiere->id ;

        $semestre = Semestre::where('intitule', '=',$request->semestre)->first() ;
        $semestre_id = $semestre->id ;

        $u = new Unite ;
        $u->code = $request->code;
        $u->intitule = $request->uv;
        $u->cycle_id = $cycle_id;
        $u->filiere_id = $filiere_id;
        $u->semestre_id = $semestre_id;

        $u->save() ;


        return redirect()->route('uv.index');
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
