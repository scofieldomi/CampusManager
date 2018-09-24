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
use App\Resultat;
use App\Institut;
use App\Departement;

use PDF ;

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
      $institut = Institut::All() ;
      $departement = Departement::All() ;
      $cycle = Cycle::All();
      $filiere = Filiere::All();
      $semestre = Semestre::All();
      $session = Session::All();

      return view('frontEnd.deliberation', compact('annee','cycle','filiere','semestre','session','institut','departement')) ;

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


  public function rechercheResultat(Request $request){

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

        $session = Session::where('intitule', '=',$request->session)->first() ;
        $session_id = $session->id ;

        $resultats = $this->data($annee_id, $cycle_id, $filiere_id, $semestre_id, $session_id, $institut_id, $departement_id) ;

        if(count($resultats) > 0){

          $compte = $resultats->count() ;
          $i = 1 ;

            $view = view('frontEnd.getStudentResultat',compact('resultats','annee_id','session_id','cycle_id','filiere_id','semestre_id','institut_id','departement_id'))->render() ;

            return response($view) ;
        }

    }
 }



    /** Calcul de la moyenne
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function data($annee_id, $cycle_id, $filiere_id, $semestre_id, $session_id, $institut_id, $departement_id)
    {
        //
     
       $moyenne = 0.0 ;
       $lesMoyennes = array();
       $rang = 1 ;
       $mention = "" ;
       $decision = "" ;

//recherche de la somme des coefficients d'un CFS 
        $divisePar = Unite::join('modules', 'modules.unite_id', '=' , 'unites.id')
                        ->where('unites.institut_id', '=', $institut_id)
                        ->where('unites.departement_id', '=', $departement_id)
                        ->where('unites.cycle_id', '=', $cycle_id)
                        ->where('unites.filiere_id', '=', $filiere_id)
                        ->where('unites.semestre_id', '=', $semestre_id)
                        ->select(DB::raw('sum(coef) as somme'))
                        ->first(); 

         $etudiants = Inscription::join('etudiants', 'inscriptions.etudiant_matricule', '=' ,'etudiants.matricule')
                        ->join('unites','inscriptions.unite_id','=','unites.id')
                        ->join('instituts','unites.institut_id','=','instituts.id')
                        ->join('departements','unites.departement_id','=','departements.id')
                        ->join('cycles','unites.cycle_id','=','cycles.id')
                        ->join('filieres','unites.filiere_id','=','filieres.id')
                        ->join('semestres','unites.semestre_id','=','semestres.id')
                        ->join('annees','annees.id','=','inscriptions.annee_id')
                        ->join('modules','modules.unite_id','=','unites.id')
                        ->where('unites.institut_id', '=', $institut_id)
                        ->where('unites.departement_id', '=', $departement_id)
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
            $moyenne += (($m->moyenne)*($coeff->coef))/($divisePar->somme) ; //Calul de la moyenne

                     }

           $lesMoyennes[$e->matricule] = $moyenne ;
            //Passage à l'etudiant suivant

            $moyenne = 0.0 ;

     }

// Tri decroissant du tableau en fonction de la moyenne

     arsort($lesMoyennes, SORT_NATURAL) ;

     foreach ($lesMoyennes as $matricul => $moyenn) {

//Recherche de la mention

          switch ($moyenn) {

             case ( $moyenn < 10) :
                  $mention = "Insuffisant" ;
                  break;

              case ( $moyenn >= 10 && $moyenn < 12) :
                  $mention = "Passable" ;
                  break;

              case ($moyenn >= 12 && $moyenn < 14) :
                  $mention = "Assez Bien" ;
                  break;

              case ($moyenn >= 14 && $moyenn < 16) :
                  $mention = "Bien" ;
                  break;

              case ( $moyenn >= 16 && $moyenn < 18) :
                  $mention = "Très Bien" ;
                  break;

              case ( $moyenn >= 18) :
                  $mention = "Excellent" ;
                  break;
              
              default:
                  # code...
                  break;
          }
// Recherche de la decision du jury
          switch ($moyenn) {

              case ( $moyenn < 10) :
                  $decision = "Ajourné" ;
                  break;

              case ($moyenn >= 10) :
                  $decision = "Validé" ;
                  break;
              
              default:
                  # code...
                  break;
          }


           $resultat = new Resultat ;
           $resultat->moyenne = $moyenn ;
           $resultat->rang = $rang ;
           $resultat->decision = $decision ;
           $resultat->mention = $mention ;
           $resultat->annee_id = $annee_id ;
           $resultat->etudiant_matricule = $matricul ;
           $resultat->institut_id = $institut_id ;
           $resultat->departement_id = $departement_id ;
           $resultat->cycle_id = $cycle_id ;
           $resultat->filiere_id = $filiere_id ;
           $resultat->semestre_id = $semestre_id ;
           $resultat->session_id = $session_id ;

           $resultat->save() ;

           $rang++ ;

     }

//Requete dans la table resultat pour envoie du resultat à la requete Ajax

  return $resultats = Resultat::join('etudiants', 'resultats.etudiant_matricule', '=' ,'etudiants.matricule')
                        ->where('annee_id','=',$annee_id)
                        ->where('institut_id', '=', $institut_id)
                        ->where('departement_id', '=', $departement_id)
                        ->where('cycle_id', '=', $cycle_id)
                        ->where('filiere_id', '=', $filiere_id)
                        ->where('semestre_id', '=', $semestre_id)
                        ->where('session_id', '=', $session_id)
                        ->get() ;

       
}


 public function imprimer(Request $request)
    {


   $annee_id = $request->input('annee') ;

     $a = Annee::where('id', '=',$annee_id)->first() ;
     $annee = $a->intitule ;
  
    $session_id = $request->input('session') ;
    $se = Session::where('id', '=',$session_id)->first() ;
    $session = $se->intitule ;

    $institut_id = $request->input('institut') ;
    $i = Institut::where('id', '=',$institut_id)->first() ;
    $institut = $i->intitule ;

    $departement_id = $request->input('departement') ;
    $d = Departement::where('id', '=',$departement_id)->first() ;
    $departement = $d->intitule ;



    $cycle_id = $request->input('cycle') ;
    $filiere_id = $request->input('filiere') ;

    $semestre_id = $request->input('semestre') ;
    $s = Semestre::where('id', '=',$semestre_id)->first() ;
    $semestre = $s->intitule ;

if($request->action == 'ADMIS'){

   $resultats = Resultat::join('etudiants', 'resultats.etudiant_matricule', '=' ,'etudiants.matricule')
                        ->where('institut_id', '=', $institut_id)
                        ->where('departement_id', '=', $departement_id)
                        ->where('annee_id','=',$annee_id)
                        ->where('cycle_id', '=', $cycle_id)
                        ->where('filiere_id', '=', $filiere_id)
                        ->where('semestre_id', '=', $semestre_id)
                        ->where('session_id', '=', $session_id)
                        ->OrderBy('rang','asc')
                        ->get() ;
              

        $pdf = PDF::loadView('frontEnd.imprimerResultat',['resultats'=>$resultats,'annee'=>$annee,'semestre'=>$semestre,'session'=>$session,'institut'=>$institut,'departement'=>$departement]) ;

        return $pdf->stream('resultats.pdf') ;

      } else if($request->action == 'PV')  {


    $etudiants = Inscription::join('etudiants', 'inscriptions.etudiant_matricule', '=' ,'etudiants.matricule')
                        ->join('unites','inscriptions.unite_id','=','unites.id')
                        ->join('cycles','unites.cycle_id','=','cycles.id')
                        ->join('filieres','unites.filiere_id','=','filieres.id')
                        ->join('semestres','unites.semestre_id','=','semestres.id')
                        ->join('annees','annees.id','=','inscriptions.annee_id')
                        ->join('modules','modules.unite_id','=','unites.id')
                        ->join('moyenne_modules','modules.id','=','moyenne_modules.module_id')
                        ->join('resultats','resultats.etudiant_matricule','=','etudiants.matricule')
                        ->where('unites.institut_id', '=', $institut_id)
                        ->where('unites.departement_id', '=', $departement_id)
                        ->where('unites.cycle_id', '=', $cycle_id)
                        ->where('unites.filiere_id', '=', $filiere_id)
                        ->where('unites.semestre_id', '=', $semestre_id)
                        ->select('etudiants.matricule','etudiants.nom','etudiants.prenom','modules.id as mid','modules.intitule as module','moyenne_modules.moyenne','moyenne_modules.etudiant_matricule as em','resultats.moyenne as rm','resultats.rang as rang','resultats.decision as decision','resultats.mention as mention')
                        ->groupBy('etudiants.matricule','etudiants.nom','etudiants.prenom','unites.code','modules.id','moyenne_modules.moyenne','modules.intitule','moyenne_modules.etudiant_matricule','resultats.moyenne','resultats.rang','resultats.decision','resultats.mention')
                        ->havingRaw('etudiants.matricule=moyenne_modules.etudiant_matricule')
                        ->OrderBy('etudiants.nom','asc')
                        ->OrderBy('etudiants.prenom','asc')
                        ->get() ; 


        $pdf = PDF::loadView('frontEnd.imprimerPV',['etudiants'=>$etudiants,'annee'=>$annee,'semestre'=>$semestre,'session'=>$session,'institut'=>$institut,'departement'=>$departement]) ;
        $pdf->setPaper('legal','landscape');

        return $pdf->stream('pv.pdf') ;

      }

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
