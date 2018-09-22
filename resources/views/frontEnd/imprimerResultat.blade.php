
<<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">

	 <style type="text/css">

#center{

  text-align: center;
}

 th.rotate > div {

 	transform:  
 	translate(25px,51px)
 	rotate(-90.0deg);

 	width:30px ;
 }

 th.rotate > div > span {

 	padding: 5px 10px ;

 } 

 .csstransforms & th.rotate {
  height: 140px;
  white-space: nowrap;
}

#empty {
  display: none;
}

.bordurevide { border-style: none  }

.droite
{
    text-align: right;
}

	 </style>
</head>
<body>

<div class="row justify-content-center">
  
        <div class="col-sm-5" id="center">

                  <span>Ministère de l'Enseignement Supérieure, <br>de la Recherche Scientifique et de l'Innovation </span>

                  <hr class="mb-1">

                  <span > Université NAZI BONI </span>

                  <hr class="mb-1">

                  <span> Unité de formation et de recherche en science et technologie (UFR/ST)</span>

            
        </div>

        <div class="droite">
          Année Academique : {{ $annee }}
        </div>


</div>

<div class="row">
  
        <div class="col-sm-12 py-5" id="center">

     <span>Sous reserve d'un controle approfondi les étudiants dont les noms suivent sont déclarés admis par ordre de merite au
     {{ $semestre }} à l'issue des épreuves de la session @if($session  == "rattrapage") de {{ $session }} @else {{ $session }} @endif </span>

        </div>

</div>

<table class="table">
        <thead class="thead-light">

              <tr>
                <th><div> <span>  Rang </span> </div> </th>
                <th><div> <span>  Matricule </span> </div></th>
                <th><div> <span>  Nom </span> </div></th>  
                <th><div> <span>  Prénom </span> </div></th>
             
                <th><div> <span>  Mention </span> </div></th>
              </tr>

        </thead>

        <tbody>
              @foreach($resultats->unique('etudiant_matricule') as $r)
               @if( $r->moyenne >= 10)
                  <tr>

                    <th scope="row center">{{ $r->rang }}</th>
                    <td>{{ $r->etudiant_matricule }}</td>
                    <td>{{ $r->nom }}</td>
                    <td>{{ $r->prenom }}</td>
               
                    <td>{{ $r->mention }}</td>
                  </tr>
                  @endif
                @endforeach
        </tbody>

</table>


</div>

</body>
</html>
