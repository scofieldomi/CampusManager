@extends('layouts.app')

@section('title')
CampusManager
@endsection


@section('content')
<div class="container">

      <div class=" text-center">
                <img class="d-block mx-auto mb-4" src="#" alt="" width="72" height="72">
                 <div class="alert alert-success">
                <h2>Départements</h2>
                </div>
                <br>
                <p class="lead">
              Ajouter et lister les départements de votre université

                </p>
      </div>
        <hr class="mb-4">

    <div class="row justify-content-center">
        <div class="col-md-6">


                <div class="card">
                    <div class="card-header">Départements</div>

                         <div class="card-body">

                  <form class="needs-validation" method="POST" action="{{ route('departement.store') }}">

                            {!! csrf_field() !!}

     <div class="row" >

              <div class="col-sm-4 mb-3">
                <label for="nom">Institut</label>
                  <select name="institut" class="form-control">
                    <option value="+47">Choisir...</option>
                    @foreach($institut as $i)
                    <option value="{{$i->intitule}}">{{ $i->intitule}}</option>
                    @endforeach
                  </select>
                </div>


      </div>

       <div class="row" >



                                <div class="col-md-8 mb-3">
                                
                                  <!-- <label for="annee">Année Académique</label> -->
                                  <input name="departement" type="text" class="form-control" id="" placeholder="Département">
                                  
                                </div> 



                           <div class="col-md-5 order-md-1 col-md-offset-0">
                           
                            <button class="btn btn-success btn-block" type="submit">Valider</button>

                            </div>
      </div>
                  </form>
                         
           </div>
        </div>


    </div>

        <div class="col-md-6">

@if(count($departement) == 0 )

   <div class="alert alert-warning">
        <strong>Désolé</strong> Pas encore d'enregistrement !
    </div>    

@else

          <table class="table">
        <thead class="thead-light">
              <tr>
                <th scope="col">#</th>
                <th scope="col" >Institut</th>
                <th scope="col" >Département</th>
                <th scope="col" >Action</th>
              </tr>
        </thead>

        <tbody>

              @foreach($departement as $d)
                  <tr>
                    <th scope="row center">1</th>
                    <td>{{ $d->i}}</td>
                    <td>{{ $d->d}}</td>
                  
                    <td> <a href="#" class="btn btn-danger btn-block">
                    Supprimer</a>
                     </td>
                  </tr>
                @endforeach
        </tbody>
</table>
            {{  $departement->links() }}
@endif
        </div>
</div>
</div>

</div>


@endsection
