<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Alert ;

use App\Cycle;
use App\Filiere;
use App\Semestre;
use App\Annee;
use App\Inscription;
use App\Unite;
use App\Etudiant;
use App\Enseignant;
use App\Institut;
use App\Departement;

class enseignantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $institut = Institut::All();
        $departement = Departement::All() ;

        return view('frontEnd.enseignant', compact('institut','departement')) ;

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

        $uniqueFileName  ;
        $path ;

        if($request->institut != "" || $request->departement != ""){

        $institut = Institut::where('intitule', '=' ,$request->institut)->first();
        $institut_id = $institut->id ;

        $departement = Departement::where('intitule', '=' ,$request->departement)->first();
        $departement_id = $departement->id ;

        }
        else {

            $institut_id = null ;
            $departement_id = null ;

        }

        $enseignant = new Enseignant ;
        $enseignant->institut_id = $institut_id ;
        $enseignant->departement_id = $departement_id ;
        $enseignant->nom = $request->nom ;
        $enseignant->prenom = $request->prenom ;
        $enseignant->telephone = $request->telephone ;
        $enseignant->email = $request->email ;
        $enseignant->civilite = $request->civilite ;
        $enseignant->grade = $request->grade ;

        // sauvegarde du fichier PDF dans public/uploads/pdfs

        if($request->file('cv') != null){

        $uniqueFileName = uniqid() . $request->file('cv')->getClientOriginalName() . '.' . $request->file('cv')->getClientOriginalExtension();

        $path = base_path() . '/public/uploads/pdfs/';

        $request->file('cv')->move($path, public_path('CV') . $uniqueFileName);

        $enseignant->cv = public_path("uploads\pdfs\\") . $uniqueFileName ;

        }else {

             $enseignant->cv = null ;

        }

     $enseignant->save() ;

     Alert::success('Enseignant bien enregistré.','Confirmation')->autoclose(2500);

     if($request->institut != "" || $request->departement != ""){

     return redirect()->route('enseignant.index')->withOk("L'Enseignant ".$request->prenom." ".$request->nom.", à bien été enregistré à ".$request->institut." dans le département ".$request->departement.".");
    
        }
        else{

     return redirect()->route('enseignant.index')->withOk("L'Enseignant ".$request->prenom." ".$request->nom.", à bien été enregistré en tant que vacataire");

        }

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function liste($liste)
    {

     $enseignant= Enseignant::All() ;
     $institut = Institut::All();

     $enseignant= Enseignant::leftJoin('departements', 'enseignants.departement_id', '=' ,'departements.id')
                        ->leftJoin('instituts','enseignants.institut_id','=','instituts.id')
                        ->select('enseignants.id','enseignants.nom','enseignants.prenom','instituts.intitule as i','departements.intitule as d')
                        ->OrderBy('enseignants.nom','asc')
                        ->OrderBy('enseignants.prenom','asc')
                        ->get(); 

      $i = 1 ;

      if($liste != "module") return view('frontEnd.listeEnseignant',compact('enseignant','i')) ;
      else return view('frontEnd.assignerModuleEnseignant',compact('enseignant','i','institut')) ;

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storeModule($id)
    {

      $annee = Annee::OrderBy('annees.intitule','desc')->get() ;
      $institut = Institut::All() ;
      $departement = Departement::All() ;
      $cycle = Cycle::All();
      $filiere = Filiere::All();
      $semestre = Semestre::All();
      $enseignant = Enseignant::find($id) ;

      // $etudiant = array() ;

      return view('frontEnd.moduleEnseignant', compact('annee','cycle','filiere','semestre','institut','departement','enseignant')) ;

    }


      public function rechercheModuleEnseignant(Request $request){

    if($request->ajax()){

        $annee = Annee::where('intitule', '=',$request->annee)->first() ;
        $annee_id = $annee->id ;

        $institut = Institut::where('intitule', '=' ,$request->institut)->first();
        $institut_id = $institut->id ;

        $departement = Departement::where('intitule', '=' ,$request->departement)->first();
        $departement_id = $departement->id ;

        $cycle = Cycle::where('intitule', '=' ,$request->cycle)->first();
        $cycle_id = $cycle->id ;

        $filiere = Filiere::where('intitule', '=',$request->filiere)->first() ;
        $filiere_id = $filiere->id ;

        $semestre = Semestre::where('intitule', '=',$request->semestre)->first() ;
        $semestre_id = $semestre->id ;

        $modules = $this->data($institut_id, $departement_id, $cycle_id, $filiere_id, $semestre_id) ;

         if(count($modules) > 0){

            $view = view('frontEnd.getEnseignantModule', compact('modules'))->render() ;
            return response($view) ;
        }

    }
 }


   public function data($institut_id, $departement_id, $cycle_id, $filiere_id, $semestre_id)
    {
        
         return $modules = Unite::join('modules', 'unites.id', '=' ,'modules.unite_id')
                                ->where('unites.cycle_id', '=', $cycle_id)
                                ->where('unites.institut_id', '=', $institut_id)
                                ->where('unites.departement_id', '=', $departement_id)
                                ->where('unites.filiere_id', '=', $filiere_id)
                                ->where('unites.semestre_id','=',$semestre_id) 
                                ->select('unites.intitule as uv', 'modules.intitule')
                                ->OrderBy('uv','asc')
                                ->get() ; 

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
