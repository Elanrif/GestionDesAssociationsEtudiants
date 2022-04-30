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
    
 
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/component.css')}}">
    <!-- Styles -->
</head>
<body>

  <div class="ilemes">
    <div class="ileme_link1" style="background-color:var(--adminsidebar)">
      <img src="{{ asset('storage/'.auth()->user()->image) }}" alt="" style="border-radius:0 0 250px 250px;heigth:100px;width:200px;"> <!-- pour l'image --> 
      <div class="pt-4 d-flex justify-content-center">
        <p class="fw-bold fs-5">{{ auth()->user()->nom }} {{ auth()->user()->prenom }}</p>
      </div>
  <div class=""><!-- permet aux élement enfant de prendre automatiquement la largeur --> 
  <ul class="nav uuid flex-column">
  <li class="nav-item">
    <a class="nav-link fw-bold admin-lien {{ request()->is('admin-users*') ? 'admin-liens':'' }}" aria-current="page" href="{{ route('admin-users') }}"><i class="fa-solid fa-users-line me-2 fs-5"></i>Les utilisateurs</a>
  </li>
  <li class="nav-item">
    
    <div class="dropend mb-5">
  <a  href="" class="dropdown-toggle nav-link fw-bold admin-lien {{ request()->is('admin-asso*') ? 'admin-liens':'' }}"  id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid me-2 fs-5 fa-layer-group"></i>
    Les Associations
  </a>
  <ul class="dropdown-menu dropdown-menu-dark fw-bold px-4 py-3" aria-labelledby="dropdownMenuButton1">

    @foreach ($associations as $association )
      
    <li><a class="dropdown-item py-2" href="{{ route('admin-asso.show',$association->id) }}">{{ $association->nom }} {{ $association->date }}</a></li>

    @endforeach

    <hr>
    <li><a class="dropdown-item py-2" href="{{ route('admin-asso.index') }}" href="#">Toutes les Associations</a></li>

  
  </ul>
</div>

   <div class="dropend mt-3">
  <a href="" class="dropdown-toggle nav-link fw-bold admin-lien {{ request()->is('admin-evenement*') ? 'admin-liens':'' }}"  id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-calendar-days fs-5 me-2"></i>Les évènements 
  </a>
  <ul class="dropdown-menu dropdown-menu-dark fw-bold px-4 py-3" aria-labelledby="dropdownMenuButton1">
    <li class="nav-liens mb-2"><a class="fw-bold fs-3 nav-link active" href="3" style="cursor: default;">Associations</a></li>
    @foreach ($associations as $association )
      
    <li><a class="dropdown-item py-2" href="{{ route('evenement.show',$association->id) }}">{{ $association->nom }} {{ $association->date }}</a></li>

    @endforeach

    <hr>
    <li><a class="dropdown-item py-2" href="{{ route('admin-asso.index') }}" href="#">rien</a></li>

  
  </ul>
</div>

  </li>

  <li class="nav-item">
    <a class="nav-link fw-bold admin-lien {{ request()->is('admin/contact/generale*') ? 'admin-liens':'' }}" href="{{ route('admin.contact') }}"><i class="fa-solid fa-comment-dots fs-5 me-2"></i>Messages</a> 
  </li>

     <div class="dropend">
  <a href="" class="dropdown-toggle nav-link admin-lien fw-bold   {{ request()->is('admin-moncompte*') ? 'admin-liens':'' }}"  id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-gear  fs-5 me-2"></i>Gérer mon compte
  </a>
  <ul class="dropdown-menu  fw-bold px-4 py-3" aria-labelledby="dropdownMenuButton1">

     <li><a class="dropdown-item py-2  fw-bold" href="{{ url('home/general')}}">Mon compte</a></li>

    <li><a class="dropdown-item py-2 fw-bold {{ request()->is('admin-moncompte/monCompte') ? 'active' : ''}}" href="{{ route('monCompte',$association->id) }}">Confidentialité</a></li>

    <li><a class="dropdown-item py-2 fw-bold" href="{{ url('home/password') }}">Modifier Mot de passe</a></li>

   
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

  <!-- pour la barre de recherche -->
 <nav class="navbar navbar-expand-lg" style="background-color:var(--blanc)">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold nav-link " href="#">logo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link fw-bold admin-lien" aria-current="page" href="{{ url('/') }}">Acceuil</a>
        </li>
        <li class="nav-item mx-3">
          <a  class="nav-link fw-bold admin-lien text-primary position-relative">
            message
            <span class="position-absolute top-1  start-100 translate-middle badge rounded-pill bg-danger">
               {{ $count_message }} 
              
              <span class="visually-hidden">unread messages</span>
            </span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link fw-bold admin-lien dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            A Propos 
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
       
      </ul>
      <form class="d-flex">
      <!--   <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      --> 
      <ul class="nav">
        <li><a class="dropdown-item py-2 fw-bold admin-lien text-danger" href="{{ route('logout') }}" data-bs-toggle="modal" data-bs-target="#exampleModal001">Déconnexion</a></li>
      </ul>
      </form>
    </div>
  </div>
</nav>
  <!-- fin -->
<div style="height:5vh;"></div> <!-- pour eloigner le navbar -->
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
}, 10000);
 
});
</script>
<!-- fin -->
</body>
</html>
