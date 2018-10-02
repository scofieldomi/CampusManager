    @include('layouts.style')
    
  <div class="row justify-content-center">
        <div class="col-md-8">



<form target="_blank" class="needs-validation" method="POST" action="{{ route('deliberation.imprimer') }}">

                            {!! csrf_field() !!}

        <table id="students" class="table table-striped table-bordered" style="width:100%">
        <thead class="thead-light">
              <tr>

                <th><strong>Rang</strong></th>
                <th><strong>Matricule</strong></th>
                <th><strong>Nom</strong></th>
                <th><strong>Prénom</strong></th> 
                <th><strong>Moyenne</strong></th> 
                <th><strong>Mention</strong></th> 
           
              </tr>
        </thead>

        <tbody>

               @foreach($resultats->unique('etudiant_matricule') as $r)
                  <tr>

                    <th scope="row center"><strong>{{ $r->rang }}</strong></th>
                    <td><strong>{{ $r->etudiant_matricule }}</strong></td>
                    <td><strong>{{ $r->nom }}</strong></td>
                    <td><strong>{{ $r->prenom }}</strong></td>
                    <td><strong>{{ $r->moyenne }}</strong></td>
                    <td><strong>{{ $r->mention }}</strong></td>
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

