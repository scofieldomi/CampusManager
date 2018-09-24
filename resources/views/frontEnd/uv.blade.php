@extends('layouts.app')

@section('title')
CampusManager
@endsection

@section('content')
<div>

      <div class=" text-center">
                <img class="d-block mx-auto" src="#" alt="" width="72" height="72">
                 <div class="alert alert-success">
                <h2>Unités de valeur</h2>
                </div>
                <br>
                <p class="lead">
              Ajouter et lister les Unités de valeur
                </p>
      </div>
    <hr class="mb-3">

    <div class="row justify-content-center" style="padding:10px;">
        <div class="col-md-6">

                <div class="card">
                    <div class="card-header">Unités de valeur</div>

                         <div class="card-body">


                  <form class="needs-validation" method="POST" action="{{ route('uv.store') }}">

                            {!! csrf_field() !!}

<div class="row" >

              <div class="col-sm-4">
                <label for="nom">Institut</label>
                  <select name="institut" class="form-control">
                    <option value="+47">Choisir...</option>
                    @foreach($institut as $i)
                    <option value="{{$i->intitule}}">{{ $i->intitule}}</option>
                    @endforeach
                  </select>
                </div>

              <div class="col-sm-4">
                <label for="nom">Departement</label>
                  <select name="departement" class="form-control">
                    <option value="+47">Choisir...</option>
                    @foreach($departement as $d)
                    <option value="{{$d->intitule}}">{{ $d->intitule}}</option>
                    @endforeach
                  </select>
                </div>
       
              <div class="col-sm-4">
                <label for="nom">Cycle</label>
                  <select name="cycle" class="form-control">
                    <option value="+47">Choisir...</option>
                    @foreach($cycle as $c)
                    <option value="{{$c->intitule}}">{{ $c->intitule}}</option>
                    @endforeach
                  </select>
                </div>

       
                <div class="col-sm-4">
                <label for="nom">Filière</label>
                  <select name="filiere" class="form-control">
                    <option value="">Choisir...</option>
                    @foreach($filiere as $f)
                    <option value="{{$f->intitule}}">"{{$f->intitule}}"</option>
                    @endforeach
                  </select>
                </div>

                 <div class="col-sm-4">
                <label for="nom">Semestre</label>
                  <select name="semestre" class="form-control">
                    <option value="+47">Choisir...</option>
                     @foreach($semestre as $s)
                    <option value="{{$s->intitule}}">"{{$s->intitule}}"</option>
                     @endforeach
                  </select>
                </div>

</div>

<div class="row">
                                <div class="col-md-8 mb-3">
                                
                                  <label for="annee">Code</label> 
                                  <input name="code" type="text" class="form-control" id="" placeholder="" value="" >
                                   
                                  <label for="annee">UV</label> 
                                  <input name="uv" type="text" class="form-control" id="" placeholder="" value="" >
                                  
                                </div> 
</div>
                           <div class="col-md-3 order-md-1 col-md-offset-1">
                           
                            <button class="btn btn-success btn-lg btn-block" type="submit">Valider</button>

                            </div>

                  </form>

           </div>
        </div>


    </div>

        <div class="col-md-6">

          <table class="table" >
        <thead class="thead-light">
              <tr>
                <th scope="col">#</th>
                <th scope="col" >Code</th>
                <th scope="col" >UV</th>
                <th scope="col" >Institut</th>
                <th scope="col" >Département</th>
                <th scope="col" >Cycle</th>
                <th scope="col" >Filiere</th>
                <th scope="col" >Semestre</th>
                <th scope="col" >Action</th>
              </tr>
        </thead>

        <tbody>
              @foreach($uv as $u)
                  <tr>
                    <th scope="row center">1</th>
                    <td>{{ $u->code }}</td>   
                    <td>{{ $u->uv }}</td> 
                    <td>{{ $u->i }}</td>  
                    <td>{{ $u->d }}</td>  
                    <td>{{ $u->c }}</td>  
                    <td>{{ $u->f }}</td> 
                    <td>{{ $u->s }}</td> 
                    <td> <a href="#" class="btn btn-danger btn-block">
                    Supprimer</a>
                     </td>
                  </tr>
   @endforeach 
        </tbody>
</table>
 {{  $uv->links() }}
        </div>
    </div>
  </div>
</div>


@endsection
