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
                          Gérez votre université de façon professionnelle avec une productivité depassant toute concurrence 
                           </p>
                  </div>
        </div>

    </div>
</div>
@endsection


