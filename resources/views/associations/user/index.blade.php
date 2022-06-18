@extends("source/layout")
@section('content')

<div class="card bg-dark text-white" style="margin-top:40px;">
<!-- pour faire dynamique l'image de l'asso dans le disque storage -->    

 <!-- suppression membre du bureau --> 
 
  @if ($message = Session::get('comment'))
     <div class="container d-flex justify-content-center mt-2 bg-body bg-transparent rounded-1 fs-5 fw-bold">     <div class="alert  alert-primary ms-4 alert-dismissible fade show w-50" role="alert">
   <span class="fw-bold justify-content-center d-flex">{{ $message }} <strong class="fs-5"> <i class="fa-solid ms-2 fa-face-grin-wide" style="color:rgb(255, 0, 157);"></i> </strong>.</span>
  <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
     </div>
    @endif 
     @if ($message = Session::get('deleted'))
     <div class="container d-flex justify-content-center mt-2 bg-body bg-transparent rounded-1 fs-5 fw-bold">     <div class="alert  alert-primary ms-4 alert-dismissible fade show w-50" role="alert">
   <span class="fw-bold justify-content-center d-flex">{{ $message }} <strong class="fs-5"> <i class="fa-solid ms-2 fa-face-grin-wide" style="color:rgb(255, 0, 157);"></i> </strong>.</span>
  <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
     </div>
    @endif 

     @if ($message = Session::get('edit'))
     <div class="container d-flex justify-content-center mt-2 bg-body bg-transparent rounded-1 fs-5 fw-bold">     <div class="alert  alert-primary ms-4 alert-dismissible fade show w-50" role="alert">
   <span class="fw-bold justify-content-center d-flex">{{ $message }} <strong class="fs-5"> <i class="fa-solid ms-2 fa-face-grin-wide" style="color:rgb(255, 0, 157);"></i> </strong>.</span>
  <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
     </div>
    @endif 

   @if ($message = Session::get('suivis'))
     <div class="container d-flex bg-transparent  justify-content-center mt-2 bg-body rounded-1 fs-5 fw-bold">     <div class="alert  alert-primary ms-4 alert-dismissible fade show w-50" role="alert">
   <span class="fw-bold justify-content-center d-flex">{{ $message }} <strong class="fs-5"> <i class="fa-solid ms-2 fa-face-grin-wide" style="color:rgb(255, 0, 157);"></i> </strong>.</span>
  <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
     </div>
    @endif 
<!-- fin -->

  <div class="bureau-asso card-img" alt="..." style="overflow: hidden;min-height:80vh; background:linear-gradient(rgba(6, 6, 6, 0.6),rgb(2, 4, 65)),url({{ asset('storage/'.$association->image) }}) center / cover no-repeat  ;"></div>
  <div class="card-img-overlay ms-4" style="margin:50px;overflow:hidden;">                         
    <h3 class="card-title fs-1 fw-bold">Association <span class="text-uppercase">{{ $association->nom }}</span></h3>
     <h3 class="card-title fs-1 my-4 fw-bold">Date création :  <span class="text-primary text-uppercase">{{ $association->date }}</span></h3>
    <p class="card-text fs-3 fw-bold w-50"> {{ $association->description }}.</p>
   
    @auth
    
   @if(auth()->user()->suit($association)) <!-- si la personne suit  l'associatoin -->

  <form action="{{ route('suivis.delete',$association->id) }}" method ="post"> <!-- pour l'utilisateur connecté suit l'Asso --> 
   
      @csrf
      @method('delete')
 
    <a href="#"> <button type = "submit"  class="btn fw-bold mt-4 p-4 rounded-circle p-1" style="font-size:40px;color:var(--pink)"><i class="fas fa-check-double" style="font-size:90px;"></i>SUIVI(E)</button> </a>

  </form>

   @else <!-- si il ne suit pas l'association et qu'il clique sur suivre on l'ajoute l'associaton --> 

  <form action="{{ route('suivis.attach',$association->id) }}" method ="post"><!-- $associatoin->id n'est pas important ici mais c'est juste pour voir ID de l'association -->
     @csrf 

     <input type="text" class="visually-hidden" name="user_id" value="{{ auth()->user()->id }}">

    <input type="text" class="visually-hidden" name="association_id" value={{ $association->id }}>

   <a href="#"> <button type = "submit"  class="btn btn-primary fw-bold mt-4 p-4 rounded-circle" style="font-size:40px;">SUIVRE</button> </a>
  </form>
  
  @endif
        
     @endauth
        
        @guest
         <button data-bs-toggle="modal" data-bs-target="#exampleModaler" class="btn btn-primary fw-bold mt-4 p-4 rounded-circle" style="font-size:40px;">SUIVRE</button>     
             <!-- Modal pour la personne qui veut suivre mais est un invité -->
