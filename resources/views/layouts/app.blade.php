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
  

  <nav class="index2 navbar navbar-expand-lg navbar-light bg-light" style="height:100px;">
  <div class="container-fluid fs-4">
    <a class="navbar-brand ps-5" href="/">
    <img src="{{asset('images/Logo_0008_Universite-AS.png') }}" class="img-fluid" alt="don't exist" style="height:80px; width:100px; border-radius:70px;">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse bg-light Z-index-3 ps-3" id="navbarSupportedContent">
      <ul class="index navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item px-3">
          <a class="nav-link btn-outline-primary rounded-2 {{request()->is('/') ? 'active':''}} " aria-current="page" href="/">Acceuil</a>
        </li>
        <!-- permet juste de cacher le boutton si l'utilisateur n'est pas admin  --> 
          @if(auth()->check() AND auth()->user()->role == 'admin')
        <li class="nav-item px-3">
          <a class="nav-link btn-outline-primary rounded-2 " href="#"><i class="fa-solid fa-user-tie me-2"></i>Administrateur</a>
        </li>
        @endif
        <li class="nav-item px-3">
          <a class="nav-link btn-outline-primary rounded-2 {{request()->is('#1') ? 'active':''}}" href="#1">Presentation</a>
        </li>
       

        <li class="nav-item dropdown px-3">
          <a class="nav-link btn-outline-primary rounded-2 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           Associations
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
           
            <li><a class="dropdown-item" href="#">RIEN</a></li>
           
          </ul>
        </li>
       
      </ul>

  
      <form class="d-flex me-5 pe-5">
        @guest
        <ul class="togle navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
         <button class="btn btn-outline-success {{request()->is('register') ? 'active':''}} fw-bold me-3 "><a class="nav-link active " aria-current="page" href="{{ route('register') }}"><i class="fas fa-user fw-bold me-2"></i>s'inscrire</a></button> <!-- sur les modal il y'a obligatoire un lien comme ça '?#' sinon sans ça il gènere un probleme -->
        </li>
        
         <li class="nav-item">
          <button class="btn btn-outline-primary  {{request()->is('login') ? 'active':''}} fw-bold me-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop1"> <a class="nav-link active" aria-current="page" href="{{ route('login') }}"><i class="fas fa-user-check fw-bold me-2"></i>se connecter</a></button>
        </li>

        </ul>
        @endif

        @auth
         <ul class="togle navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
         <button class="btn btn-outline-danger me-3"><a class="nav-link active " aria-current="page" href="{{ route('logout') }}"> <i class="fa-solid fa-user-shield me-2"></i>Deconnexion</a></button>
        </li>
     
        </ul>
        @endif
        
      </form>
    </div>
  </div>
</nav>
        <main class="py-0">
          
                @yield('content')
   
        </main>
    </div>
     
</body>
</html>
