@extends('layouts.app')

@section('title')
CampusManager
@endsection

@section('content')
<div class="container">

      <div class=" text-center">
 
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Délibération</a></li>
            <li class="breadcrumb-item active" aria-current="page">Effectuer une délibération</li>
          </ol>
        </nav>
              <!--     <div class="alert alert-success">
                <h2>Délibération</h2>
                  </div>  -->
                <br>

                <div class="row justify-content-center">
                 <div class="col-sm-8">
                      <p class="lead">
                          <div class="alert alert-primary" role="alert">
                              Effectuez une délibérarion ici
                          </div>
                      </p>
                  </div>
                </div>

      </div>
  
        <hr class="mb-4">
    <form class="needs-validation" method="get" action="{{ url('/deliberation/rechercheResultat') }}"  id="resultatDeliberation">
                            
                            {!! csrf_field() !!}

 <div class="card">
                    <div class="card-header">Rechercher des Etudiants</div>

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
                  <select name="institut" class="form-control" id="institut">
                    <option value="+47">Choisir...</option>
                    @foreach($institut as $i)
                    <option value="{{$i->intitule}}">{{ $i->intitule}}</option>
                    @endforeach
                  </select>
                </div>

              <div class="col-sm-4">
                <label for="nom">Département</label>
                  <select name="departement" class="form-control" id="departement">
                    <option value="Choisir...">Choisir...</option>
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

 <span for="compenseNote" style="padding:2px;">Compenser à partir de </span> 
 <input name="compenseNote" type="text" class="form-control" id="" placeholder="ex : 9.90" value="" autocomplete="on" style="margin-top:10px;">
  
</div>          


</div>
 <div class="row justify-content-center">
              <div class="col-sm-4 py-3">
                <button type="submit" class="btn btn-success btn-block">
                <i class="fa fa-graduation-cap"></i> Délibérer </button>
               </div>
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

        <div class="col-sm-12 resultat">
          
        </div>

</div>


  </div>
</div>


@endsection

@section('scripts')

<script type="text/javascript">

document.addEventListener('DOMContentLoaded',function() {
    document.querySelector('select[name="institut"]').onchange=changeEventHandler;
},false);

function changeEventHandler(event) {
          // You can use “this” to refer to the selected element.

           $.ajax({
              type : 'get',
              url :  "{{ url('departement') }}" ,
              data : {'institut': event.target.value },
              dataType : 'json',
           }).done(function(data){

            $('#departement').empty();
            $.each(data.dep, function(i,d){

              $('#departement').append($('<option>',{
                
                 value:d.intitule,
                 text:d.intitule

                }));

            })

       })

}



 // $('#resultatDeliberation').on('submit', function(e){
 //   e.preventDefault() ;
 //      $(".resultat").progressBarTimer({
 //      timeLimit: 5,
 //      warningThreshold: 3,
 //      autoStart: true, 
 //      smooth: true, 
 //      label: { show: true, type: 'percent'},
 //        onFinish  : function () {
        
 //         }
 //      }).start()

 // })


     $('#resultatDeliberation').on('submit', function(e){
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
