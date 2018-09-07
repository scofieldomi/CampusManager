<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cycle;
use App\Filiere;
use App\Semestre;
use App\Annee;
use App\Inscription;
use App\Unite;
use App\Etudiant;

class etudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
      $annee = Annee::OrderBy('annees.intitule','desc')->get() ;
      $cycle = Cycle::All();
      $filiere = Filiere::All();
      $semestre = Semestre::All();

      return view('frontEnd.etudiant', compact('annee','cycle','filiere','semestre')) ;

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

        $annee = Annee::where('intitule', '=',$request->annee)->first() ;
        $annee_id = $annee->id ;

        $cycle = Cycle::where('intitule', '=' ,$request->cycle)->first();
        //$cycle = $cycle->fresh(); 
        $cycle_id = $cycle->id ;

        $filiere = Filiere::where('intitule', '=',$request->filiere)->first() ;
        $filiere_id = $filiere->id ;

        $semestre1 = Semestre::where('intitule', '=',$request->semestre1)->first() ;
        $semestre1_id = $semestre1->id ;

        $semestre2 = Semestre::where('intitule', '=',$request->semestre2)->first() ;
        $semestre2_id = $semestre2->id ;


         etudiant::create([

                'matricule' =>$request->matricule,
                'nom' => $request->nom,
                'prenom' =>$request->prenom,
                'dateNaissance' => $request->datenaissance,
                'lieuNaissance' =>$request->lieunaissance,
                'telephone' =>$request->telephone,

            ]);

        $uv= Unite::join('cycles', 'cycles.id', '=','unites.cycle_id')
                        ->join('filieres', 'filieres.id', '=','unites.filiere_id')
                        ->join('semestres', 'semestres.id', '=','unites.semestre_id')
                        ->select('unites.id')
                        ->where('unites.cycle_id', '=', $cycle_id)
                        ->where('unites.filiere_id', '=', $filiere_id)
                        ->whereIn('unites.semestre_id', [$semestre1_id, $semestre2_id]) 
                        ->get() ;

 foreach($uv as $u){

        $i = new Inscription ;
        $i->etudiant_matricule = $request->matricule ;
        $i->unite_id = $u->id ;
        $i->annee_id = $annee_id;

        $i->save() ;

         }

         return redirect()->back() ;
    }


  public function liste()
    {
        //

        $etudiant= Inscription::join('etudiants', 'inscriptions.etudiant_matricule', '=' ,'etudiants.matricule')
                        ->join('unites','inscriptions.unite_id','=','unites.id')
                        ->join('cycles','unites.cycle_id','=','cycles.id')
                        ->join('filieres','unites.filiere_id','=','filieres.id')
                        ->join('semestres','unites.semestre_id','=','semestres.id')
                        ->join('annees','annees.id','=','inscriptions.annee_id')
                        ->select('etudiants.matricule','etudiants.nom','etudiants.prenom','cycles.intitule as c','filieres.intitule as f', 'annees.intitule as a')
                        ->groupBy('etudiants.matricule','etudiants.nom','etudiants.prenom','cycles.intitule','filieres.intitule','annees.intitule')
                        ->paginate(5) ; 

     return view('frontEnd.listeEtudiant',compact('etudiant')) ;

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