<div class="modal fade" id="exampleModaler" tabindex="-1" aria-labelledby="exampleModalLabeler" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger fw-bold" id="exampleModalLabeler"><i class="fa-solid text-danger fw-bold fa-triangle-exclamation"></i> À savoir  </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body fs-5 text-dark">
       Vous devez vous <a style="text-decoration:none;" href="{{ route('register') }}">inscrire</a>  ou  <a style="text-decoration:none;" href="{{ route('login') }}">vous connecter</a> pour pouvoir <span class="text-success fw-bold">suivre</span> cette association ! 
      </div>
      <div class="modal-footer">
       <a href="{{ route('register') }}"> <button type="button" class="btn btn-outline-primary fw-bold" data-bs-dismiss="modal">S'inscire</button> </a>
       <a href="{{ route('login') }}"><button type="submit" class="btn btn-outline-success fw-bold">Se connecter</button> </a> 
      </div>
    </div>
  </div>
</div>
        @endguest
  </div>
</div>


   


<div class="container-fluid  my-5">
    <!-- $association->id pour avoir l'instance de l'association dans le nouveau page $association -->

     <!-- petit example -->
     @if($association->bureaus->count())
     <div class="d-flex justify-content-center"> 
     <h3 class="text-center fs-1 fw-bold" style="color:var(--blue)">Les Membres du Bureau</h3>
     </div>
     @endif

        <div class="row row-cols-1 row-cols-md-3 g-1" style="margin:0 120px;">
 
             @foreach ($association->bureaus as $bureau)
            <div class="col hoover" style = "transition:0.6s ease-out;background-color:rgb(246, 245, 245) ;"> <!-- je vais centré les balises p seulement -->
              <p class="text-center">  <img src="{{asset('storage/'.$bureau->image) }}" class="img-fluid" alt="don't exist" style="height:60px; width:60px; border-radius:70px;">
              </p>
              <p class="text-center fw-bold" style="font-size:18px;color:var(--pink)">{{ $bureau->Poste }}</p>
             <p class="text-center fw-bold" style="color:#26046a"><i class="fa-solid fa-envelope"></i> {{ $bureau->email }} </p>

             <div class="text-start membre-lien pt-3 px-5" style="font-weight: bold;">
               <p><i class="fa-solid fa-user-tie"></i> {{ $bureau->nom }} {{ $bureau->prenom }}</p>
               <p><i class="fa-solid fa-square-phone"></i> {{ $bureau->Tel }}</p>
               <p> <i class="fa-solid fa-graduation-cap"></i> {{ $bureau->filiere }}</p>
               <p><i class="fa-solid fa-calendar-day"></i> {{ $bureau->date_mandat }}</p>

               @if($bureau->Poste == "President")
               <p class="mt-3 text-muted px-1"> Le <span class="text-primary"> << Président >> </span> , qui s’occupe en général de tout ce qui relève de l’administration, mais pas que ! Il donne la ligne directrice de l’association , tranche dans les débats et dans les grandes prises de décision. C’est un poste avec de <span class="fw-bold text-primary">grandes responsabilités</span> et <span class="fw-bold text-primary">très formateur</span></p> <!-- sert juste a avoir de l'espace entre les membres --> 

               @elseif($bureau->Poste == "Secretaire") 
               <p class="mt-3 text-muted px-1">
                Le <span class="fw-bold text-primary"><< secrétaire général >> </span>, enfin, est la personne <span class="fw-bold text-primary"> chargée de la communication avec l’extérieur </span> (ça peut être l’administration, les entreprises partenaires…) et avec les autres membres de l’association. Il est là pour <span class="fw-bold text-primary"> tenir au courant des décisions prises </span> par le bureau et aussi pour organiser les réunions (les assemblées générales).</p> 
               @elseif($bureau->Poste == "Tresorier")
               <p class="mt-3 text-muted px-1">
                Le <span class="text-primary"> << trésorier >> : </span> c’est le magicien de la comptabilité ! 💰 Il <span class="text-primary"> gère les dépenses </span>, trouve des solutions pour faire gagner de l’argent à l’association, choisit les tarifs lorsque l’association vend des produits (ou autres) aux étudiants, de sorte à tirer un <span class="text-primary">certain bénéfice à réinvestir</span> dans les autres projets de l’association .
                </p>
               @else  
              <p class="mt-3 text-muted px-1">
               Un <span class="fw-bold text-primary"><< membre de l'association >> </span> , participe à l'association et <span class="text-primary">bénéficie des mêmes droits</span> et mêmes obligations (sauf disposition contraire des statuts). comme un bénevole ( des personnes qui <span class="text-primary"> consacrent une partie de leur temps </span>, sans être rémunérées, aux activités de l’association .) ou autre membre  ...  </p>
               @endif
             </div>
            
            </div> 
            @endforeach
           
          </div>

        
  
      <!-- fin -->
   

