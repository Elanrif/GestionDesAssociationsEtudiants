





<form action="{{ route('delete.event',$evenement->id)}}" method = "post">
        @csrf
        @method('DELETE')
        
        <!-- on doit avoir plusieur modal de suppression dans chaque membre du bureau --> 
              <button  type="button" data-bs-toggle="modal" data-bs-target="#event{{ $loop->index }}" class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
    

                 <!-- Modal -->
<div class="modal fade" id="event{{ $loop->index }}" tabindex="-1" aria-labelledby="exampleModalLabeler" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger" id="exampleModalLabeler"><i class="fa-solid text-danger fa-triangle-exclamation"></i> Attention </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body fw-bold">
        Êtes-vous sûr de supprimé l'évènement <span class="text-primary"> {{ $evenement->type}} </span> ? 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger px-3" data-bs-dismiss="modal">Non</button>
        <button type="submit" class="btn btn-primary px-3">Oui</button>
      </div>
    </div>
  </div>
</div> <!-- fin modal pour la suppression -->
        </form> 
