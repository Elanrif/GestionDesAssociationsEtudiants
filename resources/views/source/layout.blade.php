<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASSOCIATION ETUDIANTS</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{asset('css/component.css')}}">
</head>
<body>


<!-- 1eme barre --> 
<nav class="navbar navbar-expand-lg " style="position:fixed ; z-index:8 ; width:100%;background-color:rgb(255, 255, 255);">
  <div class="container-fluid">
     <a class="navbar-brand ps-5" href="/">
    <img src="{{asset('images/Logo_0008_Universite-AS.png') }}" class="img-fluid" alt="don't exist" style="height:80px; width:100px; border-radius:70px;">
    </a>
    <button class="navbar-toggler bg-light shadow" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon shadow"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent1">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
       <li class="nav-item px-5">
          <a class="nav-link  nav-lien fw-bold  fs-5 rounded-2 {{request()->is('/') ? 'nav-liens':''}} " aria-current="page" href="/">Acceuil</a>
        </li>
        <!-- permet juste de cacher le boutton si l'utilisateur n'est pas admin  --> 
          @if(auth()->check() AND auth()->user()->role == 'admin')
        <li class="nav-item px-5">
          <a class="nav-link  fs-5  nav-lien fw-bold rounded-2  {{request()->is('admin*') ? 'nav-liens':''}} " href="{{ route('admin-users') }}"><i class="fa-solid fa-user-tie me-2"></i>Administrateur</a>
        </li>
        @endif
        <li class="nav-item px-5">
          <a class="nav-link nav-lien fw-bold  fs-5 rounded-2 {{request()->is('contact') ? 'nav-liens':''}}" href="{{ url('contact') }}"><i class="fas  fa-envelope  me-2"></i> Contactez-nous </a>
        </li>
       
        
        <li class="nav-item dropend px-3">
          <a class="nav-link  fw-bold nav-lien  fs-5 rounded-2 dropdown-toggle  {{request()->is('admin-asso/association*') ? 'nav-liens':''}}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" >
          Les Associations
          </a>
          <!-- dropdown-menu-dark si on veut un menu noire --> 
          <ul class="dropdown-menu dropdown-menu-dark fw-bold px-4 py-3" aria-labelledby="navbarDropdown">
            @foreach($associations as $association)
               <li><a class="dropdown-item py-2 fs-5" href="{{ route('user.association',$association->id) }}">{{ $association->nom }} {{ $association->date }}</a></li>
            @endforeach

             <hr>
             
             @auth
               @if(auth()->user()->role == 'admin')
             <li><a class="dropdown-item py-2" href="{{ route('admin-asso.index') }}">Toutes les Associations</a></li>
             @else
             <li><a class="dropdown-item py-2" href="#">Toutes les Associations @user</a></li>
             @endif 
             @endauth
             
             @guest
             
             <li><a class="dropdown-item py-2" href="#">Toutes les Associations @visiteur</a></li>

             @endguest
          </ul>
        </li>
      </ul>
     <form class="d-flex me-5 pe-5">
        @guest
        <ul class="togle navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
        <a class="nav-link fw-bold nav-lien  fs-5  {{request()->is('register') ? 'nav-liens':''}} fw-bold me-3 " aria-current="page" href="{{ route('register') }}"> <i class="fas fa-user fw-bold me-2"></i>s'inscrire</a> <!-- sur les modal il y'a obligatoire un lien comme ça '?#' sinon sans ça il gènere un probleme -->
        </li>
        
         <li class="nav-item">
         <a class="nav-link fw-bold nav-lien  fs-5  {{request()->is('login') ? 'nav-liens':''}} fw-bold me-3" aria-current="page" href="{{ route('login') }}"> <i class="fas fa-user-check fw-bold  me-2"></i>se connecter</a>
        
        </li>
        </ul>
        @endguest

        @auth
         <ul class="togle navbar-nav me-auto mb-2 mb-lg-0">
          
          @if(Route::has('blbl'))
        <li class="nav-item">
         
         <a class="nav-link nav-lien fw-bold fs-4 {{request()->is('home*') ? 'nav-liens':''}} " aria-current="page"  href="{{ route('home') }}">
         
         <img class="me-2" src="{{ asset('storage/'.auth()->user()->image) }}" alt="" style="border-radius:50%;height:40px; width:40px;">   Mon compte
        </a>
        </li>
        @endif

         <li class="nav-item  dropstart px-3">
          <a class="nav-link  fw-bold nav-lien  fs-5 rounded-2 {{request()->is('home*') ? 'nav-liens':''}}" href="#" id="navbarDropdowns" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="cursor: default;">
          
         <img class="me-2" src="{{ asset('storage/'.auth()->user()->image) }}" alt="" style="border-radius:50%;height:50px; width:50px;">   Mon compte
          </a>
          <!-- dropdown-menu-dark si on veut un menu noire --> 
          <ul class="dropdown-menu dropdown-menu-darkd fw-bold text-center  py-3" aria-labelledby="navbarDropdowns" style="min-width:300px;">
            
          <li> <img class="me-2" src="{{ asset('storage/'.auth()->user()->image) }}" alt="" style="border-radius:50%;height:70px; width:70px;"> </li>
              <li><a class="dropdown-item fw-bold add py-2" href="#"> {{ auth()->user()->nom }} {{ auth()->user()->prenom }}</a></li>

              <li><a class="dropdown-item add py-2" href="#"> {{ auth()->user()->email }}</a></li>

              
              <hr>
              <span class="bg-light">
               <li><a class="dropdown-item fw-bold  suivre py-2" href="{{ route('home') }}"><i class="fa-solid fa-user-tie me-2"></i>mon compte</a></li>
             <li><a   href="{{ route('logout') }}" data-bs-toggle="modal" data-bs-target="#exampleModal091" class="dropdown-item fw-bold text-danger suivre py-2" >Déconnexion</a></li>
           </span>
          </ul>
        </li>
        

        @if(Route::has('hllome'))
         <li class="nav-item">
        <a href="{{ route('logout') }}" data-bs-toggle="modal" data-bs-target="#exampleModal091" class="nav-link text-danger nav-lien fs-4 fw-bold"> Deconnexion </a>
        </li>
    
       @endif
     
        </ul>
        @endauth
        
      </form>
    </div>
  </div>
