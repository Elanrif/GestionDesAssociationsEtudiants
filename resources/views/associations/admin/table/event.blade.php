@if($association->evenements->count())

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col" class="fw-bold fs-4 text-muted">#</th>
      <th scope="col" class="fw-bold fs-4 text-muted">Type</th>
      <th scope="col" class="fw-bold fs-4 text-muted">Date</th>
      <th scope="col" class="fw-bold fs-4 text-muted">Heure</th>
      <th scope="col" class="fw-bold fs-4 text-muted">Lieu</th>
      <th scope="col" class="fw-bold fs-4 text-muted">Description</th>
      <th scope="col" class="fw-bold fs-4 text-muted">Action</th>
    </tr>
  </thead>
  <tbody>

      @foreach($association->evenements->sortByDesc('id') as $evenement )
    <tr>
      <th scope="row">{{ $loop->index+1 }}</th>
      <td class="fw-bold">{{ $evenement->type }}</td>
      <td class="fw-bold">{{ $evenement->date }}</td>
      <td class="fw-bold">{{ $evenement->heure }}</td>
      <td class="fw-bold" style="max-width:90px;"> {{ $evenement->lieu }}</td>
      <td class="fw-bold" style="max-width:90px;">{{ $evenement->description }}</td>
     
     
      <td>
          
    
       <div class="d-flex">
       <!-- pour la suppression d'un membe du bureau  --> 

      @include('associations.bureau.evenement.delete')

      @include('associations.bureau.evenement.edit')
      <!-- fin --> 


       <!-- button voir --> 

       @include('associations.bureau.modal.viewevent')
        
      </div>



     </td>
    </tr>
     @endforeach
    
  </tbody>
</table>
@endif