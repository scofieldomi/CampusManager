
<<!DOCTYPE html>
<html>
<head>
	<title></title>

	 <style type="text/css">


 .center{

  text-align: center;
}
  
	 table
{
    border-collapse: collapse;

}

 td, th /* Mettre une bordure sur les td ET les th */
{
    border: 1px solid black;
}

 th.rotate{

  height: 200px ;
  white-space: nowrap;

 }

 th.rotate > div {

 	transform:  
 	translate(25px,51px)
 	rotate(-90.0deg);

 	width:15px ;
 }

 th.rotate > div > span {

 	padding: 5px 10px ;

 } 

 .csstransforms & th.rotate {
  height: 140px;
  white-space: nowrap;
}

.empty {
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

<div>
  <div class="droite"> Année Academique : {{ $annee }}</div> 

  <span class="center"> Ministère de l'Enseignement Supérieure, <br>de la Recherche Scientifique <br>et de l'Innovation <br>  </span>
  <span>-----<br></span>
  <span>Université NAZI BONI<br></span>
  <span>-----<br></span>
  <span> Unité de formation et de recherche <br> en science et technologie (UFR/ST) <br><br></span>

</div>

<div class="center"> 

<span>Procès verbal de deliberation du {{ $semestre }} à l'issue des épreuves de la session @if($session  == "rattrapage") de {{ $session }} @else {{ $session }} @endif <br><br></span>

</div>


<table class="table">
        <thead class="thead-light">

              <tr>
                <th class="rotate bordurevide" ><div> <span>Matricule</span> </div> </th>
                <th class="rotate bordurevide" ><div> <span>  Nom </span> </div></th>
                <th class="rotate bordurevide" ><div> <span>  Prenom </span> </div></th>   

                  @foreach($etudiants->unique('module') as $e)
                <th class="rotate" ><div> <span>  {{ $e->module }}</span> </div></th> 
                   @endforeach
              </tr>

        </thead>

        <tbody>
              @foreach($etudiants->unique('matricule') as $e1)

                     
                                  <tr>

                                    <td>{{ $e1->matricule }}</td>
                                    <td>{{ $e1->nom }}</td>
                                    <td>{{ $e1->prenom }}</td>

                            @foreach($etudiants as $e2)

                                          @if($e1->matricule == $e2->matricule)

                                    <td>{{ $e2->moyenne }}</td>

                                           @endif

                             @endforeach           
                      
                                  </tr>

                             

                @endforeach
        </tbody>

</table>

</body>
</html>
