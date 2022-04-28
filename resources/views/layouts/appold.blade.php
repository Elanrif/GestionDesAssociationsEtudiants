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
  <!-- Modal de deconnexion -->

<!-- Modal -->
<div class="modal fade" id="exampleModal001" tabindex="-1" aria-labelledby="exampleModalLabel001" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel001"><i class="fa-solid fa-triangle-exclamation me-1 text-danger"></i> Attention</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
       <div class="modal-body fw-bold d-flex justify-content-center">
        vous allez être  <span class="text-primary px-2">déconnecté</span>  du site  ? 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <a type="button" href="{{ route('logout') }}" class="btn btn-primary px-4 fw-bold">OK</a>
      </div>
    </div>
  </div>
</div>

  <!-- fin Modal --> 

  <nav class="navbar navbar-expand-lg" style="background-color:rgb(255, 255, 255)">
  <div class="container-fluid px-4" style="padding:auto 100px;">
    <a class="navbar-brand ps-4 ms-4" href="/">
    <img src="{{asset('images/Logo_0008_Universite-AS.png') }}" class="img-fluid" alt="don't exist" style="height:80px; width:100px; border-radius:70px;">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedConten01t" aria-controls="navbarSupportedConten01t" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarSupportedConten01t" style="margin:auto 100px;">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="mx-5 px-4">
          <a class="nav-link nav-lien fw-bold  {{ route('welcome') }}" aria-current="page" href="/"><i class="fas fa-home-alt me-2 fs-4"></i>Acceuiljj</a>
        </li>
        @auth
         
      @if(auth()->check() AND auth()->user()->role == 'admin')
        <li class="us-ser nav-item mx-5 px-4">
          <a class="nav-link text-light rounded-circle fw-bold btn-outline-primary {{ request()->is('admin-users')? 'active': '' }}" aria-current="page" href="{{ route('admin-users') }}"><i class="fa-solid fa-user-tie fs-4 me-2"></i>Administration</a>
        </li>
      @endif
      @endauth
        <li class="nav-item mx-5 px-4">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-black" href="#" id="navbarDropdown02" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            menu
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown02">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      
      </ul>
      <div class="pe-5" style="margin-right:80px;">
      <form class="d-flex me-3 pe-3" style="margin-right:200px;">
      
        @guest
        <a href="{{ route('register') }}" class="btn text-light mx-2 btn-outline-info {{ request()->is('register')? 'active':'' }} fw-bold"> S'inscrire </a>
        <a href="{{ route('login') }}"  class="btn text-light btn-outline-primary {{ request()->is('login')? 'active':'' }} fw-bold"> Se connecter </a>
          
        @endguest
        @auth
        <a href="{{ route('logout') }}" data-bs-toggle="modal" data-bs-target="#exampleModal001" class="btn btn-outline-danger fw-bold"> Deconnexion </a>
        @endauth
      </form>
      </div>
    </div>
  </div>
</nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9"> <hr>
         @yield('content')
           </div>
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
