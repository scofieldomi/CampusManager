@extends('layouts.app')

@section('title')
CampusManager
@endsection

@section('content')
<div class="container">

      <div class=" text-center">
                <img class="d-block mx-auto mb-4" src="#" alt="" width="72" height="72">
                  <div class="alert alert-success">
                <h2>Liste des étudiants</h2>
                  </div>  
                <br>
                <p class="lead">
              Voir la liste des étudiants enregistrés

                </p>
      </div>
        <hr class="mb-4">

 <div class="card">
                    <div class="card-header">Rechercher des Etudiants</div>

                         <div class="card-body">

    <div class="row justify-content-center">


                <div class="col-sm-4">
                <label for="nom">Année Académique</label>
                  <select name="annee" class="form-control">                  
                    <option value="">Choisir...</option>

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
                <label for="nom">Semestre</label>
                  <select name="semestre1" class="form-control">
                    <option value="+47">Choisir...</option>
                
                  </select>
                </div>
                <div class="col-sm-4 text-center">
                <span>et</span>
                </div>

                 <div class="col-sm-4">
                <label for="nom">Semestre</label>
                  <select name="semestre2" class="form-control">
                    <option value="+47">Choisir...</option>
                    
                  </select>
                </div>

            <div class="col-sm-4">
                <a href="#" class="btn btn-success btn-block">
                    Rechercher</a>
              </div>
        </div>
    </div>
  </div>
</div>
</div>

 <hr class="mb-2">

    <div class="row justify-content-center">
        <div class="col-md-8">

          <table class="table" id="students" class="table table-striped table-bordered" style="width:100%">
        <thead class="thead-light">
              <tr>
                <th scope="col">#</th>
                <th scope="col" >Année Académique</th>
                <th scope="col" >Matricule</th>
                <th scope="col" >Nom</th>
                <th scope="col" >Prenom</th>  
                <th scope="col" >Cycle</th> 
                <th scope="col" >Filiere</th>
                <th scope="col" >Détails</th>
                <th scope="col" >Modifier</th>
                <th scope="col" >Supprimer</th>
              </tr>
        </thead>

        <tbody>
              @foreach($etudiant as $e)
                  <tr>
                    <th scope="row center">1</th>
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
            

        </div>

     </div>
        
    </div>
  </div>
</div>


@endsection

@section('scripts')

<script type="text/javascript">
  
$(document).ready(function() {
    $('#students').DataTable();
} );


</script>


@endsection