
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title')</title>

    @include('layouts.style')
    @yield('style')


</head>
<body>

 @if(Auth::check())

 <header class="top-bar">
    <div class="container">
        <div class="clearfix">
          
            <div class="col-right float_right">
               
            </div>
        </div>
    </div>
</header>

<div class = "span12">
 <img src="{{asset('img/Logo.gif')}}" alt=""
                             class="circle responsive-img valign profile-image-login">
<!--width : 1175px-->

</div>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
<!--   <a class="navbar-brand" href="#">Campus Manager</a> -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse col-right" id="navbarNavDropdown" >
    <ul class="navbar-nav">

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Gestion des étudiants
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="{{ route('etudiant.index') }}">Inscrire un étudiant</a>
             <a class="dropdown-item" href="#">Rechercher un étudiant</a>
          <a class="dropdown-item" href="{{ route('etudiant.liste') }}">Voir la liste des étudiants</a>
          
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Gestion des enseignants
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Ajouter un enseignant</a>
          <a class="dropdown-item" href="#">liste des enseignants</a>
          <a class="dropdown-item" href="#">Assigner un module à un enseignant</a>
          <a class="dropdown-item" href="#">Envoyer un email à un enseignant</a>
         
        </div>
      </li>


      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Gestion des notes
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="{{ route('note.index') }}">Saisie des notes</a>
          <a class="dropdown-item" href="#">Etat des notes</a>
         
        </div>
      </li>

       <li class="nav-item dropdown" >
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Résultats
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

       <a class="dropdown-item" href="#">Effectuer une déliberation</a>
       <a class="dropdown-item" href="#">Procès verbal</a>
       
        </div>
      </li>

      <li class="nav-item dropdown" >
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Comptes
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

       <a class="dropdown-item" href="#">Créer un compte étudiant</a>
       <a class="dropdown-item" href="#">Créer un compte enseignant</a>
       <a class="dropdown-item" href="#">Liste des utilisateurs</a>
        </div>
      </li>


      <li class="nav-item dropdown" style="margin-right: 250px;">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Paramètres
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="{{ route('annee.index') }}">Année Académique</a>
          <a class="dropdown-item" href="{{ route('cycle.index') }}">Gestion des Cycles</a>
          <a class="dropdown-item" href="{{ route('filiere.index') }}">Gestion des Filières</a>
          <a class="dropdown-item" href="{{ route('semestre.index') }}">Gestion des Semestres</a>
          <a class="dropdown-item" href="{{ route('uv.index') }}">Gestion des Unités de Valeur</a>
          <a class="dropdown-item" href="{{ route('module.index') }}">Gestion des Modules</a>
          <a class="dropdown-item" href="{{ route('session.index') }}">Gestion des Sessions</a>

        </div>
      </li>

                        <li class="float-right btn btn-sm " id="logout" >

                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();" class="btn btn-success">
                                   <i class="glyphicon glyphicon-search"></i> <span>Deconnexion</span>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>

                        </li>
                        <li class="float-right btn btn-sm " id="logout">
                            <a href="#" class="btn btn-success">
                               
                                &nbsp;
                               
                                <span> {{ Auth::user()->name }} </span>
                             
                            </a>
                        </li>
                    @else

                    @endif
    </ul>
  </div>
</nav>

        <main>
            @yield('content')
        </main>

    </div>

      <!--   @include('layouts.footer') -->
        @include('layouts.scripts')
        @include('sweet::alert')
        @yield('scripts')

</body>


</div>

</html>
