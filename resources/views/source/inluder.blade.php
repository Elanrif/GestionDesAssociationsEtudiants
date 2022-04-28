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
        <li class="nav-item">
         
         <a class="nav-link nav-lien fw-bold fs-4 {{request()->is('home*') ? 'nav-liens':''}} " aria-current="page"  href="{{ route('home') }}">
         
         <img class="me-2" src="{{ asset('storage/'.auth()->user()->image) }}" alt="" style="border-radius:50%;height:40px; width:40px;">   Mon compte
        </a>
        </li>

        @if(request()->is('home'))
         <li class="nav-item">
        <a href="{{ route('logout') }}" data-bs-toggle="modal" data-bs-target="#exampleModal001" class="btn nav-lien fw-bold"> Deconnexion </a>
        </li>
       @endif
     
        </ul>
        @endauth
        
      </form>
    </div>
  </div>
</nav>
