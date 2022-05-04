@extends('admin/home')
@section('admin')

 <div class="container-fluid d-flex justify-content-center">
     <div class="w-50">
          <!-- pour s'être connecter --> 
    @if ($message = Session::get('usermessage'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
   <span class="fw-bold">{{ $message }}</span><strong class="fs-5"> <i class="fa-solid fa-face-grin-wide" style="color:rgb(255, 0, 157);"></i> </strong>.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>
    @endif
     </div>
 </div>

 <div class="container-fluid d-flex justify-content-center">
    <div style="width:900px;min-height:40vh;margin-top:30px;margin-left:60px;margin-bottom:13vh;">
        
        <div class="row row-cols-1 gy-5">
            <!-- orderByDesc , sortByDesc font le même rôle , si l'un ne marche pas utilisé l'autre -->  
            @foreach ($user_contacts->sortByDesc('id') as $contact ) <!-- J'AI COMMENCÉ dans la relation BELONGSTO --> 
              
       

            <div class="col">

                   <!-- ici puisque on va partir de la belongTo de la relation avec cardinalité 1:N ; on part de 1 donc PAS DE FOREACH-->
                <img class="pe-2 d-iline" src="{{ asset('storage/'.$contact->user->image) }}" alt="" style="border-radius:50%;height:50px; width:50px;">
                
                <span class="fw-bold text-primary"> {{ $contact->user->nom }} {{ $contact->user->prenom }}</span> 
                
                  <div class="fw-bold" style="margin-left:90px;">{{ $contact->message }} <span class="text-muted"> {{ $contact->created_at }} </span> </div>
             
              
                  <!-- reponse de l'admin --> 
                  <div class="accordion accordion-flush" id="accordionFlushExample" style="max-width:900px;">
    <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingOne">
    <button class="accordion-button collapsed fw-bold text-success" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne{{ $loop->index }}" aria-expanded="false" aria-controls="flush-collapseOne">
      Afficher les  <span class="text-primary px-1">  {{ $contact->reponses->count() }} </span> réponses
    </button>
  </h2>
  <div id="flush-collapseOne{{ $loop->index }}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">

    <!-- je fais la relation dans le modele User et directement ici , dans cette vue je recupere cet modele par $contact->user ; car le but c'est d'avoir ce model soit par le passer dans le controller ; mais puisque je l'ai déjà pas besoin de le passer dans le controller --> 
    <!-- reponses c'est le nom de la relation --> 
    @foreach ($contact->reponses as $reponse )
        
          <div class="my-5">
         <img class="pe-2 d-iline" src="{{ asset('storage/'.auth()->user()->image) }}" alt="" style="border-radius:50%;height:50px; width:50px;">
              <span class="fw-bold">  {{ $reponse->pivot->created_at }} </span>  <br>
                <span class="fw-bold text-dark ms-5"> {{ $reponse->pivot->message }}</span> 
     </div>
    @endforeach
   

  </div>
  </div>
      
            </div>
                    <!-- fin --> 



                <div class="d-flex mt-3"> <!-- au lieu de faire que ici l'image de l'admin ; je peux laisser comme ça la personne connecté car il sera probablement l'admin --> 

                      <form class="container-fluid" action="{{ route('reponse.admin') }}" method = "post">
                            @csrf 

                    <img class="ms-5 pe-2 d-iline" src="{{ asset('storage/'.auth()->user()->image) }}" alt="" style="border-radius:50%;height:50px; width:50px;">
                    
                    <textarea type="text" class="form-control"  placeholder="Ajouter une réponse..." style="border-bottom-width:3px; border-style:solid;border-left-width:0px;border-right-width:0px;border-top-width:0px;width:70%;" rows="5" name="message"></textarea>

                

                    <span class="dropup d-flex">
               <!-- suppression du message --> 
                      <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#loop{{$contact->id}}">
                        <i class="fa-solid text-danger fs-3 fa-trash" style="cursor:grab;"></i>
                      </button>
                    <!-- fin --> 
                       
                 <!-- envoie du message ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ --> 

                           
                            
                      <button class="btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                     
                        <i class="fa-solid fs-3 text-primary fa-share"></i>
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                        <li><a class="dropdown-item fw-bold text-danger" href="#">
                            <input type="text" class="visually-hidden" value="{{$contact->user->id }}" name="user_id">
                            <input type="text" class="visually-hidden" value="{{$contact->id }}" name="contact">
                            <button class="btn fw-bold text-primary" type="submit">Envoyer</button></a></li>
                        
                      </ul>
                      
                    </span>
                </form>
                </div>
            </div>
            
<!-- Modal pour DELETE -->
<div class="modal fade" id="loop{{$contact->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <form action="{{ route('contactuser.delete') }}" method = "post">
                 @csrf 
                   @method('DELETE')
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body fw-bold">

           
                      <button class="btn fw-bold text-muted" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                       Êtes-vous sûr de <span class="text-danger">supprimé</span> le message de  <span class="text-dark">{{ $contact->user->nom }} {{ $contact->user->prenom }}</span>  <!-- une variable hors du foreach peut etre utilisé dans le foreach car existe comme un nom --> 
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                        <li><a class="dropdown-item fw-bold text-danger" href="#">
                            <input type="text" class="visually-hidden" value="{{ $contact->id }}" name="message_id">
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

        </div>

 
    </div>
</div>
@endsection