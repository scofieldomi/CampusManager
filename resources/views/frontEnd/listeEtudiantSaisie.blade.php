@extends('layouts.app')

@section('title')
CampusManager
@endsection


@section('content')
<div class="container">

      <div class=" text-center">
                <img class="d-block mx-auto mb-4" src="#" alt="" width="72" height="72">
                  <div class="alert alert-success">
                <h2>Saisie des notes</h2>
                  </div>  
                <br>
                <p class="lead">
              Saisissez ici les notes des étudiants dans un module
                </p>
      </div>
  

        <hr class="mb-4">
    <form class="needs-validation" method="POST" action="{{ route('note.rechercheEtudiant') }}">
                            {!! csrf_field() !!}

 <div class="card">
                    <div class="card-header">Rechercher des Etudiants</div>

                         <div class="card-body">

    <div class="row justify-content-center">

  
               <div class="col-sm-4">
                <label for="nom">Année Académique</label>
                  <select name="annee" class="form-control">                  
                     @foreach($annee as $a)
                    <option value="{{$a->intitule}}">"{{$a->intitule}}"</option>
                     @endforeach
                  </select>
                </div>

                 <div class="col-sm-4">
                <label for="nom">Session</label>
                  <select name="session" class="form-control">
                     @foreach($session as $s)
                    <option value="{{$s->intitule}}">"{{$s->intitule}}"</option>
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

</div>
 <div class="row justify-content-center">

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

              <div class="col-sm-4">
                <label for="nom">Module</label>
                  <select name="mod" class="form-control">
                    <option value="+47">Choisir...</option>
                     @foreach($module as $m)
                    <option value="{{$m->intitule}}">"{{$m->intitule}}"</option>
                     @endforeach
                  </select>
                </div>

              <div class="col-sm-4 py-3">
                <button type="submit" class="btn btn-success btn-block">
                    Rechercher</button>
               </div>
            </form>
        </div>
  </div>


    </div>
  </div>
</div>
</div>

 <hr class="mb-2">

    <div class="row justify-content-center">
        <div class="col-md-8">


<form class="needs-validation" method="POST" action="#">

                            {!! csrf_field() !!}

          <table class="table">
        <thead class="thead-light">
              <tr>
                <th scope="col">#</th>
                <th scope="col" >Année Académique</th>
                <th scope="col" >Matricule</th>
                <th scope="col" >Nom</th>
                <th scope="col" >Prenom</th> 
                <th scope="col" >Note</th> 

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
                    <td><input name="{{ $e->matricule}}" type="text" class="form-control" id="" placeholder="" value="" ></td>

                  </tr>
                @endforeach
        </tbody>
</table>
            {{  $etudiant->links() }}

           

        </div>

     </div>

    <div class="row justify-content-center">
           <div class="col-sm-4">
                    <button href="#" type="submit" class="btn btn-success btn-block">
                        Valider les notes
                    </button>
            </div>
    </div>
     
</form>
        
    </div>
  </div>
</div>


@endsection
