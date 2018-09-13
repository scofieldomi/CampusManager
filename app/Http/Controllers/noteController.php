<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input ;

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

class noteController extends Controller
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
      $module = Module::All();

      // $etudiant = array() ;

      return view('frontEnd.note', compact('annee','cycle','filiere','semestre','session','module')) ;

    }


  public function rechercheEtudiant(Request $request){

    if($request->ajax()){

         $annee = $request->annee ;

        $annee_r = Annee::where('intitule', '=',$request->annee)->first() ;
        $annee_id = $annee_r->id ;

         $module_r = Module::where('intitule', '=', $request->mod)->first() ;
         $module_id = $module_r->id ;
        //$module_id = 1 ;

        $etudiant = $this->data($module_id) ;

        if(count($etudiant) > 0){

            $view = view('frontEnd.getStudentNoteList', compact('etudiant','annee'))->render() ;
            return response($view) ;
        }

    }
 }

 public function getStudentPagination(Request $request){

     if($request->ajax()){

         $annee = $request->annee ;

         $module_r = Module::where('intitule', '=', $request->mod)->first() ;
         $module_id = $module_r->id ;
        
         $etudiant = $this->data($module_id) ;

         return view('frontEnd.getStudentNoteList', compact('etudiant','annee'))->render() ;
  }
}
 
  public function data($mode)
    {
        
         return $etudiant= Inscription::join('etudiants', 'inscriptions.etudiant_matricule', '=' ,'etudiants.matricule')
                        ->join('unites','inscriptions.unite_id','=','unites.id')
                        ->join('cycles','unites.cycle_id','=','cycles.id')
                        ->join('filieres','unites.filiere_id','=','filieres.id')
                        ->join('semestres','unites.semestre_id','=','semestres.id')
                        ->join('annees','annees.id','=','inscriptions.annee_id')
                        ->join('modules','modules.unite_id','=','unites.id')
                        ->select('etudiants.matricule','etudiants.nom','etudiants.prenom','modules.id as mid')
                        ->groupBy('etudiants.matricule','etudiants.nom','etudiants.prenom','unites.code','modules.id')
                        ->having('modules.id', '=', $mode)
                        ->get() ; 

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
   $notes = $request->input('note') ;

   foreach ($notes as $key => $value) {
       
        $annee = new Annee ;
        $annee->intitule = $value;
        $annee->save() ;

   }

       return redirect()->back() ;

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
