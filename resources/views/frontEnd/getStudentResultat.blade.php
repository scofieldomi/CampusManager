    @include('layouts.style')
    
  <div class="row justify-content-center">
        <div class="col-md-8">

            

<form target="_blank" class="needs-validation" method="POST" action="{{ route('deliberation.imprimer') }}">

                            {!! csrf_field() !!}

        <table id="students" class="table table-striped table-bordered" style="width:100%">
        <thead class="thead-light">
              <tr>

                <th>Rang</th>
                <th>Matricule</th>
                <th>Nom</th>
                <th>Prenom</th> 
                <th>Moyenne</th> 
                <th>Mention</th> 
           
              </tr>
        </thead>

        <tbody>

               @foreach($resultats->unique('etudiant_matricule') as $r)
                  <tr>

                    <th scope="row center">{{ $r->rang }}</th>
                    <td>{{ $r->etudiant_matricule }}</td>
                    <td>{{ $r->nom }}</td>
                    <td>{{ $r->prenom }}</td>
                    <td>{{ $r->moyenne }} </td>
                    <td>{{ $r->mention }}</td>
                    <input type="hidden" name="annee" value="{{ $annee_id }}">
                    <input type="hidden" name="session" value="{{ $session_id }}">
                    <input type="hidden" name="cycle" value="{{ $cycle_id }}">
                    <input type="hidden" name="filiere" value="{{ $filiere_id }}">
                    <input type="hidden" name="semestre" value="{{ $semestre_id }}">
                    <input type="hidden" name="institut" value="{{ $institut_id }}">
                    <input type="hidden" name="departement" value="{{ $departement_id }}">
                    <input type="hidden" name="matricule" value="{{ $r->etudiant_matricule }}">
                  </tr>
                @endforeach
        </tbody>

</table>

    
<div class="row justify-content-center">  

  <div class="col-sm-4">

        <button type="submit" name="action" class="btn btn-success btn-block" value="PV">
                                Voir le PV
                            </button>
  </div>

   <div class="col-sm-4">

        <button type="submit" name="action" class="btn btn-success btn-block" value="ADMIS">
                                Imprimer
                            </button>
  </div>

</div>



        </div>

     </div>

    <div class="row justify-content-center">
           <div class="col-sm-4">
                    
@if(session()->has('ok'))
               <div class="alert alert-warning alert-dismissible " >{!! session('ok') !!}</div>
                @endif
            </div>
    </div>
     
</form>
        
    </div>




 <script type="text/javascript">
      
    $(document).ready(function() {
        $('#students').DataTable(

  {
      "bJQueryUI": true,
        "sPaginationType": "full_numbers",
      "oLanguage": { 
"sProcessing":   "Traitement en cours...",

     "sLengthMenu":   "Afficher _MENU_",
     "sInfoEmpty": "0 &eacute;tudiant &agrave; afficher",
     "sZeroRecords":  "Aucun &eacute;tudiant &agrave; afficher",
     "sLengthMenu":   "Afficher _MENU_",
     "sInfo": "_START_ &agrave; _END_ sur _TOTAL_",
     "sSearch":       "Rechercher : ",
      "sInfoFiltered": "",
      "sInfoPostFix":  "",
      "sUrl":          "",

"oPaginate": {
                "sFirst":    "|<",
                "sPrevious": "Précédent",
                "sNext":     "Suivant",
                "sLast":     ">|"
            }


           },


    },
            );
    } );  



    </script>