</nav>

    <div class="modal fade" id="exampleModal091" tabindex="-1" aria-labelledby="exampleModalLabel001" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel001"><i class="fa-solid fa-triangle-exclamation me-1 text-danger"></i> Attention</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
       <div class="modal-body fw-bold d-flex justify-content-center">
        vous allez être  <span class="text-danger fw-bold px-2">déconnecté</span>  du site  ? 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
        <a type="button" href="{{ route('logout') }}" class="btn btn-primary px-4 fw-bold">Oui</a>
      </div>
    </div>
  </div>
</div>

  <!-- fin Modal -->

<div class="" style="height:13vh;"></div>
<!-- fin --> 
     <!-- ajouter quelque chose -->

      
         @yield('content')


   <!--  newsletter  :: lien ==> https://www.helloasso.com/blog/quel-evenement-associatif-creer/ -->
<!-- Modal -->

<div class="modal fade " id="inscris" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="exampleModalLabel">S'inscrire au <span class="text-primary fw-bold">Newsletter</span></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label fw-bold">E-mail:</label>
            <input type="email" class="form-control" id="recipient-name" placeholder= "nom@gmail.com" required>
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label fw-bold">Message:</label>
            <textarea style="height:15vh;" class="form-control" id="message-text" placeholder="écrire un message..."></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-primary">Envoyer</button>
      </div>
    </div>
  </div>
