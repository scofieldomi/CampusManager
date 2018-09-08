  <div class="row justify-content-center">
        <div class="col-md-8">


<form class="needs-validation" method="POST" action="#">

                            {!! csrf_field() !!}

        <table class="table">
        <thead class="thead-light">
              <tr>
                <th scope="col">#</th>
                <th scope="col" >Année Académique</th>
                <th scope="col" >Matricule</th>
                <th scope="col" >Nom</th>
                <th scope="col" >Prenom</th> 
                <th scope="col" >Note</th> 

              </tr>
        </thead>

        <tbody>

       @foreach($etudiant as $e)
                  <tr>
                    <th scope="row center">1</th>
                    <td>{{ $annee }}</td>
                    <td>{{ $e->id}}</td>
                    <td>{{ $e->nom}}</td>
                    <td>{{ $e->prenom}}</td>
                    <td><input name="{{ $e->matricule}}" type="text" class="form-control" id="" placeholder="" value="" ></td>

                  </tr>
                @endforeach
        </tbody>

<!--         <tfoot>
            <tr>
              <td colspan="10"> {{ $etudiant->render() }}</td>
            </tr>
          
        </tfoot> -->

</table>
            {{  $etudiant->links() }}

        </div>

     </div>

    <div class="row justify-content-center">
           <div class="col-sm-4">
                    <button type="submit" class="btn btn-success btn-block">
                        Valider les notes
                    </button>
            </div>
    </div>
     
</form>
        
    </div>