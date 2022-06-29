   
   
   <!-- dans la 1eme condition --> 
   @foreach ($contact->reponses->sortBy('created_at') as $reponse )
        
          <div class="my-5 ms-3">
         <img class="pe-2 d-iline" src="{{ asset('storage/'.auth()->user()->image) }}" alt="" style="border-radius:50%;height:50px; width:50px;"> 
              <span class="fw-bold text-primary">  {{ $reponse->pivot->created_at }} </span> 

              <!-- button pour supprimé les messages envoyé pas encore fait --> 
                 <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#looper{{$contact->id}}">
                        <i class="fa-solid text-danger fs-3 fa-trash" style="cursor:grab;"></i>
                      </button><br>
                <div class="fw-bold text-dark " style="margin-left:60px;"> {{ $reponse->pivot->message }}</div> 
     </div>

     
<!-- Modal pour DELETE une réponse -->
<div class="modal fade" id="looper{{$contact->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <form action="{{ route('contactuser.deleted') }}" method = "post">
                 @csrf 
                   @method('DELETE')
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body fw-bold">

           
                      <button class="btn fw-bold text-muted" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                       Êtes-vous sûr de <span class="text-danger">supprimé</span> cette réponse envoyé à {{ $reponse->pivot->created_at }} <!-- une variable hors du foreach peut etre utilisé dans le foreach car existe comme un nom --> 
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                        <li><a class="dropdown-item fw-bold text-danger" href="#">
                            <input type="text" class="visually-hidden" value="{{ $reponse->pivot->id }}" name="reponse">
                            <button class="btn fw-bold text-danger" type="submit">supprimer</button></a></li>
                        
                      </ul>
                      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary fw-bold" data-bs-dismiss="modal">Non</button>
        <button type="submit" class="btn btn-danger fw-bold">Oui</button>
      </div>
    </div>
</form>
  </div>
</div>

<!-- fin modal --> 
    @endforeach

   <!-- dans la 2eme condition --> 
   @foreach ($contact->reponses->sortBy('created_at') as $reponse )
        
          <div class="my-5 ms-3">
         <img class="pe-2 d-iline" src="{{ asset('storage/'.auth()->user()->image) }}" alt="" style="border-radius:50%;height:50px; width:50px;"> 
              <span class="fw-bold text-primary">  {{ $reponse->pivot->created_at }} </span> 

              <!-- button pour supprimé les messages envoyé pas encore fait --> 
                 <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#looper{{$contact->id}}">
                        <i class="fa-solid text-danger fs-3 fa-trash" style="cursor:grab;"></i>
                      </button><br>
              
                   <div class="fw-bold text-dark mb-2" style="margin-left:60px;">
              
                    <!-- border-radius pour le card et le body --> 
                <div class="card" style="max-width:600px;border-radius: 30px;background-color:black">
                  <div class="card-body py-3" style="background-color:rgb(81, 79, 79);border-radius: 30px;">
                
                    <p class="card-text text-light fw-bold" >{{ $reponse->pivot->message }} </p>
                    
                  </div>
                </div>
              </div> 
     </div>

     
<!-- Modal pour DELETE une réponse -->
<div class="modal fade" id="looper{{$contact->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <form action="{{ route('contactuser.deleted') }}" method = "post">
                 @csrf 
                   @method('DELETE')
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body fw-bold">

           
                      <button class="btn fw-bold text-muted" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                       Êtes-vous sûr de <span class="text-danger">supprimé</span> cette réponse envoyé à {{ $reponse->pivot->created_at }} <!-- une variable hors du foreach peut etre utilisé dans le foreach car existe comme un nom --> 
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                        <li><a class="dropdown-item fw-bold text-danger" href="#">
                            <input type="text" class="visually-hidden" value="{{ $reponse->pivot->id }}" name="reponse">
                            <button class="btn fw-bold text-danger" type="submit">supprimer</button></a></li>
                        
                      </ul>
                      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary fw-bold" data-bs-dismiss="modal">Non</button>
        <button type="submit" class="btn btn-danger fw-bold">Oui</button>
      </div>
    </div>
</form>
  </div>
</div>

<!-- fin modal --> 
    @endforeach