</div>



<div class="container-fluid my-5">
    <!-- $association->id pour avoir l'instance de l'association dans le nouveau page $association -->
   @if($association->evenements->count())
 <div id="evenement" class="text-center fs-1 fw-bold " style="color:var(--blue)">Les évènements </div> <br><br>

   @endif 

    <div class="row row-cols-1 row-cols-md-3 pb-5 g-4" style="margin:0 120px;">
 

    @foreach ($association->evenements as $evenement )
      
    <div class="col pb-5" id="event/{{ $evenement->id }}">
      <div class="card shadow">
        <div class="card-img-top" alt="..."  style="height:20vh; background: linear-gradient(rgba(38, 35, 66, 0.5),#0e0324) , url({{ asset('storage/'.$evenement->image) }} ) center / cover no-repeat  ;"></div>
        <div class="card-body">
          <h5 class="card-title fw-bold ms-3" style="color:var(--pink)">ÉVÈNEMENT {{ $evenement->type }}</h5>
          <p class="card-text">
            <ul class="nav suivre flex-column">
              <a  class="nav-link my-2 fw-bold"> <span style="color:var(--blue)"> <i class="fa-solid fa-calendar"></i> Date : </span> {{ $evenement->date }}</a>
              <a  class="nav-link my-2 fw-bold"><span style="color:var(--blue)"> <i class="fa-solid fa-clock"></i> Heure : </span> {{ $evenement->heure }}</a>
              <a  class="nav-link my-2  fw-bold"><span style="color:var(--blue)"> <i class="fa-solid fa-location-dot"></i> Lieu : </span>  {{ $evenement->lieu }}</a>
            </ul>
          </p>
        </div>
        
        @auth <!-- personne doit être connecté pour voir -->
        <div class="d-flex ms-3 mb-3">

         @if(auth()->user()->participe($evenement)) <!-- une methode que je vais créer sur le model user , toujours et je recupere directement l'evenement concerné puisque je suis dedans -->   
      <!-- pour supprimer la participation -->
      <form action="{{ route('deleteParticipe')}}" method = "post">
      @csrf
      @method('DELETE')
      <input type="text" class="visually-hidden" name="evenement_id" value={{ $evenement->id }}><!-- je prends la ligne id de chaque evenement -->
      <input type="text" class="visually-hidden" name="user_id" value={{ auth()->user()->id }}><!-- et l' utilisateur connecté -->
       <a href="#" class="nav-link"><button type="submit" href="#" class="btn border border-black fw-bold" style="color:var(--pink)">Participé(e)</button></a>
     </form>
       
       @else <!-- sinon -->

     <form action="{{ route('participe')}}" method = "post">
      @csrf
      <input type="text" class="visually-hidden" name="evenement_id" value={{ $evenement->id }}><!-- je prends la ligne id de chaque evenement -->
      <input type="text" class="visually-hidden" name="user_id" value={{ auth()->user()->id }}><!-- et l' utilisateur connecté -->
       <a href="#" class="nav-link"><button type="submit" href="#" class="btn border border-black fw-bold text-dark">Participer</button></a>
     </form>
    @endif <!-- fin de condition -->


    @if(auth()->user()->like($evenement))
     <!--pour les likes --> 

      <form action="{{  route('deleteLike') }}" method="post">
        @csrf
        @method('DELETE')
        
        <input type="text" class="visually-hidden" name="evenement_id" value={{ $evenement->id }}><!-- je prends la ligne id de chaque evenement -->
      <input type="text" class="visually-hidden" name="user_id" value={{ auth()->user()->id }}><!-- et l' utilisateur connecté -->

        <a href="#" class="nav-link">
         <button type="submit" class="btn position-relative nav-liens mx-3  border border-black fw-bold">
           <i class="fa-solid  fa-thumbs-up"></i> j'aime
           <span class="position-absolute top-1  start-100 translate-middle badge rounded-pill bg-danger">
            {{ $evenement->user_s->count() }} <!-- pour le model Like -->
             <span class="visually-hidden">unread messages</span>
               </span>
              </button>

         </a>
     </form>

     @else 
        <form action="{{ route('like') }}" method ="post"> <!-- pour liker un evenement-->
          @csrf

          <input type="text" class="visually-hidden" name="evenement_id" value={{ $evenement->id }}><!-- je prends la ligne id de chaque evenement -->
      <input type="text" class="visually-hidden" name="user_id" value={{ auth()->user()->id }}><!-- et l' utilisateur connecté -->

          <a href="#" class="nav-link ">
        <button type="submit" class="btn position-relative nav-lien mx-3 border border-black fw-bold">
           <i class="fa-solid  fa-thumbs-up"></i> j'aime
           <span class="position-absolute top-1  start-100 translate-middle badge rounded-pill bg-danger">
             <!-- a partir de evenent j'accede a la relation manytomany et je prends le count --> 
              {{ $evenement->user_s->count() }}
            
         <span class="visually-hidden">unread messages</span>
          </span>
        </button>
        </a>
      </form>

     @endif <!-- fin pour le like -->

    </div>
    @endauth

            @guest<!-- pour un simple utilisateur -->
        <div class="d-flex ms-4 mb-3">   

                      <!-- Modal pour la personne qui veut suivre mais est un invité -->
