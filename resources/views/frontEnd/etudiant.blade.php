@extends('layouts.app')

@section('title')
CampusManager
@endsection

@section('content')
<div class="container">

      <div class=" text-center">
                <img class="d-block mx-auto" src="#" alt="" width="72" height="72">

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Gestion des étudiants</a></li>
    <li class="breadcrumb-item active" aria-current="page">Inscrire un étudiant</li>
  </ol>
</nav>

          <!--        <div class="alert alert-success">                 
                <h2>Etudiants</h2>
                </div>
 -->
                <br>
                <p class="lead">
                Ajouter les étudiants inscrits dans votre université 
                
               @if(session()->has('ok'))
               <div class="alert alert-warning alert-dismissible " >{!! session('ok') !!}</div>
                @endif
                </p>
      </div>
    <hr class="mb-3">

    <div class="row justify-content-center">
        <div class="col-md-6">

                <div class="card">
                    <div class="card-header">Ajouter un étudiant</div>

                         <div class="card-body">

                  <form class="needs-validation" method="POST" action="{{ route('etudiant.store') }}">

                            {!! csrf_field() !!}

<div class="row">

              <div class="col-sm-4">
                <label for="nom">Année Académique</label>
                  <select name="annee" class="form-control">                  
                     @foreach($annee as $a)
                    <option value="{{$a->intitule}}">"{{$a->intitule}}"</option>
                     @endforeach
                  </select>
                </div>

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

                <div class="col-sm-4 text-center">
                
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
                  <select name="semestre1" class="form-control">
                    <option value="+47">Choisir...</option>
                     @foreach($semestre as $s)
                    <option value="{{$s->intitule}}">"{{$s->intitule}}"</option>
                     @endforeach
                  </select>
                </div>
                <div class="col-sm-4 text-center">
                <span>et</span>
                </div>

                 <div class="col-sm-4">
                <label for="nom">Semestre</label>
                  <select name="semestre2" class="form-control">
                    <option value="+47">Choisir...</option>
                     @foreach($semestre as $s)
                    <option value="{{$s->intitule}}">"{{$s->intitule}}"</option>
                     @endforeach
                  </select>
                </div>

                                <div class="col-md-8 mb-3">
                                
                                  <label for="matricule">Matricule</label> 
                                  <input name="matricule" type="text" class="form-control" id="" placeholder="" value="" autocomplete="on">
                                   
                                  <label for="nom">Nom</label> 
                                  <input name="nom" type="text" class="form-control" id="" placeholder="" value="" autocomplete="on">
                                  
                                   <label for="prenom">Prenom</label> 
                                  <input name="prenom" type="text" class="form-control" id="" placeholder="" value="" autocomplete="on">
                                   
                                   <label for="datenaissance">Date de Naissance</label> 
                                  <input name="datenaissance" type="date" class="form-control" id="" placeholder="" value="" autocomplete="on">
                                 
                                   <label for="lieunaissance">Lieu de naissance</label> 
                                  <input name="lieunaissance" type="text" class="form-control" id="" placeholder="" value="" autocomplete="on">
                                  
                                   <label for="telephone">Telephone</label> 
                                  <input name="telephone" type="text" class="form-control" id="" placeholder="" value="" autocomplete="on">
                                  
                                </div> 
                                
        </div>
          <div class="row justify-content-center">
                               <div class="col-md-5 order-md-1 col-md-offset-1">
                               
                                <button class="btn btn-success btn-block" type="submit">Valider</button>

                              </div>
</div>
                  </form>

               </div>
           </div>

       </div>

     </div>
  </div>

</div>


@endsection
