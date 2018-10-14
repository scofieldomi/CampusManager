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

               <div class="row justify-content-center">
                   <div class="col-sm-8">
                        <p class="lead">
                            <div class="alert alert-primary" role="alert">
                                Voir la liste des étudiants enregistrés
                            </div>
                        </p>
                    </div>
                </div>
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
                 <i class="fa fa-search"></i>   Rechercher</a>
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
                <th><strong>Année Académique </strong></th>
                <th><strong>Matricule</strong></th>
                <th><strong>Nom</strong></th>
                <th><strong>Prénom</strong> </th>  
                <th><strong>Cycle</strong></th> 
                <th><strong> Filiere</strong></th>
                <th><strong>Détails</strong></th>
                <th><strong>Modifier</strong></th>
                <th><strong>Supprimer</strong></th>
              </tr>
        </thead>

        <tbody>
              @foreach($etudiant as $e)
                  <tr>
                    <th scope="row center">{{ $i++ }}</th>
                    <td><strong>{{ $e->a}}</strong> </td>
                    <td><strong>{{ $e->matricule}}</strong></td>
                    <td><strong>{{ $e->nom}}</strong></td>
                    <td><strong>{{ $e->prenom}}</strong></td>
                    <td><strong>{{ $e->c}}</strong></td>
                    <td><strong>{{ $e->f}}</strong></td>

                    <td> 
                     <a href="#" class="btn btn-success btn-block">
                    <i class="fa fa-address-card"></i></a>
                   </td>

                   <td> 
                   <a href="#" class="btn btn-primary btn-block">
                    <i class="fa fa-edit"></i></a>
                   </td>

                   <td>
                    <a href="#" class="btn btn-danger btn-block" data-toggle="modal" data-target="#myMo" data-myvalue="{{ $e->id }}" data-myvar="{{ $e->nom }}">
                    <i class="fa fa-user-times"></i></a>


                    <div class="modal fade" id="myMo" tabIndex="-1">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header"> 
                            <h4 class="modal-title">Confirmation</h4>
                            <button type="button" class="close" data-dismiss="modal">
                              ×
                            </button>
                         
                          </div>
                          <div class="modal-body">

                            <span id="modal-myvalue"></span> <span id="modal-myvar"></span> <span id="modal-bb"></span>
                            <p class="lead">
                              <i class="fa fa-question-circle fa-lg"></i>  
                              Voulez-vous vraiment supprimer cet étudiant ?
                            </p>
                          </div>
                          <div class="modal-footer">
                            <form method="POST" action="#">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <input type="hidden" name="_method" value="DELETE">
                              <button type="button" class="btn btn-primary"
                                      data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-danger">
                                <i class="fa fa-times-circle"></i> Yes
                              </button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>


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


// data-* attributes to scan when populating modal values
var ATTRIBUTES = ['myvalue', 'myvar'];

$('[data-toggle="modal"]').on('click', function (e) {
  // convert target (e.g. the button) to jquery object
  var $target = $(e.target);
  // modal targeted by the button
  var modalSelector = $target.data('target');
  
  // iterate over each possible data-* attribute
  ATTRIBUTES.forEach(function (attributeName) {
    // retrieve the dom element corresponding to current attribute
    var $modalAttribute = $(modalSelector + ' #modal-' + attributeName);
    var dataValue = $target.data(attributeName);
    
    // if the attribute value is empty, $target.data() will return undefined.
    // In JS boolean expressions return operands and are not coerced into
    // booleans. That way is dataValue is undefined, the left part of the following
    // Boolean expression evaluate to false and the empty string will be returned
    $modalAttribute.text(dataValue || ''); 
  });

});

</script>


@endsection