<div class="modal fade" id="guest" tabindex="-1" aria-labelledby="exampleModalLabeler" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger fw-bold" id="exampleModalLabeler"><i class="fa-solid text-danger fw-bold fa-triangle-exclamation"></i> À savoir  </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body fs-5 text-dark">
       Vous devez vous <a style="text-decoration:none;" href="{{ route('register') }}">inscrire</a>  ou  <a style="text-decoration:none;" href="{{ route('login') }}">vous connecter</a> pour pouvoir <span class="fw-bold" style="color:var(--pink)">participer</span> à cette évènement ! 
      </div>
      <div class="modal-footer">
       <a href="{{ route('register') }}"> <button type="button" class="btn btn-outline-primary fw-bold" data-bs-dismiss="modal">S'inscire</button> </a>
       <a href="{{ route('login') }}"><button type="submit" class="btn btn-outline-success fw-bold">Se connecter</button> </a> 
      </div>
    </div>
  </div>
</div>


                     <!-- Modal pour la personne qui veut suivre mais est un invité -->
<div class="modal fade" id="like" tabindex="-1" aria-labelledby="exampleModalLabeler" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger fw-bold" id="exampleModalLabeler"><i class="fa-solid text-danger fw-bold fa-triangle-exclamation"></i> À savoir  </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body fs-5 text-dark">
       Vous devez vous <a style="text-decoration:none;" href="{{ route('register') }}">inscrire</a>  ou  <a style="text-decoration:none;" href="{{ route('login') }}">vous connecter</a> pour laisser un <span class="text-primary fw-bold"> &nbsp; <i class="fa-solid nav-liens fa-thumbs-up"></i>&nbsp; </span> à cette évènement ! 
      </div>
      <div class="modal-footer">
       <a href="{{ route('register') }}"> <button type="button" class="btn btn-outline-primary fw-bold" data-bs-dismiss="modal">S'inscire</button> </a>
       <a href="{{ route('login') }}"><button type="submit" class="btn btn-outline-success fw-bold">Se connecter</button> </a> 
      </div>
    </div>
  </div>
