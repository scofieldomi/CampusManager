
               @foreach($etudiants as $e)

				{{ $e->matricule }} <br>

    			{{ $e->nom }} <br>

				{{ $e->prenom }} 

				{{ $divisePar }}


				@endforeach

    