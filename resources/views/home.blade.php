@extends('layouts.app')

@section('title')
CampusManager
@endsection


@section('content')
<div>
    <div class="row justify-content-center">
        <div class="col-md-6">

         <img src="{{asset('img/Accueil.gif')}}" alt=""
                             class="circle responsive-img valign profile-image-login">

        </div>

        <div class="col-md-6">
                   <div class="py-5 text-center">
                            <img class="d-block mx-auto mb-4" src="#" alt="" width="72" height="72">
                            <h2>Campus Manager</h2>
                          <hr class="mb-4">
                            <p class="lead">
                          Gérez votre université de façon professionnelle avec une productivité dépassant toute concurrence 
                           </p>
                  </div>
        </div>

 <div class="col-md-6">
        <div id="tuto">
        <p v-text="citation"></p>
       </div>

  </div>     

    </div>
</div>
@endsection

@section('scripts')

<script type="text/javascript">

var vm = new Vue({
 el: '#tuto',
 data: {
     citation: '"Après  le  pain,  l’éducation est  le premier  besoin d’un peuple !"',
   }
});

setTimeout(function(){ vm.citation = 'Mon autre texte'; }, 3000);

</script>

@endsection


