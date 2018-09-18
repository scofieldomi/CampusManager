    @include('layouts.style')
  
  <div class="row justify-content-center">
        <div class="col-md-8">

<form class="needs-validation" method="POST" action="{{ route('note.store') }}">

                            {!! csrf_field() !!}

        <table id="students" class="table table-striped table-bordered" style="width:100%">
        <thead class="thead-light">
              <tr>

                <th>Rang</th>
                <th>Année Académique</th>
                <th>Matricule</th>
                <th>Nom</th>
                <th>Prenom</th> 
                <th>Moyenne</th> 
           
              </tr>
        </thead>

        <tbody>

               @foreach($resultats->unique('etudiant_matricule') as $r)
                  <tr>

                    <th scope="row center">{{ $r->rang }}</th>
                    <td>{{  $r->annee_id }}</td>
                    <td>{{ $r->etudiant_matricule }}</td>
                    <td>{{ $r->rang }}</td>
                    <td>{{ $r->moyenne }} </td>
                    <td>{{ $r->mention }}</td>
                    
                  </tr>
                @endforeach
        </tbody>

</table>

  
  <button type="submit" class="btn btn-success btn-block">
                       Voir PV
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

