@extends('layouts.app')

@section('title')
CampusManager
@endsection

@section('content')
<div class="container">

      <div class=" text-center">
                <img class="d-block mx-auto" src="#" alt="" width="72" height="72">
                 <div class="alert alert-success">
                <h2>Modules</h2>
                </div>
                <br>
                <p class="lead">
              Ajouter et lister les modules d'une unité valeur
                </p>
      </div>
    <hr class="mb-3">

    <div class="row justify-content-center">
        <div class="col-md-6">

                <div class="card">
                    <div class="card-header">Modules</div>

                         <div class="card-body">


                  <form class="needs-validation" method="POST" action="{{ route('module.store') }}">

                            {!! csrf_field() !!}

<div class="row">
       
                <div class="col-sm-4">
                <label for="nom">Code UV</label>
                  <select name="cod" class="form-control">
                    <option value="">Choisir...</option>
                    @foreach($uv as $u)
                    <option value="{{$u->code}}">{{ $u->code}}</option>
                    @endforeach
                  </select>
                </div>

</div>
                                <div class="col-md-8 mb-3">
                                
                                  <label for="annee">Module</label> 
                                  <input name="module" type="text" class="form-control" id="" placeholder="" value="" >
                                   
                                  <label for="annee">Coefficient</label> 
                                  <input name="coef" type="text" class="form-control" id="" placeholder="" value="" >
                                  
                                </div> 

                           <div class="col-md-3 order-md-1 col-md-offset-1">
                           
                            <button class="btn btn-success btn-lg btn-block" type="submit">Valider</button>

                            </div>

                  </form>

           </div>
        </div>


    </div>

        <div class="col-md-6">


          <table class="table">
        <thead class="thead-light">
              <tr>
                <th scope="col">#</th>
                <th scope="col" >Code UV</th>
                <th scope="col" >UV</th>
                <th scope="col" >module</th>
                <th scope="col" >Coef</th>
                <th scope="col" >Action</th>
              </tr>
        </thead>
 
        <tbody>
   @foreach($mod as $m)
                  <tr>
                    <th scope="row center">1</th>
                    <td>{{ $m->code }}</td>   
                    <td>{{ $m->uv }}</td> 
                    <td>{{ $m->m }}</td>  
                    <td>{{ $m->coef }}</td>  
                    <td> <a href="#" class="btn btn-danger btn-block">
                    Supprimer</a>
                     </td>
                  </tr>
     @endforeach 
        </tbody>
</table>
 {{  $mod->links() }}
        </div>
</div>
</div>

</div>


@endsection
