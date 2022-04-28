<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Acceuil') }}</title>

    <!-- Scripts -->
    
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    
 
    <link rel="stylesheet" href="{{asset('css/component.css')}}">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

  <div class="ilemes">
    <div class="ileme_link1 bg-black">
      <img src="{{ asset('storage/'.auth()->user()->image) }}" alt="" style="border-radius:0 0 250px 250px;heigth:100px;width:200px;"> <!-- pour l'image --> 
      <div class="pt-4 d-flex justify-content-center bg-dark">
        <p class="text-light fw-bold fs-5">{{ auth()->user()->nom }} {{ auth()->user()->prenom }}</p>
      </div>
  <div class=""><!-- permet aux élement enfant de prendre automatiquement la largeur --> 
  <ul class="nav uuid flex-column">
    
  <li class="nav-item">
    <a class="nav-link fw-bold text-light btn  btn-outline-primary {{ request()->is('admin-users*') ? 'active':'' }} " aria-current="page" href="{{ route('admin-users') }}"><i class="fa-solid fa-users-line me-2 fs-5"></i>Les utilisateurs</a>
 
  <li class="nav-item">
    
    <div class="dropend">
  <button class="btn btn-black dropdown-toggle nav-link fw-bold text-light btn  btn-outline-primary {{ request()->is('admin-asso*')?'active':'' }} border-dark" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid me-2 fs-5 fa-layer-group"></i>
    Les Associations
  </button>
  <ul class="dropdown-menu dropdown-menu-dark fw-bold px-4 py-3" aria-labelledby="dropdownMenuButton1">

    @foreach ($associations as $association )
      
    <li><a class="dropdown-item py-2" href="{{ route('admin-asso.show',$association->id) }}">{{ $association->nom }} {{ $association->date }}</a></li>

    @endforeach

    <hr>
    <li><a class="dropdown-item py-2" href="{{ route('admin-asso.index') }}">Toutes les Associations</a></li>

  
  </ul>
</div>

  </li>
  <li class="nav-item">
    <a class="nav-link fw-bold text-light btn  btn-outline-primary border-dark" href="#"><i class="fa-solid fa-calendar-days fs-5 me-2"></i>Les Evènements</a>
  </li>
  <li class="nav-item">
    <a class="nav-link fw-bold text-light btn  btn-outline-primary border-dark"><i class="fa-solid fa-comment-dots fs-5 me-2"></i>Messages</a> 
  </li>

     <div class="dropend">
  <button class="btn btn-black dropdown-toggle nav-link fw-bold text-light btn  btn-outline-primary {{ request()->is('admin-moncompte*') ? 'active':'' }} border-dark" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-gear  fs-5 me-2"></i>Gérer mon compte
  </button>
  <ul class="dropdown-menu  fw-bold px-4 py-3" aria-labelledby="dropdownMenuButton1">

     <li><a class="dropdown-item py-2 {{ request()->is('admin-moncompte/monCompte') ? 'active' : ''}} fw-bold" href="{{ route('monCompte') }}">Mon compte</a></li>

    <li><a class="dropdown-item py-2 fw-bold" href="{{ route('admin-asso.show',$association->id) }}">Confidentialité</a></li>

    <li><a class="dropdown-item py-2 fw-bold" href="{{ route('admin-asso.show',$association->id) }}">Modifier mes informations</a></li>

   
    <hr>
    <li><a class="dropdown-item py-2 fw-bold text-danger" href="{{ route('logout') }}" data-bs-toggle="modal" data-bs-target="#exampleModal001">Déconnexion</a></li>

  
  </ul>
</div>

</ul>
           
    </div>
    </div>
    <div class="ileme_link2">
 
<!-- Modal -->
<div class="modal fade" id="exampleModal001" tabindex="-1" aria-labelledby="exampleModalLabel001" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel001"><i class="fa-solid fa-triangle-exclamation me-1 text-danger"></i> Attention</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
       <div class="modal-body fw-bold d-flex fs-4 justify-content-center">
        vous allez être  <span class="text-danger px-2">déconnecté</span>  du site  ? 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary px-2 fw-bold px-3" data-bs-dismiss="modal">Non</button>
        <a type="button" href="{{ route('logout') }}" class="btn btn-danger px-4 fw-bold">Oui</a>
      </div>
    </div>
  </div>
</div>

  <!-- fin Modal --> 

  <nav class="navbar navbar-expand-lg"  style="position:fixed; width:100%;background-color:rgb(5, 15, 62);z-index:18;">
  <div class="container-fluid px-4" style="padding:auto 100px;">
    <a class="navbar-brand ps-4 ms-4" href="/">
    <img src="{{asset('images/Logo_0008_Universite-AS.png') }}" class="img-fluid" alt="don't exist" style="height:80px; width:100px; border-radius:70px;">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedConten01t" aria-controls="navbarSupportedConten01t" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarSupportedConten01t" style="margin:auto 100px;">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="us-ser nav-item mx-5 px-4">
          <a class="nav-link rounded-3 text-light fw-bold btn-outline-primary " aria-current="page" href="{{ route('welcome') }}"><i class="fas fa-home-alt me-2 fs-4"></i>Acceuil</a>
        </li>

        <li class="us-ser nav-item mx-5 px-4">
          <a class="nav-link rounded-3 text-light fw-bold btn-outline-primary" aria-current="page" href="{{ route('home') }}"><i class="fa-solid fa-house-user fs-4 me-2"></i>Mon-compte</a>
        </li>
     
  
      
      </ul>
      <div class="pe-5" style="margin-right:50px;">
      <form class="d-flex me-3 " >
  
        @auth
        <a href="{{ route('logout') }}" data-bs-toggle="modal" data-bs-target="#exampleModal001" class="btn btn-outline-danger fw-bold"> Déconnexion </a>
        @endauth
      </form>
      </div>
    </div>
  </div>
</nav>
<div style="height:14vh;"></div> <!-- pour eloigner le navbar -->
        @yield('admin')

    </div>
  </div>

    <!-- js button autoclose après 5000 '5 secondes' ; tout les enfants qui auront des alert ils les fermera après les x secondes definis --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script type="text/javascript">

$(document).ready(function () {
 
window.setTimeout(function() {
    $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
        $(this).remove(); 
    });
}, 3000);
 
});
</script>
<!-- fin -->
</body>
</html>
