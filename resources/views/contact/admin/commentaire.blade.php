
@extends('admin/home')
@section('admin')



 <div class="container-fluid text-center" style= "min-height:70vh;width:900px;">

     <div class="container-fluid d-flex justify-content-center">
     <div class="w-50">
          <!-- pour s'être connecter --> 
    @if ($message = Session::get('commentdelete'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
   <span class="fw-bold">{{ $message }}</span><strong class="fs-5"> <i class="fa-solid fa-face-grin-wide" style="color:rgb(255, 0, 157);"></i> </strong>.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>
    @endif

  

     </div>
 </div>

     <div class="mt-3" >

           @foreach ($associations as $association)
            
        @if($association->user_comments()->count() <> 0 ) <!-- juste cette condition permet de filtrer les associations qui ont des commentaires --> 

         <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed fw-bold text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne{{ $loop->index }}" aria-expanded="false" aria-controls="flush-collapseOne">
                  
                        Association {{ $association->nom }}   <span class="text-muted fw-bold ms-2"> {{ $association->user_comments->count() }} commentaire(s)</span>
                </button>
              </h2>
              <div id="flush-collapseOne{{ $loop->index }}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">

                  @foreach ($association->user_comments as $user)
                
                 
                      
                  
                     <div class="accordion-body" style="background-color:rgb(236, 236, 236)">
       
            <img class="pe-2 d-iline" src="{{ asset('storage/'.$user->image) }}" alt="" style="border-radius:50%;height:50px; width:50px;"> 
                
        
          <span class="fw-bold text-primary"> {{ $user->nom }} {{ $user->prenom }}    <span class="text-muted">{{ $user->pivot->created_at }}</span>
                    <span class="dropup">
         <button class="btn  fw-bold fs-4 ms-3 text-dark" type="button" id="dropdownMenuButton1"                 data-bs-toggle="dropdown" aria-expanded="false" style="cursor:pointer">
          ...
            </button>
         <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton1">
           <form action="{{ route('usercommentaire') }}" method="post">
            @csrf 
               @method('delete')

           <li><a class="dropdown-item fw-bold text-light mt-3" href="#" data-bs-toggle="modal" data-bs-target="#loooper{{$user->id}}"> <i class="fa-solid text-light  me-2 fa-trash" style="cursor:grab;"></i>  supprimer</a></li>
           
            <li><a class="dropdown-item fw-bold text-light my-3" href="#"><i class="fa-solid fa-check"></i>
               
             <input type="text" class="visually-hidden" name="message_id" value="{{ $user->id }}">
              <button type="submit" class="btn text-light fw-bold">
                  @if ($user->status == 0)
                  Marquer comme lu
                @else
                  Lu 
                @endif
              </button>  
            </a></li>
          </form>
            </ul>
          </span> </span> 

                  <div class="fw-bold text-dark mb-2" style="margin-left:60px;">
              
                    <!-- border-radius pour le card et le body --> 
                <div class="card" style="max-width:600px;border-radius: 30px;">
                  <div class="card-body py-3" style="background-color:rgb(255, 255, 255);border-radius: 30px;">
                
                    <p class="card-text" >{{ $user->pivot->commentaire }} </p>
                    
                  </div>
                </div>
              </div> 

          <div class="mt-3"></div>


      </div>


      <!-- Modal pour DELETE une réponse -->
<div class="modal fade" id="loooper{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <form action="{{ route('usercommentaire') }}" method = "post">
                 @csrf 
                   @method('DELETE')
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body fw-bold">

           
                      <button class="btn fw-bold text-muted" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                       Êtes-vous sûr de <span class="text-danger">supprimé le commentaire de </span> {{ $user->nom }} <!-- une variable hors du foreach peut etre utilisé dans le foreach car existe comme un nom --> 
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                        <li><a class="dropdown-item fw-bold text-danger" href="#">
                            <input type="text" class="visually-hidden" value="{{ $user->pivot->id }}" name="id">
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

      
      @endforeach

    </div>
            </div>
           
           
          </div>

             @endif
          @endforeach
         
    
     </div>
 </div>

@endsection