</div>
<!-- fin modal pour newsletter--> 

     <hr style="margin:0 100px;">
     <div class="container-fluid d-flex justify-content-center align-items-center " style="height:50vh;background-color:black;">
       
      <div class="text-center" style="">
        <p class="fs-5 text-muted text-light my-3">Association , restez informéez</p>
        <h1 class="fw-bold my-4" style="color:white;">Inscrivez-vous à notre</h1>
        <h1 class=" fw-bold" style="color:rgb(255, 157, 173);">newsletter</h1>
        <!-- Button trigger modal -->
         <button class="btn my-4 fw-bold px-3 btn-outline-light"  data-bs-toggle="modal" data-bs-target="#inscris">je m'inscris</button>

      </div>
    </div>   
     
     <!--  -->
           
     <!--Liens du footer-->

     <div class="liens d-flex justify-content-center align-items-center container-fluid px-3" style="min-height:50vh;"> <!-- min-height : pour hauteur minimale , sinon si c'est directement height : on va pas scroller -->
      
     <!--liens-->
        <div class="row gy-3 mx-5 px-5">
           <div class="col-md-3">
           <h4 class="fw-bold">Qui sommes nous ? </h4> <hr class="w-50 " style="height:5px;color:var(--pink)">

           <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis iusto odio sapiente nobis beatae ex enim molestiae, neque voluptas? Animi molestias provident id ducimus tenetur velit necessitatibus minima, at sequi.
           </p>
          
        </div>

          <div class="col-md-3">
           <h4 class="fw-bold">Dernier acutalité</h4> <hr class="w-50 " style="height:5px;color:var(--pink)">

           <ul class="nav suivre flex-column">
              <a class="nav-link" href="#ancre" style="text-decoration:none; "><i class="far fa-arrow-alt-circle-right me-2 mt-2"></i>Les Associations etudiants. </a> 

            <a class="nav-link" href="" style="text-decoration:none;"><i class="far fa-arrow-alt-circle-right  me-2 mt-2"></i>Consultez tout les Evenements </a> 

             <a class="nav-link" href="" style="text-decoration:none;color:"><i class="far fa-arrow-alt-circle-right me-2 mt-2"></i>Plus d'informations.... </a> 
           </ul>
          
        </div>

          <div class="col-md-2">
           <h4 class="fw-bold">Nous suivre</h4> <hr class="w-50 " style="height:5px;color:var(--pink);">
           <ul class="nav suivre flex-column">
           <a href="#" class="nav-link">
           <i class="fab fa-facebook-square  me-2"></i> <span class="pb-1"> Facebook </span> </a>
           
           <a href="#" class="nav-link">
           <i class="fab fa-twitter me-2"></i> <span class=" pb-1"> Twitter </span> </a> 
 
           <a href="#" class="nav-link">
           <i class="fab fa-google-plus-g  me-2"></i> <span class=" pb-1"> Google </span> </a> 

           <a href="#" class="nav-link">
           <i class="fab fa-linkedin-in me-2"></i> <span class=" pb-1"> Linkedin </span> </a> 
   
           </ul>          
       </div>

          <div class="col-md-4 mb-3">
            <h4 class="fw-bold">Contactez-nous</h2> <hr class="w-50 " style="height:5px;color: var(--pink);">
            <ul class="nav suivre flex-column">
           <a href="#" class="nav-link">
           <i class="fa-solid fa-location-dot me-2"></i> <span class="pb-1">Avenue de Sebta, Mhannech II
            <br/>93002 - Tétouan - Maroc  </span> </a>
           
           <a href="#" class="nav-link">
     <i class="fa-solid fa-phone me-2"></i> <span class="pb-1">  (+212) 5 39 99 64 32 </span> </a> 
 
           <a href="#" class="nav-link">
                 <i class="fas fa-tty me-2 mt-3"></i> <span class="pb-1">(+212) 5 39 99 45 00 </span> </a> 

           <a href="#" class="nav-link">
          <i class="fas fa-envelope mt-3 me-1"></i> <span class="pb-1">  fs.tetouan.contact@gmail.com  </span> </a> 
   
           </ul>
         </div>
        </div>
     <!--copyright-->
      
     </div>
     <div class="container-fluid d-flex  justify-content-center align-items-center " style="background-color:var(--noir--); height:70px; color:var(--blanc--);">
     <div class="row">
       <div class="col-md-12">tous les droits réservés fs tetouan <a href="" style="text-decoration:none;color:var(--orange-red);" class="me-3 ms-1"> Copyright © 2022.</a> Courriel : <a href="" class="ms-1" style="text-decoration:none; color:var(--orange-red);"> fs.tetouan.contact@gmail.com </a> 
       &nbsp;&nbsp; <span class="border border-secondary me-2 bg-light"></span> <a href="" style="color:var(--orange-red);text-decoration:none;"> mention legale </a> &nbsp; &nbsp; 
       &nbsp;&nbsp; <span class="border border-secondary me-2 bg-light"></span> <a href="" style="color:var(--orange-red); text-decoration:none;"> politique de confidentialité </a> &nbsp; &nbsp;  <br/>
      </div>
     </div> 
     <!-- -->
 

  <script src="{{asset('js/app.js')}}"></script>
  <script src="{{ asset('js/test.js') }}"></script>

    <!-- js button autoclose après 5000 '5 secondes' ; tout les enfants qui auront des alert ils les fermera après les x secondes definis --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script type="text/javascript">

$(document).ready(function () {
 
window.setTimeout(function() {
    $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
        $(this).remove(); 
    });
}, 10000);
 
});
</script>
<!-- fin --> 
</body>
</html>