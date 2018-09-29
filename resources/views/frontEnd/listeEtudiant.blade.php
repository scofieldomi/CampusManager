@extends('layouts.app')

@section('title')
CampusManager
@endsection


@section('content')
<div class="container">


      <div class=" text-center">
            
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Gestion des étudiants</a></li>
            <li class="breadcrumb-item active" aria-current="page">Liste des étudiants</li>
          </ol>
        </nav>

              <!--     <div class="alert alert-success">
                <h2>Liste des étudiants</h2>
                  </div>   -->
                <br>
                <p class="lead">
              Voir la liste des étudiants enregistrés
                </p>
      </div>
        <hr class="mb-4">

 <div class="card">
                    <div class="card-header">Indiquer les critères de recherche</div>

                         <div class="card-body">

    <div class="row justify-content-center">


                <div class="col-sm-4">
                <label for="nom">Année Académique</label>
                  <select name="annee" class="form-control">                  
                    <option value="">Choisir...</option>

                  </select>
                </div>


                 <div class="col-sm-4">
                <label for="nom">Institut</label>
                  <select name="institut" class="form-control">
                    <option value="+47">Choisir...</option>
                  </select>
                </div>

              <div class="col-sm-4">
                <label for="nom">Département</label>
                  <select name="departement" class="form-control">
                    <option value="+47">Choisir...</option>
                  </select>
                </div>
       
                <div class="col-sm-4">
                <label for="nom">Cycle</label>
                  <select name="cycle" class="form-control">
                    <option value="+47">Choisir...</option>
               
                  </select>
                </div>

       
                <div class="col-sm-4">
                <label for="nom">Filière</label>
                  <select name="filiere" class="form-control">
                    <option value="">Choisir...</option>
                
                  </select>
                </div>

                  <div class="col-sm-4">
                  </div>

            <div class="col-sm-4 py-3">
                <a href="#" class="btn btn-success btn-block">
                    Rechercher</a>
              </div>
        </div>
    </div>
  </div>
</div>
</div>

    <div class="row justify-content-center">
        <div class="col-md-10">

    <!-- <div style="text-align:center; color:#909090; font-size:8pt;"> Faire un double-clic pour afficher la liste des demandeurs</div> -->
@if($compte != 0)
      <table id="students" class="table table-striped table-bordered table-hover" style="width:100%">
        <thead class="thead-light">
              <tr>
                <th>#</th>
                <th>Année Académique </th>
                <th>Matricule</th>
                <th>Nom</th>
                <th>Prenom</th>  
                <th>Cycle</th> 
                <th>Filiere</th>
                <th>Détails</th>
                <th>Modifier</th>
                <th>Supprimer</th>
              </tr>
        </thead>

        <tbody>
              @foreach($etudiant as $e)
                  <tr>
                    <th scope="row center">{{ $i++ }}</th>
                    <td>{{ $e->a}}</td>
                    <td>{{ $e->matricule}}</td>
                    <td>{{ $e->nom}}</td>
                    <td>{{ $e->prenom}}</td>
                    <td>{{ $e->c}}</td>
                    <td>{{ $e->f}}</td>
                    <td> 
                     <a href="#" class="btn btn-success btn-block">
                    details</a>
                   </td>

                   <td> 
                   <a href="#" class="btn btn-primary btn-block">
                    Modifier</a>
                   </td>

                   <td>
                    <a href="#" class="btn btn-danger btn-block">
                    Supprimer</a>
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


@endsection