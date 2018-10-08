@extends('layouts.app')

@section('title')
CampusManager
@endsection

@section('content')
<div class="container">

      <div class=" text-center">

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Gestion des étudiants</a></li>
    <li class="breadcrumb-item active" aria-current="page">Inscrire un étudiant</li>
  </ol>
</nav>
          <!-- <div class="alert alert-success">                 
                <h2>Etudiants</h2>
                </div>  -->

                <br>
                <p class="lead">
               
               <div class="row justify-content-center">
                   <div class="col-sm-8">
                        <p class="lead">
                            <div class="alert alert-primary" role="alert">
                                 Ajouter les étudiants inscrits dans votre université 
                            </div>
                        </p>
                    </div>
                </div>

               @if(session()->has('ok'))
               <div class="alert alert-success alert-dismissible " >{!! session('ok') !!}</div>
                @endif
                </p>
      </div>
    <hr class="mb-3">

    <div class="row justify-content-center">
        <div class="col-md-6">

                <div class="card">
                    <div class="card-header">Ajouter un enseignant</div>

                         <div class="card-body">

                  <form class="needs-validation" method="POST" action="{{ route('etudiant.store') }}">

                            {!! csrf_field() !!}

<div class="row justify-content-center">


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
                    <option value="+47">Choisir...</option>
                  </select>
                </div>
       </div>

       <div class="row">

                                <div class="col-md-8 mb-3">
                                
                       
                                <label for="nom">Civilité</label>
                                  <select name="departement" class="form-control">
                                    <option value="+47">Choisir...</option>
                                    <option value="+47">Monsieur</option>
                                    <option value="+47">Madame</option>
                                  </select>

                                 <label for="nom">Grade</label>
                                  <select name="departement" class="form-control">
                                    <option value="+47">Choisir...</option>
                                    <option value="+47">Assistant</option>
                                    <option value="+47">Maître Assistant</option>
                                    <option value="+47">Maître de Conférence</option>
                                    <option value="+47">Professeur titulaire</option>
                                  </select>
                             

                                  <label for="nom">Nom</label> 
                                  <input name="nom" type="text" class="form-control" id="" placeholder="" value="" autocomplete="on">
                                  
                                  <label for="prenom">Prénom</label> 
                                  <input name="prenom" type="text" class="form-control" id="" placeholder="" value="" autocomplete="on">
                                   
                                  <label for="telephone">E-mail</label> 
                                  <input name="telephone" type="email" class="form-control" id="" placeholder="" value="" autocomplete="on">
                                  
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

</script>

@endsection