</div>
      <!-- pour supprimer la participation -->
      <form action="#" method = "post">
      @csrf
      @method('DELETE')
   
    
     <form action="#" method = "post">
      @csrf
      
       <a class="nav-link"><button data-bs-toggle="modal" data-bs-target="#guest" type="button" href="#" class="btn border border-black fw-bold nav-lien">Participer</button></a>
     </form>
 
     <!--pour les likes --> 

        <form action="#" method ="post"> <!-- pour liker un evenement-->
          @csrf

          <a  class="nav-link ">
        <button type="button" data-bs-toggle="modal" data-bs-target="#like" class="btn position-relative nav-lien mx-3 border border-black fw-bold">
           <i class="fa-solid  fa-thumbs-up"></i> j'aime
           <span class="position-absolute top-1  start-100 translate-middle badge rounded-pill bg-danger">
             <!-- a partir de evenent j'accede a la relation manytomany et je prends le count --> 
              {{ $evenement->users->count() }}
            
         <span class="visually-hidden">unread messages</span>
          </span>
        </button>
        </a>
      </form>

    </div>
    @endguest

      </div>
    </div>

    @endforeach
</div>

</div>

 <!--pour les  commentaires --> 

 @auth  <!-- pour les personnes connecté -->

<div class="container" style = "min-height:40vh;background-image:url({{ asset('images/whatsapp.jpg') }}); ">
   <div class="row" >
    

    <hr>

    <div class="my-5 ms-3" id="association_comment" >

      @if($association->user_comments->count() != 0 ) <!-- pour chaque utilisateur qui a laissé un commentaire  ; on le compte meme si elle est repeté n fois , pas de pivot ici : car ne marche pas --> 
  
      <h3 class="fw-bold py-4 text-primary">{{ $association->user_comments->count() }}  Commentaires <i class="fa-solid fa-comments ms-2"></i></h3> 

     

       <div class="my-3">

         <form action="{{ route('commentaire') }}" method="post">
            @csrf 
                    
         <div class="row">
                 <img class="pe-2 d-iline col-3" src="{{ asset('storage/'.auth()->user()->image) }}" alt="" style="border-radius:50%;height:50px; width:50px;"> 
                 
                 <div class="form-floating col ">
                   <input type="text" name="association_id" class="visually-hidden" value = "{{ $association->id }}">
                   <input type="text" name="user_id" class="visually-hidden" value = "{{ auth()->user()->id}}">
                 
    <textarea class="form-control" required name="commentaire" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
    <label for="floatingTextarea">Ajouter un nouveau commentaire</label>
  </div>
           

               <div class="col">
               
                      <span class="fw-bold fs-5 ms-3" > 
                    <div class="nav-comment">
                     
                     <button class="btn fw-bold" type="submit">Ajouter un commentaire</button>  </div> </span>

              </div> 

        </div>
              

                </form>

                
                
              </div> <!-- parent --> 
              
           
              <!-- button pour supprimé les messages envoyé pas encore fait --> 
              <br>
        </div>
              
            </div>

       @foreach ($association->user_comments as $item)
  
      
      <!--  pour afficher seulement les commentaires de cette assocation ou je me trouve  au lieu d'affiher tout -->
        
        @if(auth()->user()->id == $item->pivot->user_id)
        <div class="my-3">
                 <img class="pe-2 d-iline" src="{{ asset('storage/'.auth()->user()->image) }}" alt="" style="border-radius:50%;height:50px; width:50px;"> 
              <span class="fw-bold text-primary"> {{ $item->nom }} {{ $item->prenom }} 
              <span class="text-dark"> {{ $item->pivot->created_at }}</span> </span> 

               <span class="dropup ">
                <span class="text-black " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="fw-bold fs-1 ms-3" style="cursor:pointer;">...</span>

                </span>

                         <!-- Modal pour modifier commentaire --> 
<!-- Modal -->
<div class="modal fade" id="ex{{ $loop->index }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modifier commentaire</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

       <form action="{{ route('edit-comment') }}" method="post">
                   @csrf 
                  @method('put')
                
                 
      <div class="modal-body">

         <input type="text" class="visually-hidden" name="id" value="{{ $item->pivot->id }}">
                  <input type="text" class="visually-hidden" name="user_id" value="{{ $item->pivot->user_id }}">
                  <input type="text" class="visually-hidden" name="association_id" value="{{ $item->pivot->association_id }}">


                  <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" required name="commentaire" style="height: 100px"></textarea>
                    <label for="floatingTextarea2" class="fw-bold"> {{ $item->pivot->commentaire }} </label>
                  </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
        <button type="submit" class="btn btn-primary">Oui</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal2 -->
