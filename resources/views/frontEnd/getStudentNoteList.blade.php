    @include('layouts.style')
  
  <div class="row justify-content-center">
        <div class="col-md-8">

<form class="needs-validation" method="POST" action="{{ route('note.store') }}">

                            {!! csrf_field() !!}
@if($compte != 0)
        <table id="students" class="table table-striped table-bordered" style="width:100%">
        <thead class="thead-light">
              <tr>

                <th> <strong>#</strong></th>
                <th><strong>Année Académique</strong></th>
                <th><strong>Matricule</strong> </th>
                <th><strong>Nom</strong></th>
                <th><strong>Prénom</strong></th> 
                <th><strong>Note</strong></th> 

              </tr>
        </thead>

        <tbody>

               @foreach($etudiant as $e)
                  <tr>

                    <th scope="row center">{{ $i++ }}</th>
                    <td><strong>{{ $annee }}</strong></td>
                    <td><strong>{{$e->matricule}}</strong></td>
                    <td><strong>{{ $e->nom}}</strong></td>
                    <td><strong>{{ $e->prenom}}</strong></td>
                    <td><input type="text" name="note[]" value=""  class="form-control mb-1 mr-sm-1" id="" placeholder="" ></td>
                    <input type="hidden" name="session" value="{{ $session_id }}">
                    <input type="hidden" name="annee" value="{{ $annee_id }}">
                    <input type="hidden" name="module" value="{{ $module_id }}">
                    <input type="hidden" name="matricule[]" value="{{ $e->matricule }}">

                  </tr>
                @endforeach
        </tbody>

</table>


<button type="submit" class="btn btn-success btn-block">
                      <i class="fa fa-chevron-circle-down"></i>  Valider les notes
                    </button>


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


              @else

                    <div class="alert alert-warning" role="alert" id="centre">
                      Vous n'avez pas encore d'enregistrement
                    </div>

     
                @endif