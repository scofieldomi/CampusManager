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
            <li class="breadcrumb-item active" aria-current="page">Assigner un module à un enseignants</li>
          </ol>
        </nav>
              <!-- <div class="alert alert-success">
                <h2>Liste des étudiants</h2>
                  </div>   -->
                <br>

               <div class="row justify-content-center">
                   <div class="col-sm-8">
                        <p class="lead">
                            <div class="alert alert-primary" role="alert">
                                Assigner un module à un enseignants
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
                <th><strong>Action</strong></th>
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
                    <a href="{{ route('enseignant.storeModule', ['id'=>$e->id]) }}" class="btn btn-success btn-block"><i class="fa fa-plus-square"></i></a>
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