<div class="modal fade" id="eex{{ $loop->index }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Supprimer commentaire</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

       <form action="{{ route('delete-comment') }}" method="post">
                   @csrf 
                  @method('delete')
                
                 
      <div class="modal-body">
            
                  <input type="text" class="visually-hidden" name="message_id" value="{{ $item->pivot->id }}">

                  <p class="fw-bold"> êtes-vous sur de <span class="text-danger">supprimé</span> votre commentaire ? </p>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
        <button type="submit" class="btn btn-primary">Oui</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- fin -->


                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                
                  <li class="mb-3" data-bs-toggle="modal" data-bs-target="#ex{{ $loop->index }}"><a class="dropdown-item fw-bold" href="#"><i class="fa-solid fa-pen-fancy me-2"></i><button class="btn" type="button"> modifier </button></a></li>

                
                   <li data-bs-toggle="modal" data-bs-target="#eex{{ $loop->index }}"><a class="dropdown-item fw-bold" href="#"><i class="fa-solid fa-trash me-2" ></i> <button class="btn" type="submit">supprimer</button> </a></li>
                  
               
                </ul>
              </span>
           
               
              <br>

              <!-- pour voir les commentaires --> 
                <div class="fw-bold text-dark" style="margin-left:60px;">
                  

                    <div class="card" style="max-width:650px;border-radius: 30px;">
                      <div class="card-body py-3" style="background-color:aliceblue;border-radius: 30px;">
                    
                        <p class="card-text">{{ $item->pivot->commentaire }}</p>
                       
                      </div>
                    </div>
           </div> 
            </div>
            

        @else <!-- un autre personne --> 
        <div class="my-3">
                 <img class="pe-2 d-iline" src="{{ asset('storage/'.$item->image) }}" alt="" style="border-radius:50%;height:50px; width:50px;"> 
              <span class="fw-bold text-muted"> {{ $item->nom }} {{ $item->prenom }} 
              <span class="text-dark"> {{ $item->pivot->created_at }}</span> </span> 

            
             
              <!--voir le commentaire --> 
              <br>
               

                       <div class="fw-bold text-dark" style="margin-left:60px;">
                  
                        <!-- border-radius pour le card et le body --> 
                    <div class="card" style="max-width:650px;border-radius: 30px;">
                      <div class="card-body py-3" style="background-color:rgb(255, 255, 255);border-radius: 30px;">
                    
                        <p class="card-text" >{{ $item->pivot->commentaire }}</p>
                       
                      </div>
                    </div>
           </div> 
         
            </div>



        @endif 

             @endforeach

             @else <!-- si le count est null --> 

               <h3 class="fw-bold py-4 text-muted"> Aucune Commentaires <i class="fa-solid fa-comments ms-2"></i></h3> 

               
       <div class="my-3">

         <form action="{{ route('commentaire') }}" method="post">
            @csrf 
                    
         <div class="row">
                 <img class="pe-2 d-iline col-3" src="{{ asset('storage/'.auth()->user()->image) }}" alt="" style="border-radius:50%;height:50px; width:50px;"> 
                 
                 <div class="form-floating col ">
                   <input type="text" name="association_id" class="visually-hidden" value = "{{ $association->id }}">
                   <input type="text" name="user_id" class="visually-hidden" value = "{{ auth()->user()->id}}">
                 
    <textarea class="form-control" required name="commentaire" placeholder="Leave a comment here" id="floatingTextarea" style="border-radius: 30px;"></textarea>
    <label for="floatingTextarea" style="border-radius: 30px;">Ajouter un nouveau commentaire</label>
  </div>
           

               <div class="col">
               
                      <span class="fw-bold fs-5 ms-3" > 
                    <div class="nav-comment" style="border-radius: 30px;">
                     
                     <button class="btn fw-bold" type="submit">Ajouter un commentaire</button>  </div> </span>

              </div> 

              </div>
       
                </form>

              </div> <!-- parent --> 

           @endif 
             
     </div>

     @endauth 

     @guest <!-- pour les invités --> 

     
