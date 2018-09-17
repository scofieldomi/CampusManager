<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input ;
use DB ;

use App\Cycle;
use App\Filiere;
use App\Semestre;
use App\Annee;
use App\Inscription;
use App\Unite;
use App\Etudiant;
use App\Session;
use App\Module;
use App\MoyenneModule;

class deliberationController extends Controller
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
      $session = Session::All();

      return view('frontEnd.deliberation', compact('annee','cycle','filiere','semestre','session')) ;

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

    /** Calcul de la moyenne
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       $moyenne = 0.0 ;

        $annee = Annee::where('intitule', '=',$request->annee)->first() ;
        $annee_id = $annee->id ;

        $cycle = Cycle::where('intitule', '=' ,$request->cycle)->first();
        $cycle_id = $cycle->id ;

        $filiere = Filiere::where('intitule', '=',$request->filiere)->first() ;
        $filiere_id = $filiere->id ;

        $semestre = Semestre::where('intitule', '=',$request->semestre)->first() ;
        $semestre_id = $semestre->id ;

        $session = Session::where('intitule', '=',$request->session)->first() ;
        $session_id = $session->id ;

        $divisePar = Unite::join('modules', 'modules.unite_id', '=' , 'unites.id')
                        ->where('unites.cycle_id', '=', $cycle_id)
                        ->where('unites.filiere_id', '=', $filiere_id)
                        ->where('unites.semestre_id', '=', $semestre_id)
                        ->select(DB::raw('sum(coef) as somme'))
                        ->first(); 

         $etudiants = Inscription::join('etudiants', 'inscriptions.etudiant_matricule', '=' ,'etudiants.matricule')
                        ->join('unites','inscriptions.unite_id','=','unites.id')
                        ->join('cycles','unites.cycle_id','=','cycles.id')
                        ->join('filieres','unites.filiere_id','=','filieres.id')
                        ->join('semestres','unites.semestre_id','=','semestres.id')
                        ->join('annees','annees.id','=','inscriptions.annee_id')
                        ->join('modules','modules.unite_id','=','unites.id')
                        ->where('unites.cycle_id', '=', $cycle_id)
                        ->where('unites.filiere_id', '=', $filiere_id)
                        ->where('unites.semestre_id', '=', $semestre_id)
                        ->where('annees.id', '=', $annee_id)
                        ->select('etudiants.matricule','etudiants.nom','etudiants.prenom','modules.id as mid')
                        ->groupBy('etudiants.matricule','etudiants.nom','etudiants.prenom','unites.code','modules.id')
                        ->get() ; 
//Ici on cherche les étudiants inscrit dans ce CFS session et annee
 foreach($etudiants->unique('matricule') as $e){
  //parcour par etudiant

 //On cherche les moyenneModules de l'etudiant dans ce CFS session annee
        $moyenneModule = MoyenneModule::where('etudiant_matricule', '=' ,$e->matricule)
                                        ->where('session_id','=',$session_id) 
                                        ->where('annee_id','=',$annee_id)
                                        ->get() ;
 //Parcour des moyenneModule puis on cherche les coef des différents module puis on calcul le pondérer
            foreach($moyenneModule as $m){  

            $coeff = Module::where('id','=',$m->module_id)->first() ;                   
            $moyenne += (($m->moyenne)*($coeff->coef))/($divisePar->somme) ;

                     }

            $an = new Annee ;
            $an->intitule = $moyenne ;
            $an->save() ;

            //Passage à l'etudiant suivant

            $moyenne = 0.0 ;

     }

        return view('frontEnd.test', compact('etudiants','divisePar')) ;
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
