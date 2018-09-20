
<<!DOCTYPE html>
<html>
<head>
	<title></title>
	
	 <style type="text/css">
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

	 </style>
</head>
<body>

<h2>Université NAZI BONI</h2>


<table class="table">
        <thead class="thead-light">

              <tr>
                <th class="rotate bordurevide" ><div> <span>  {{ $matiere }} </span> </div> </th>
                <th class="rotate" ><div> <span>  nom </span> </div></th>
                <th class="rotate" ><div> <span>  prenom </span> </div></th>  
              </tr>

        </thead>

        <tbody>
              @foreach($etudiants as $e)
                  <tr>

                    <td>{{ $e->matricule}}</td>
                    <td>{{ $e->nom}}</td>
                    <td>{{ $e->prenom}}</td>

                  </tr>
                @endforeach
        </tbody>

</table>

</body>
</html>
