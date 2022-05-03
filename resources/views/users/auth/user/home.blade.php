
@extends('source.layout')

@section('content')

<div class="container-fluid d-flex justify-content-center">
    <div style="width:70vh;min-height:40vh;margin-top:100px;">
     
        
  
      <div class="container d-flex justify-content-center" style="min-height:7vh;">
        <div style="max-width:500px;">
          <!-- pour s'être connecter --> 
    @if ($message = Session::get('login'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
   <span class="fw-bold">{{ $message }}</span><strong class="fs-5"> <i class="fa-solid fa-face-grin-wide" style="color:rgb(255, 0, 157);"></i> </strong>.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>
    @endif

     <!-- pour s'être connecter --> 
    @if ($message = Session::get('recover'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
   <span class="fw-bold">{{ $message }}</span><strong class="fs-5"> <i class="fa-solid fa-face-grin-wide" style="color:rgb(255, 0, 157);"></i> </strong>.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>
    @endif


        <!-- pour La création du compte --> 
    @if ($message = Session::get('register'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
   <span class="fw-bold">{{ $message }}</span><strong class="fs-5"> <i class="fa-solid fa-face-grin-wide" style="color:rgb(255, 0, 157);"></i> </strong>.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>
    @endif


        </div>
      </div>

    <!-- Modal02 -->
<div class="modal fade" id="staticBackdrop1re1"  data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel11" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="staticBackdropLabel11"> <i class="fa-solid fa-circle-info text-info me-2"></i>Information Personnelle </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body fw-bold ">
        <ul class="nav ps-5" style="display:block;">
            <div class="row">
                <div class="col">
              <li> 
              <div class="d-inline">Nom</div>
              <div class="shadow-sm p-3 mb-5 bg-body rounded w-75">{{ auth()->user()->nom }}</div>
            </li>
             <li>
                 <div class="d-inline">E-mail</div>
              <div class="shadow-sm p-3 mb-5 bg-body rounded w-75">{{ auth()->user()->email }}</div>
            </li>
                    <li>
                         <div class="d-inline">Code Etudiant</div>
              <div class="shadow-sm p-3 mb-5 bg-body rounded w-75">{{ auth()->user()->code_apogée }}</div>
            </li>
               <li>
                         <div class="d-inline">Role</div>
              <div class="shadow-sm p-3 mb-5 bg-body rounded w-75">{{ auth()->user()->role }}</div>
            </li>
                </div>
        <!-- deuxième partie --> 
                <div class="col">
                     <li>
                 <div class="d-inline">Prenom</div>
              <div class="shadow-sm p-3 mb-5 bg-body rounded w-75">{{ auth()->user()->prenom }}</div>
            </li>
             <li>
                <div class="d-inline text-primary">Mot de passe</div>
              <div class="shadow-sm p-3 mb-5 bg-body  rounded w-75">{{ auth()->user()->password }}</div>
            </li>
               
             <li>
                 <div class="d-inline">Filière</div>
              <div class="shadow-sm p-3 mb-5 bg-body rounded w-75">{{ auth()->user()->filiere }}</div>
            </li>

             <li>
                 <div class="d-inline">Numero Tel</div>
              <div class="shadow-sm p-3 mb-5 bg-body rounded w-75">{{ auth()->user()->num_tel }}</div>
            </li>
                </div>
            </div>
           
            
            
        </ul>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <div><a class="nav link btn btn-primary fw-bold" style="text-decoration:none;" href="{{ route('home.general') }}"> <i class="fas fa-user-edit fs-4 me-2"></i> Modifier</a></div>
        <button type="button" class="btn d-inline px-4  btn-secondary fw-bold" data-bs-dismiss="modal">Fermer</button>
        
      </div>
    </div>
  </div>
</div>

<!-- fin -->


    <div class="row"> <!-- button xample pour la photo --> 
    <a class="w-25" data-bs-toggle="modal" data-bs-target="#xampleModal" href="#">  
    <div class="col-8 pt-3 col-lg-3 me-3">
      <div class="mb-3">

</div>
<img class="pe-2 d-iline" src="{{ asset('storage/'.auth()->user()->image) }}" alt="" style="border-radius:50%;height:150px; width:150px;">
</div>
</a>
<div class="col ms-3 flex-column  align-items-center pt-1 ps-5 fs-5"> 
    <h3 class="fw-bold mt-5"> {{ auth()->user()->nom }}   {{ auth()->user()->prenom }}  
     </h3>
     <div class="row mt-5 g-3 row-cols-1 row-cols-md-2"> 
      <a href="{{ route('home.edit') }}"> <button class="col btn border border-black btn-outline-black eiter fw-bold" data-bs-toggle="modal" data-bs-target="#staticBackdrop1vvre1"> <i class="fa-solid fs-5 fa-gears"></i> &nbsp;Gérer compte</button></a>

      <a href="#"> <button class="col btn eiter border border-black fw-bold" data-bs-toggle="modal" data-bs-target="#staticBackdrop1re1">  <i class="fa-solid fa-lock"></i> &nbsp;Confidentialité</button></a>
   
    </div>
    </div>

</div>
    </div>

</div>

<!-- les autre liens --> 

<div class="container-fluid d-flex " style="background-color:rgb(255, 255, 255);">
  <div style="min-height:40vh;margin-top:10px;">
   
  
  <!-- pour s'être connecter --> 
    @if ($message = Session::get('nom'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
   <span class="fw-bold">{{ $message }}</span><strong class="fs-5"> <i class="fa-solid fa-face-grin-wide" style="color:rgb(255, 0, 157);"></i> </strong>.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>
    @endif

        <!-- pour La création du compte --> 
    @if ($message = Session::get('nom'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
   <span class="fw-bold">{{ $message }}</span><strong class="fs-5"> <i class="fa-solid fa-face-grin-wide" style="color:rgb(255, 0, 157);"></i> </strong>.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>
    @endif

    <!-- Modal02 -->
<div class="modal fade" id="staticBackdrop1re1"  data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel11" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="staticBackdropLabel11"> <i class="fa-solid fa-circle-info text-info me-2"></i>Information Personnelle </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body fw-bold ">
        <ul class="nav ps-5" style="display:block;">
            <div class="row">
                <div class="col">
              <li> 
              <div class="d-inline">Nom</div>
              <div class="shadow-sm p-3 mb-5 bg-body rounded w-75">{{ auth()->user()->nom }}</div>
            </li>
             <li>
                 <div class="d-inline">E-mail</div>
              <div class="shadow-sm p-3 mb-5 bg-body rounded w-75">{{ auth()->user()->email }}</div>
            </li>
                    <li>
                         <div class="d-inline">Code Etudiant</div>
              <div class="shadow-sm p-3 mb-5 bg-body rounded w-75">{{ auth()->user()->code_apogée }}</div>
            </li>
               <li>
                         <div class="d-inline">Role</div>
              <div class="shadow-sm p-3 mb-5 bg-body rounded w-75">{{ auth()->user()->role }}</div>
            </li>
                </div>
        <!-- deuxième partie --> 
                <div class="col">
                     <li>
                 <div class="d-inline">Prenom</div>
              <div class="shadow-sm p-3 mb-5 bg-body rounded w-75">{{ auth()->user()->prenom }}</div>
            </li>
             <li>
                <div class="d-inline text-primary">Mot de passe</div>
              <div class="shadow-sm p-3 mb-5 bg-body  rounded w-75">{{ auth()->user()->password }}</div>
            </li>
               
             <li>
                 <div class="d-inline">Filière</div>
              <div class="shadow-sm p-3 mb-5 bg-body rounded w-75">{{ auth()->user()->filiere }}</div>
            </li>

             <li>
                 <div class="d-inline">Numero Tel</div>
              <div class="shadow-sm p-3 mb-5 bg-body rounded w-75">{{ auth()->user()->num_tel }}</div>
            </li>
                </div>
            </div>
           
            
            
        </ul>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <div><a class="nav link btn btn-primary fw-bold" style="text-decoration:none;" href="{{ route('home.general') }}"> <i class="fas fa-user-edit fs-4 me-2"></i> Modifier</a></div>
        <button type="button" class="btn d-inline px-4  btn-secondary fw-bold" data-bs-dismiss="modal">Fermer</button>
        
      </div>
    </div>
  </div>
</div>

<!-- fin -->


    <div class="row"> <!-- button xample pour la photo --> 
   
<div class="col ms-3 d-flex  align-items-center pt-1 ps-5 fs-5"> 
   
  @if(auth()->user()->evenement_s->count()==0 ) <!-- juste je vais faire une condition que si on a pas de ligne le texte soit en noir , il suffit de sortir ' nav-liens  ' -->
  
         <div class="dropup">
  
         <button  id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" class="btn position-relative  border border-black fw-bold">
           <i class="fa-solid  fa-thumbs-up"></i> j'aime
           <!-- visually-hidden pour l'icon --> 
           <span class="position-absolute top-1 visually-hidden start-100 translate-middle badge rounded-pill bg-danger">
            {{ auth()->user()->evenement_s->count() }} <!-- pour le model Like ; dans le model user il y'a la methode evenement_s qui relient avec les evenement via le pivot like : j'ai répeté les memes choses , seulement il suffit d'aller voir dans le model user ces relations -->
             <span class="visually-hidden">unread messages</span>
               </span>
              </button>
              
              <ul class="dropdown-menu dropdown-menu-dark fw-bold" aria-labelledby="dropdownMenuButton2" style="min-width:60vh;min-height:20vh;position:relative">
            
                 <li><a class="dropdown-item fw-bold my-2 mt-4" > Aucune mention j'aime ! </a></li>
            
                    <li><hr class="dropdown-divider"></li>
                <li style="position:absolute;bottom:3px;width:100%;"><a class="dropdown-item fw-bold text-primary" href="{{ url('/#eventss') }}">Toutes les évènements</a></li>
              </ul>
            </div>

         @else <!-- sinon la couleur sera pink -->

         <div class="dropup">
  
         <button  id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" class="btn position-relative  nav-liens  border border-black fw-bold">
           <i class="fa-solid  fa-thumbs-up"></i> j'aime
           <span class="position-absolute top-1  start-100 translate-middle badge rounded-pill bg-danger">
            {{ auth()->user()->evenement_s->count() }} <!-- pour le model Like ; dans le model user il y'a la methode evenement_s qui relient avec les evenement via le pivot like : j'ai répeté les memes choses , seulement il suffit d'aller voir dans le model user ces relations -->
             <span class="visually-hidden">unread messages</span>
               </span>
              </button>
              
                <ul class="dropdown-menu dropdown-menu-dark fw-bold" aria-labelledby="dropdownMenuButton2" style="min-width:60vh;min-height:30vh;position:relative">
                   @foreach (auth()->user()->evenement_s as $evenement)
         <!-- je repete encore , ici on accede a chaque evenement puis on passe par une autre relation 'association' belongTo puis aller aux association ; voir dans le model 'Evenement' -->           
                   <li><a class="dropdown-item fw-bold my-2" href="{{ route('user.association',$evenement->association->id) }}">{{ $evenement->type }} {{ $evenement->date }} {{ $evenement->heure }}</a></li>
              
                   @endforeach
                      <li><hr class="dropdown-divider"></li>
                  <li style="position:absolute;bottom:3px;width:100%;"><a class="dropdown-item fw-bold text-primary" href="{{ url('/#eventss') }}">Toutes les évènements</a></li>
                </ul>
              </div>
      @endif

  @if(auth()->user()->evenements->count() == 0) <!-- attention ici c'est les évènements pour les participes --> 
       
              <div class="dropup mx-3">
  
         <button  id="dropdownMenuButton17" data-bs-toggle="dropdown" aria-expanded="false" class="btn position-relative  border border-black fw-bold">
            évènements(participé)
           <span class="position-absolute top-1  visually-hidden start-100 translate-middle badge rounded-pill bg-danger">
            {{ auth()->user()->evenements->count() }} <!-- pour le model Like -->
             <span class="visually-hidden">unread messages</span>
               </span>
              </button>
              
               <ul class="dropdown-menu dropdown-menu-dark fw-bold" aria-labelledby="dropdownMenuButton2" style="min-width:60vh;min-height:20vh;position:relative">
            
                 <li><a class="dropdown-item fw-bold my-2 mt-4" href="#"> Vous ne participez a aucun évènement ! </a></li>
            
                    <li><hr class="dropdown-divider"></li>
                <li style="position:absolute;bottom:3px;width:100%;"><a class="dropdown-item fw-bold text-primary" href="{{ url('/#eventss') }}">Toutes les évènements</a></li>
              </ul>

              </div>
      

         @else 
     
          <div class="dropup mx-3">
  
         <button  id="dropdownMenuButton17" data-bs-toggle="dropdown" aria-expanded="false" class="btn position-relative  nav-liens  border border-black fw-bold">
            évènements(participé)
           <span class="position-absolute top-1  start-100 translate-middle badge rounded-pill bg-danger">
            {{ auth()->user()->evenements->count() }} <!-- pour le model Like -->
             <span class="visually-hidden">unread messages</span>
               </span>
              </button>
              
                <ul class="dropdown-menu dropdown-menu-dark fw-bold" aria-labelledby="dropdownMenuButton17" style="min-width:60vh;min-height:30vh;position:relative">
                   @foreach (auth()->user()->evenements as $evenement)
                     
                   <li><a class="dropdown-item fw-bold my-2" href="{{ route('user.association',$evenement->association->id) }}">{{ $evenement->type }} {{ $evenement->date }} {{ $evenement->heure }}</a></li>
              
                   @endforeach
                      <li><hr class="dropdown-divider"></li>
                  <li style="position:absolute;bottom:3px;width:100%;"><a class="dropdown-item fw-bold text-primary" href="{{ url('/#eventss') }}">Toutes les évènements</a></li>
                </ul>
              </div>
      

         @endif

         @if( auth()->user()->associations->count() == 0)<!-- pour les associations -->

         <div class="dropup mx-3">
  
         <button  id="dropdownMenuButton17" data-bs-toggle="dropdown" aria-expanded="false" class="btn position-relative  border border-black fw-bold">
            associations(suivie)
           <span class="position-absolute top-1 visually-hidden start-100 translate-middle badge rounded-pill bg-danger">
            {{ auth()->user()->associations->count()}} <!-- pour le model Like -->
             <span class="visually-hidden">unread messages</span>
               </span>
              </button>
            <ul class="dropdown-menu dropdown-menu-dark fw-bold" aria-labelledby="dropdownMenuButton2" style="min-width:60vh;min-height:20vh;position:relative">
            
                 <li><a class="dropdown-item fw-bold my-2 mt-4" href="#"> Vous ne suivez  aucune association ! </a></li>
            
                    <li><hr class="dropdown-divider"></li>
                <li style="position:absolute;bottom:3px;width:100%;"><a class="dropdown-item fw-bold text-primary" href="{{ url('/#associations') }}">Toutes les Associations</a></li>
              </ul>
              </div>
      
           @else
       
          <div class="dropup mx-3">
  
         <button  id="dropdownMenuButton17" data-bs-toggle="dropdown" aria-expanded="false" class="btn position-relative  nav-liens  border border-black fw-bold">
             associations(suivie)
           <span class="position-absolute top-1  start-100 translate-middle badge rounded-pill bg-danger">
            {{ auth()->user()->associations->count() }} <!-- pour le model Like -->
             <span class="visually-hidden">unread messages</span>
               </span>
              </button>
              
                <ul class="dropdown-menu dropdown-menu-dark mt-2 fw-bold" aria-labelledby="dropdownMenuButton17" style="min-width:60vh;min-height:30vh;position:relative">
                   @foreach (auth()->user()->associations as $association)
                     
                   <li><a class="dropdown-item fw-bold my-2" href="{{ route('user.association',$association->id) }}">{{ $association->nom }} {{ $association->date }} </a></li>
              
                   @endforeach
                      <li><hr class="dropdown-divider"></li>
                  <li style="position:absolute;bottom:3px;width:100%;"><a class="dropdown-item fw-bold text-primary" href="{{ url('/#associations') }}">Toutes les Associations</a></li>
                </ul>
              </div>
         @endif

         @if(auth()->user()->role <> 'admin')

    
           @if($reponses == 0)  
           
         <!-- message non-envoyé < 0 je le cache pour l'instant --> 
          <div class="dropup mx-3 ">
  
         <button  id="dropdownMenuButton170" data-bs-toggle="dropdown" aria-expanded="false" class="btn position-relative  border border-black fw-bold" style="">
           <i class="fa-brands fs-3 fa-facebook-messenger"></i>
             réponse
           <span class="position-absolute top-1 visually-hidden start-100 translate-middle badge rounded-pill bg-danger"> <!-- ici usercontact est le nom d' une methode  et VISUALLY-HIDDEN pour cacher l'icon en rouge  si c'est < 0  --> 
              {{ $reponses}}  
             <span class="visually-hidden">unread messages</span>
               </span>
              </button>
            <ul class="dropdown-menu dropdown-menu-dark fw-bold" aria-labelledby="dropdownMenuButton2" style="min-width:60vh;min-height:20vh;position:relative">
            
                 <li class="my-2"><a class="dropdown-item mb-2 fw-bold text-warning" href="{{ route('reponse') }}">Consulter tout les messages </a></li>
              
                 <li class="my-2">
                   <a href="#" class="nav-link"> Aucune réponse de la part de l'administrateur</a>
                 </li>
                <li style="position:absolute;bottom:0px;width:100%;"><a class="dropdown-item mb-2 fw-bold text-warning" href="{{ url('/contact#floatingTextarea') }}">Envoyé un message a l'administrateur </a></li>

             
              </ul>
              </div>
              <!-- fin --> 
         
         @else
         <!-- message non-envoyé < 0 je le cache pour l'instant --> 
          <div class="dropup mx-3 ">
  
         <button  id="dropdownMenuButton170" data-bs-toggle="dropdown" aria-expanded="false" class="btn position-relative  border border-black fw-bold" style="color:var(--pink)">
           <i class="fa-brands fs-3 fa-facebook-messenger"></i>
             réponse
           <span class="position-absolute top-1  start-100 translate-middle badge rounded-pill bg-danger"> <!-- ici usercontact est le nom d' une methode  et VISUALLY-HIDDEN pour cacher l'icon en rouge  si c'est < 0  --> 
              {{ $reponses}}  
             <span class="visually-hidden">unread messages</span>
               </span>
              </button>
            <ul class="dropdown-menu dropdown-menu-dark fw-bold" aria-labelledby="dropdownMenuButton2" style="min-width:60vh;min-height:20vh;position:relative">
            
                 <li class="my-2"><a class="dropdown-item mb-2 fw-bold text-warning" href="{{ route('reponse') }}">Consulter tout les messages </a></li>
              
               
                <li style="position:absolute;bottom:0px;width:100%;"><a class="dropdown-item mb-2 fw-bold text-warning" href="{{ url('/contact#floatingTextarea') }}">Envoyé un message a l'administrateur </a></li>

             
              </ul>
              </div>
              <!-- fin --> 
              @endif

       @endif


      <a class="me-3" href="#"> <button class="col btn eiter border border-black fw-bold" data-bs-toggle="modal" data-bs-target="#staticBjkackdrop1re1">  <i class="fa-solid fa-lock"></i> &nbsp;autre</button></a>
   
   
    </div>

</div>
<hr style="width:100%;">
    </div>

    
  </div>


@endsection





