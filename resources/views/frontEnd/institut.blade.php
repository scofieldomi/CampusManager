@extends('layouts.app')

@section('title')
CampusManager
@endsection


@section('content')
<div class="container">

      <div class=" text-center">
                <img class="d-block mx-auto mb-4" src="#" alt="" width="72" height="72">
                 <div class="alert alert-success">
                <h2>Instituts</h2>
                </div>
                <br>
                <p class="lead">
              Ajouter et lister les instituts ou écoles de votre université

                </p>
      </div>
        <hr class="mb-4">

    <div class="row justify-content-center">
        <div class="col-md-6">


                <div class="card">
                    <div class="card-header">Institut ou Ecole</div>

                         <div class="card-body">

                  <form class="needs-validation" method="POST" action="{{ route('institut.store') }}">

                            {!! csrf_field() !!}

                                <div class="col-md-8 mb-3">
                                
                                  <!-- <label for="annee">Année Académique</label> -->
                                  <input name="institut" type="text" class="form-control" id="" placeholder="" value="" >
                                  
                                </div> 

                           <div class="col-md-3 order-md-1 col-md-offset-1">
                           
                            <button class="btn btn-success btn-lg btn-block" type="submit">Valider</button>

                            </div>

                  </form>
                         
           </div>
        </div>


    </div>

        <div class="col-md-6">

@if(is_null($institut))

   <div class="alert alert-warning">
        <strong>Désolé</strong> Pas encore d'enregistrement !
    </div>    

@else

          <table class="table">
        <thead class="thead-light">
              <tr>
                <th scope="col">#</th>
                <th scope="col" >Instituts</th>
                 <th scope="col" >Action</th>
              </tr>
        </thead>

        <tbody>

              @foreach($institut as $i)
                  <tr>
                    <th scope="row center">1</th>
                    <td>{{ $i->intitule}}</td>
                  
                    <td> <a href="#" class="btn btn-danger btn-block">
                    Supprimer</a>
                     </td>
                  </tr>
                @endforeach
        </tbody>
</table>
            {{  $institut->links() }}
@endif
        </div>
</div>
</div>

</div>


@endsection
