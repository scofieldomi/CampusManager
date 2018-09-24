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
    <form class="needs-validation" method="get" action="{{ url('/note/rechercheEtudiant') }}" id="saisieNote">
                            
                            {!! csrf_field() !!}

 <div class="card">
                    <div class="card-header">Recherche des Etudiants</div>

                         <div class="card-body">

    <div class="row justify-content-center">

               <div class="col-sm-4">
                <label for="nom">Année Académique</label>
                  <select name="annee" class="form-control" id="annee">                  
                     @foreach($annee as $a)
                    <option value="{{$a->intitule}}">"{{$a->intitule}}"</option>
                     @endforeach
                  </select>
                </div>


               <div class="col-sm-4">
               </div>


                 <div class="col-sm-4">
                <label for="nom">Session</label>
                  <select name="session" class="form-control" id="session">
                     @foreach($session as $s)
                    <option value="{{$s->intitule}}">"{{$s->intitule}}"</option>
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
                  <select name="cycle" class="form-control" id="cycle">
                    <option value="+47">Choisir...</option>
                    @foreach($cycle as $c)
                    <option value="{{$c->intitule}}">{{$c->intitule}}</option>
                    @endforeach
                  </select>
                </div>

</div>
 <div class="row justify-content-center">

               <div class="col-sm-4">
                <label for="nom">Filière</label>
                  <select name="filiere" class="form-control" id="filiere">
                    <option value="">Choisir...</option>
                    @foreach($filiere as $f)
                    <option value="{{$f->intitule}}">"{{$f->intitule}}"</option>
                    @endforeach
                  </select>
                </div>

               <div class="col-sm-4">
                <label for="nom">Semestre</label>
                  <select name="semestre" class="form-control" id="semestre">
                    <option value="+47">Choisir...</option>
                     @foreach($semestre as $s)
                    <option value="{{$s->intitule}}">"{{$s->intitule}}"</option>
                     @endforeach
                  </select>
                </div>

              <div class="col-sm-4">
                <label for="nom">Module</label>
                  <select name="mod" class="form-control" id="mod">
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


<div class="resultat">
  

</div>


  </div>
</div>


@endsection

@section('scripts')

<script type="text/javascript">

 $('#saisieNote').on('submit', function(e){
  e.preventDefault() ;
  var url = $(this).attr('action') ;
  var data = $(this).serializeArray() ;
  var get = $(this).attr('method') ;
   $.ajax({
      type : get,
      url :  url,
      data : data
 
   }).done(function(data){
    console.log(data);
    $('.resultat').html(data) ;

   })
 })


// $(document).on('click','.pagination a', function(e){

//  e.preventDefault() ;
// var page = $(this).attr('href').split('page=')[1] ;

// getStudent(page,$('#mod').val(), $('#annee').val()) ;
// })

// function getStudent(page, mod, annee){

// var url = "{{ route('note.getStudentPagination') }}" ;

//    $.ajax({
//       type : 'get',
//       url :  url+'?page='+page,
//       data : {'mod': mod , 'annee':annee}
//    }).done(function(data){
 
//     $('.resultat').html(data) ;

//    })

// }


</script>

@endsection
