@extends('layouts.app')

@section('title')
CampusManager
@endsection


@section('content')
<div class="container">

      <div class=" text-center">
            
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Gestion des enseignants</a></li>
            <li class="breadcrumb-item active" aria-current="page">Liste des enseignants</li>
          </ol>
        </nav>

              <!--     <div class="alert alert-success">
                <h2>Liste des étudiants</h2>
                  </div>   -->
                <br>

               <div class="row justify-content-center">
                   <div class="col-sm-8">
                        <p class="lead">
                            <div class="alert alert-primary" role="alert">
                                Liste des enseignants
                            </div>
                        </p>
                    </div>
                </div>
      </div>
        <hr class="mb-4">

 </div>
</div>

    <div class="row justify-content-center">
        <div class="col-md-10">

    <!-- <div style="text-align:center; color:#909090; font-size:8pt;"> Faire un double-clic pour afficher la liste des demandeurs</div> -->
@if($enseignant->count()  != 0)

      <table id="students" class="table table-striped table-bordered table-hover" style="width:100%">
        <thead class="thead-light">
              <tr>
                <th>#</th>
                <th><strong>Nom</strong></th>
                <th><strong>Prénom</strong> </th>  
                <th><strong>Institut</strong></th> 
                <th><strong>Département</strong></th>
                <th><strong>Détails</strong></th>
                <th><strong>Modifier</strong></th>
                <th><strong>Supprimer</strong></th>
              </tr>
        </thead>

        <tbody>
              @foreach($enseignant as $e)
                  <tr>
                    <th scope="row center">{{ $i++ }}</th>
                    <td><strong>{{ $e->nom}}</strong></td>
                    <td><strong>{{ $e->prenom}}</strong></td>
                    <td><strong>{{ $e->i}}</strong></td>
                    <td><strong>{{ $e->d}}</strong></td>
                    <td> 
                     <a href="#" class="btn btn-success btn-block">
                    <i class="fa fa-address-card"></i></a>
                   </td>

                   <td> 
                   <a href="#" class="btn btn-primary btn-block">
                    <i class="fa fa-edit"></i></a>
                   </td>

                   <td>
                    <a href="#" class="btn btn-danger btn-block">
                    <i class="fa fa-user-times"></i></a>
                   </td>

                  </tr>
                @endforeach
        </tbody>

</table>
              @else

                    <div class="alert alert-warning" role="alert" id="centre">
                      Vous n'avez pas encore d'enregistrement
                    </div>

                @endif

        </div>

     </div>
        
    </div>
  </div>
</div>


@endsection

@section('scripts')

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
     "sSearch":       "Rechercher ",
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


@endsection