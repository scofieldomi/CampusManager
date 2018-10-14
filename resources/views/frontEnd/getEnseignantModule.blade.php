    @include('layouts.style')
    
  <div class="row justify-content-center">
        <div class="col-md-8">



<form class="needs-validation" method="POST" action="{{ route('deliberation.imprimer') }}">

                            {!! csrf_field() !!}

        <table id="students" class="table table-striped table-bordered" style="width:100%">
        <thead class="thead-light">
              <tr>

                <th><strong>Unité de valeur </strong></th>
                <th><strong>Module</strong></th>
                <th><strong>Enseigne</strong></th> 
           
              </tr>
        </thead>

        <tbody>

               @foreach($modules as $m)
                  <tr>
                    <td><strong>{{ $m->uv }}</strong></td>
                    <td><strong>{{ $m->intitule}}</strong></td>
                    <td><strong> <input class="form-control"  type="checkbox" name="choixModule[]" value=""> </strong></td>
                  </tr>
                @endforeach
        </tbody>

</table>

    
<div class="row justify-content-center">  

  <div class="col-sm-4">

        <button type="submit" class="btn btn-success btn-block" >
                               <i class="fa fa-chevron-circle-down"></i> Validé
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

