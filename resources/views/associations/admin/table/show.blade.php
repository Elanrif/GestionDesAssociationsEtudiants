@if($association->bureaus->count())

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col" class="fw-bold fs-4 text-muted">#</th>
      <th scope="col" class="fw-bold fs-4 text-muted">Poste</th>
      <th scope="col" class="fw-bold fs-4 text-muted">Nom</th>
      <th scope="col" class="fw-bold fs-4 text-muted">Prenom</th>
      <th scope="col" class="fw-bold fs-4 text-muted">Email</th>
      <th scope="col" class="fw-bold fs-4 text-muted">Numero Tel</th>
      <th scope="col" class="fw-bold fs-4 text-muted">Filière</th>
      <th scope="col" class="fw-bold fs-4 text-muted">Action</th>
    </tr>
  </thead>
  <tbody>

      @foreach($association->bureaus as $bureau)
    <tr>
      <th scope="row">{{ $loop->index+1 }}</th>
      <td class="fw-bold">{{  $bureau->Poste}}</td>
      <td class="fw-bold">{{ $bureau->nom }}</td>
      <td class="fw-bold">{{ $bureau->prenom }}</td>
      <td class="fw-bold" style="max-width:90px;">{{ $bureau->email }}</td>
      <td class="fw-bold" style="max-width:90px;">{{ $bureau->Tel }}</td>
      <td class="fw-bold" style="max-width:90px;">{{ $bureau->filiere}}</td>
     
      <td>
          
    
       <div class="d-flex">
       <!-- pour la suppression d'un membe du bureau  --> 

     @include('associations\bureau\modal\delete')

     <!-- fin -->

      <!-- pour editer un membre du bureau --> 

      @include('associations.bureau.modal.edit')
      <!-- fin --> 

       <!-- button voir --> 

       @include('associations.bureau.modal.view')
        
      </div>



     </td>
    </tr>
     @endforeach
    
  </tbody>
</table>
@endif