@extends("source/layout")
@section('content')

<div class="card bg-dark text-white">
<!-- pour faire dynamique l'image de l'asso dans le disque storage -->    

 <!-- suppression membre du bureau --> 
   @if ($message = Session::get('suivis'))
     <div class="container d-flex justify-content-center mt-2 bg-body rounded-1 fs-5 fw-bold">     <div class="alert  alert-primary ms-4 alert-dismissible fade show w-50" role="alert">
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
     <div class="d-flex justify-content-center"> 
     <h3 class="text-center fs-1 fw-bold" style="color:var(--blue)">Les Membres du Bureau</h3>
     </div>
     <div class="container-fluid d-flex justify-content-center">

        <div style="max-width:1500px;min-height:400px;"> <!-- max-width pour maximum 1000px ne pas dépasser ça ; en revanche il continuera au centre en agrandissant et s'arrête a cette taille -->
       
          <div class="row row-cols-1 row-cols-md-3 mt-3">

             @foreach ($association->bureaus as $bureau)
            <div class="col hoover px-5" style = "transition:0.6s ease-out;"> <!-- je vais centré les balises p seulement -->
              <p class="text-center">  <img src="{{asset('storage/'.$bureau->image) }}" class="img-fluid" alt="don't exist" style="height:60px; width:60px; border-radius:70px;">
              </p>
              <p class="text-center fw-bold" style="font-size:18px;color:var(--pink)">{{ $bureau->Poste }}</p>
             <p class="text-center fw-bold" style="color:#26046a"><i class="fa-solid fa-envelope"></i> {{ $bureau->email }} </p>

             <div class="text-start membre-lien pt-3" style="font-weight: bold;">
               <p><i class="fa-solid fa-user-tie"></i> {{ $bureau->nom }} {{ $bureau->prenom }}</p>
               <p><i class="fa-solid fa-square-phone"></i> {{ $bureau->Tel }}</p>
               <p> <i class="fa-solid fa-graduation-cap"></i> {{ $bureau->filiere }}</p>
               <p><i class="fa-solid fa-calendar-day"></i> {{ $bureau->date_mandat }}</p>
               <p class="text-light">Lorem ipsum dolor sit amet.ip</p> <!-- sert juste a avoir de l'espace entre les membres --> 
             </div>
            
            </div>
            @endforeach
           
          </div>

        </div>
    </div>
      <!-- fin -->
   

</div>



<div class="container-fluid my-5">
    <!-- $association->id pour avoir l'instance de l'association dans le nouveau page $association -->
   
 <div id="evenement" class="text-center fs-1 fw-bold " style="color:var(--blue)">Les évènements </div> <br><br>
    <div class="row row-cols-1 row-cols-md-3 pb-5 g-4">
 

    @foreach ($association->evenements as $evenement )
      
    <div class="col pb-5">
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



@endsection
