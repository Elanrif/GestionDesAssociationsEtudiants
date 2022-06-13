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

    @if ($message = Session::get('notification'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
   <span class="fw-bold">{{ $message }}</span><strong class="fs-5"> <i class="fa-solid fa-face-grin-wide" style="color:rgb(255, 0, 157);"></i> </strong>.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>
    @endif

    @if($message = Session::get('reponses-delete'))
         <div class="alert alert-primary alert-dismissible fade show" role="alert">
   <span class="fw-bold">{{ $message }}</span><strong class="fs-5"> <i class="fa-solid fa-face-grin-wide" style="color:rgb(255, 0, 157);"></i> </strong>.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>
    @endif

     @if($message = Session::get('reponse-send'))
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
            <form action="{{ route('notification_message') }}" method="post">
              @csrf

              @method('put')

              @if($notification->count() != 0 ) <!-- cacher le boutton après lu --> 
               <button class="btn  fs-5 fw-bold" type="submit"> <i class="fa-solid fa-check fs-4 fw-bold"></i> Tout marquer comme lu   </button>
              @endif 
           
              </form>

              

            @foreach ($user_contacts->sortByDesc('id') as $contact ) <!-- J'AI COMMENCÉ dans la relation BELONGSTO --> 
              
              <!-- il suffit de modifier la colonne 'status' a '1' de la table 'user_contact' : POUR CE FAIRE CHAQUE $contact je vais envoyé une formulaire -->
              
             
               

              @if($contact->status == 0 )
       

            <div class="col" style="background-color:rgb(165, 241, 241);"> <!-- COULEUR DES MESSAGES --> 

                   <!-- ici puisque on va partir de la belongTo de la relation avec cardinalité 1:N ; on part de 1 donc PAS DE FOREACH-->
                <img class="pe-2 d-iline" src="{{ asset('storage/'.$contact->user->image) }}" alt="" style="border-radius:50%;height:50px; width:50px;"> 
                
                <span class="fw-bold text-primary"> {{ $contact->user->nom }} {{ $contact->user->prenom }}</span> 
                
                  <div class="fw-bold" style="margin-left:90px;" >{{ $contact->message }} <span class="text-muted"> {{ $contact->created_at }} </span> 
                      <!-- suppression du message --> 
                      <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#loop{{$contact->id}}">
                        <i class="fa-solid text-danger fs-3 fa-trash" style="cursor:grab;"></i>
                      </button>
                    <!-- fin -->  </div>
             
              
                  <!-- reponse de l'admin --> 
                  <div class="accordion accordion-flush" id="accordionFlushExample" style="max-width:900px;">
    <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingOne">
    <button class="accordion-button collapsed fw-bold text-success" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne{{ $loop->index }}" aria-expanded="false" aria-controls="flush-collapseOne">
      Afficher les  <span class="text-primary px-1">  {{ $contact->reponses->count() }} </span> réponses 
    </button>
  </h2>
  <div id="flush-collapseOne{{ $loop->index }}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample" >

    
       <div class="d-flex mt-3 ms-3"> <!-- au lieu de faire que ici l'image de l'admin ; je peux laisser comme ça la personne connecté car il sera probablement l'admin --> 

                      <form class="container-fluid" action="{{ route('reponse.admin') }}" method = "post">
                            @csrf 

                    <img class="ms-5 pe-2 d-iline" src="{{ asset('storage/'.auth()->user()->image) }}" alt="" style="border-radius:50%;height:50px; width:50px;"> <span class="text-primary fw-bold"> Moi </span>
                    
                    <textarea type="text" class="form-control pt-5"  placeholder="Ajouter une réponse..." style="border-bottom-width:3px; border-style:solid;border-left-width:0px;border-right-width:0px;border-top-width:0px;width:70%;" rows="3" name="message"></textarea>

                

                    <span class="dropup d-flex">
           
                       
                 <!-- envoie du message ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ --> 

                           
                            
                      <button class="btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                     
                        <i class="fa-solid fs-3 text-primary fa-share"></i>
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                        <li><a class="dropdown-item fw-bold text-danger" href="#">
                            <input type="text" class="visually-hidden" value="{{$contact->user->id }}" name="user_id">
                            <input type="text" class="visually-hidden" value="{{$contact->id }}" name="contact">

                            <!-- ajouter cette input pour recuperer le status de message qui est à 0 --> 
                           <!-- ON A BESOIN DE RIEN juste pour comprendre l'illustration , tout se passera dans le controlleur  : 
                            <input type="text" class="visually-hidden"  name="status" value="{{ $contact->status }}">  
                          -->

                            <button class="btn fw-bold text-primary" type="submit">Envoyer </button></a></li> <!-- ici aussi je fais la meme chose pour les notifications , vu que déja il y'a un formulaire , il suffit juste d'aller a ce controller et dans la methode (ajouté les ligne de notification) faire ce que j'ai déja fait  -->
                        
                      </ul>
                      
                    </span>
                </form>
                </div>
   

    <!-- je fais la relation dans le modele User et directement ici , dans cette vue je recupere cet modele par $contact->user ; car le but c'est d'avoir ce model soit par le passer dans le controller ; mais puisque je l'ai déjà pas besoin de le passer dans le controller --> 
    <!-- reponses c'est le nom de la relation --> 
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


  </div>
  </div>

         
             
      
            </div>
                    <!-- fin --> 



            </div>

            @else 
            

            <div class="col" style="background-cojlor:rgb(165, 241, 241);"> <!-- COULEUR DES MESSAGES --> 

                   <!-- ici puisque on va partir de la belongTo de la relation avec cardinalité 1:N ; on part de 1 donc PAS DE FOREACH-->
                <img class="pe-2 d-iline" src="{{ asset('storage/'.$contact->user->image) }}" alt="" style="border-radius:50%;height:50px; width:50px;"> 
                
                <span class="fw-bold text-primary"> {{ $contact->user->nom }} {{ $contact->user->prenom }}</span> 
                
                  <div class="fw-bold" style="margin-left:90px;" >{{ $contact->message }} <span class="text-muted"> {{ $contact->created_at }} </span> 
                      <!-- suppression du message --> 
                      <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#loop{{$contact->id}}">
                        <i class="fa-solid text-danger fs-3 fa-trash" style="cursor:grab;"></i>
                      </button>
                    <!-- fin -->  </div>
             
              
                  <!-- reponse de l'admin --> 
                  <div class="accordion accordion-flush" id="accordionFlushExample" style="max-width:900px;">
    <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingOne">
    <button class="accordion-button collapsed fw-bold text-success" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne{{ $loop->index }}" aria-expanded="false" aria-controls="flush-collapseOne">
      Afficher les  <span class="text-primary px-1">  {{ $contact->reponses->count() }} </span> réponses 
    </button>
  </h2>
  <div id="flush-collapseOne{{ $loop->index }}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample" >

    
       <div class="d-flex mt-3 ms-3"> <!-- au lieu de faire que ici l'image de l'admin ; je peux laisser comme ça la personne connecté car il sera probablement l'admin --> 

                      <form class="container-fluid" action="{{ route('reponse.admin') }}" method = "post">
                            @csrf 

                    <img class="ms-5 pe-2 d-iline" src="{{ asset('storage/'.auth()->user()->image) }}" alt="" style="border-radius:50%;height:50px; width:50px;"> <span class="text-primary fw-bold"> Moi </span>
                    
                    <textarea type="text" class="form-control pt-5"  placeholder="Ajouter une réponse..." style="border-bottom-width:3px; border-style:solid;border-left-width:0px;border-right-width:0px;border-top-width:0px;width:70%;" rows="3" name="message"></textarea>

                

                    <span class="dropup d-flex">
           
                       
                 <!-- envoie du message ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ --> 

                           
                            
                      <button class="btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                     
                        <i class="fa-solid fs-3 text-primary fa-share"></i>
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                        <li><a class="dropdown-item fw-bold text-danger" href="#">
                            <input type="text" class="visually-hidden" value="{{$contact->user->id }}" name="user_id">
                            <input type="text" class="visually-hidden" value="{{$contact->id }}" name="contact">

                            <!-- ajouter cette input pour recuperer le status de message qui est à 0 --> 
                           <!-- ON A BESOIN DE RIEN juste pour comprendre l'illustration , tout se passera dans le controlleur  : 
                            <input type="text" class="visually-hidden"  name="status" value="{{ $contact->status }}">  
                          -->

                            <button class="btn fw-bold text-primary" type="submit">Envoyer </button></a></li> <!-- ici aussi je fais la meme chose pour les notifications , vu que déja il y'a un formulaire , il suffit juste d'aller a ce controller et dans la methode (ajouté les ligne de notification) faire ce que j'ai déja fait  -->
                        
                      </ul>
                      
                    </span>
                </form>
                </div>
   

    <!-- je fais la relation dans le modele User et directement ici , dans cette vue je recupere cet modele par $contact->user ; car le but c'est d'avoir ce model soit par le passer dans le controller ; mais puisque je l'ai déjà pas besoin de le passer dans le controller --> 
    <!-- reponses c'est le nom de la relation --> 
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


  </div>
  </div>

         
             
      
            </div>
                    <!-- fin --> 



            </div>

            @endif 
            
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

