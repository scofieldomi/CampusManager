<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Institut;
use App\Departement;


class departementController extends Controller
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

         $departement= Departement::join('instituts', 'instituts.id', '=','departements.institut_id')
                         ->select('instituts.intitule as i','departements.intitule as d')
                        ->OrderBy('instituts.intitule','asc')
                        ->paginate(2);

          
          return view('frontEnd.departement', compact('departement','institut')) ;
       
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


        $departement = new Departement ;
        $departement->institut_id = $institut_id;
        $departement->intitule = $request->departement;

        $departement->save() ;

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