<div class="container" style = "min-height:40vh;background-image:url({{ asset('images/whatsapp.jpg') }}); " >
   <div class="row">

    <hr>

   
    <div class="my-5 ms-3">

      

      @if($association->user_comments->count() != 0 ) <!-- pour chaque utilisateur qui a laissé un commentaire  ; on le compte meme si elle est repeté n fois , pas de pivot ici : car ne marche pas --> 
  
      <h3 class="fw-bold py-4 text-primary">{{ $association->user_comments->count() }}  Commentaires <i class="fa-solid fa-comments ms-2"></i></h3> 

     

       <div class="my-3">

         <form action="{{ route('commentaire') }}" method="post">
            @csrf 
                    
         <div class="row">
                 <img class="pe-2 d-iline col-3" src="{{ asset('storage/users-image/1648831284.png') }}" alt="" style="border-radius:50%;height:50px; width:50px;"> 
                 
                 <div class="form-floating col ">
                  
                 
    <textarea class="form-control" required name="commentaire" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
    <label for="floatingTextarea">Ajouter un nouveau commentaire</label>
  </div>
           

               <div class="col">
               
                      <span class="fw-bold fs-5 ms-3" > 
                    <div class="nav-comment">
                     
                    <a href="{{ route('login') }}">   <button class="btn fw-bold" type="button"> Ajouter un commentaire</button> </a>  </div> </span>  </div> </span>

              </div> 

        </div>
      
                </form>
 
              </div> <!-- parent --> 
           
              <!-- button pour supprimé les messages envoyé pas encore fait --> 
              <br>
        </div>
              
            </div>

       @foreach ($association->user_comments as $item)
  
      
      <!--  pour afficher seulement les commentaires de cette assocation ou je me trouve  au lieu d'affiher tout 
      -->
                         <!-- Modal pour modifier commentaire --> 
<!-- Modal -->
<div class="modal fade" id="ex{{ $loop->index }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modifier commentaire</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

       <form action="{{ route('edit-comment') }}" method="post">
                   @csrf 
                  @method('put')
                
                 
      <div class="modal-body">


                  <div class="form-floating">
                  veuillez vous
                  </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
        <button type="submit" class="btn btn-primary">Oui</button>
      </div>
      </form>
    </div>
  </div>
</div>


        <div class="my-5 " style ="margin-left:100px; ">
                 <img class="pe-2 d-iline" src="{{ asset('storage/'.$item->image) }}" alt="" style="border-radius:50%;height:50px; width:50px;"> 
              <span class="fw-bold text-muted"> {{ $item->nom }} {{ $item->prenom }} 
              <span class="text-dark"> {{ $item->pivot->created_at }}</span> </span> 

            
             
              <!-- button pour supprimé les messages envoyé pas encore fait --> 
              <br>
                <div class="fw-bold text-dark " style="margin-left:60px;max-width:850px;">
                    {{ $item->pivot->commentaire }}
           </div> 
            </div>



      

             @endforeach

             @else <!-- si le count est null --> 

               <h3 class="fw-bold py-4 text-muted"> Aucune Commentaires <i class="fa-solid fa-comments ms-2"></i></h3> 

               
       <div class="my-3">

         <form action="{{ route('commentaire') }}" method="post">
            @csrf 
                    
         <div class="row">
                 <img class="pe-2 d-iline col-3" src="{{ asset('storage/users-image/1648831284.png') }}" alt="" style="border-radius:50%;height:50px; width:50px;"> 
                 
                 <div class="form-floating col ">
                
    <textarea class="form-control" required name="commentaire" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
    <label for="floatingTextarea"> Ajouter un nouveau commentaire </label>
  </div>
           

               <div class="col">
               
                      <span class="fw-bold fs-5 ms-3" > 
                    <div class="nav-comment">
                     
                  <a href="{{ route('login') }}">   <button class="btn fw-bold" type="button"> Ajouter un commentaire</button> </a>  </div> </span>

              </div> 

              </div>
       
                </form>

              </div> <!-- parent --> 

           @endif 
             
     </div>
     @endguest



   </div>

</div>

@endsection
