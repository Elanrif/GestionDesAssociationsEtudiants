

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col" class="fw-bold fs-4 text-muted">#</th>
      <th scope="col" class="fw-bold fs-4 text-muted">Nom Association</th>
      <th scope="col" class="fw-bold fs-4 text-muted">Date création</th>
      <th scope="col" class="fw-bold fs-4 text-muted">Déscription</th>
      <th scope="col" class="fw-bold fs-4 text-muted">Image</th>
      <th scope="col" class="fw-bold fs-4 text-muted">Action</th>
    </tr>
  </thead>
  <tbody>

      @foreach($associations as $association)
    <tr>
      <th scope="row">{{ $loop->index+1 }}</th>
      <td class="fw-bold">{{ $association->nom }}</td>
      <td class="fw-bold">{{ $association->date }}</td>
      <td class="fw-bold" style="max-width:90px;">{{ $association->description }}</td>
      <td class="fw-bold">{{ $association->image }}</td>
      <td>
          
         <form action = "{{ route('admin-asso.destroy',$association->id) }}" method = "post">
        @csrf
        @method('DELETE')
       <div class="d-flex">
        <button type = "button" data-bs-toggle="modal" data-bs-target="#exampleModaler{{ $loop->index }}" class="btn fs-3 text-danger"><i class="fa-solid fa-trash"></i></button>
       <a href="{{ route('admin-asso.edit',$association->id) }}"><div class="btn fs-3 text-primary"><i class="fa-solid fa-file-pen"></i></div></a> 
       
        <a href="{{ route('admin-asso.show',$association->id) }}" type="button"  class="btn fs-3 text-success"><i class="fa-solid fa-eye"></i></a>
      </div>

      <div class="modal fade" id="exampleModaler{{ $loop->index }}" tabindex="-1" aria-labelledby="exampleModalLabeler" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger" id="exampleModalLabeler"><i class="fa-solid text-danger fa-triangle-exclamation"></i> Attention </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body fw-bold">
        Êtes-vous sûr de vouloir supprimé l'association <span class="text-primary"> {{ $association->nom }} </span> ? 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">NON</button>
        <button type="submit" class="btn btn-danger">OUI</button>
      </div>
    </div>
  </div>
</div>
<!-- fin modal --> 
  </form>


     </td>
    </tr>
     @endforeach
    
  </tbody>
</table>