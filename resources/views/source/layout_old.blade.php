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

<!-- Modal je ne sais pas pourquoi mais les modals ont besoi de lien '?#'pour bien marcher . donc je vais dans la ou j'utilise et je fais ce lien <se connecter> et <deconnecter> -->
  

<!-- finModal --> 

   <!--header-->
   <!-- le premier barre delaissé 
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
        //permet juste de cacher le boutton si l'utilisateur n'est pas admin   
          @if(auth()->check() AND auth()->user()->role == 'admin')
        <li class="nav-item px-3">
          <a class="nav-link btn-outline-primary rounded-2 " href="{{ route('admin-users') }}"><i class="fa-solid fa-user-tie me-2"></i>Administrateur</a>
        </li>
        @endif
        <li class="nav-item px-3">
          <a class="nav-link btn-outline-primary rounded-2 {{request()->is('#1') ? 'active':''}}" href="#1">Presentation</a>
        </li>
       
        
        <li class="nav-item dropend px-3">
          <a class="nav-link btn-outline-primary rounded-2 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           Associations
          </a>
          <ul class="dropdown-menu dropdown-menu-dark fw-bold px-4 py-3" aria-labelledby="navbarDropdown">
            @foreach($associations as $association)
               <li><a class="dropdown-item py-2" href="{{ route('admin-asso.show',$association->id) }}">{{ $association->nom }} {{ $association->date }}</a></li>
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
        <a class="nav-link btn btn-outline-success {{request()->is('register') ? 'active':''}} fw-bold me-3 " aria-current="page" href="{{ route('register') }}"> <i class="fas fa-user fw-bold me-2"></i>s'inscrire</a> // sur les modal il y'a obligatoire un lien comme ça '?#' sinon sans ça il gènere un probleme //
        </li>
        
         <li class="nav-item">
         <a class="nav-link btn btn-outline-primary {{request()->is('login') ? 'active':''}} fw-bold me-3" aria-current="page" href="{{ route('login') }}"> <i class="fas fa-user-check fw-bold me-2"></i>se connecter</a>
        
        </li>
        </ul>
        @endguest

        @auth
         <ul class="togle navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
         
         <a class="nav-link active fs-4" aria-current="page" href="{{ route('home') }}">
          <i class="fas fa-door-open text-dark fs-2"></i>
         <img class="me-2" src="{{ asset('storage/'.auth()->user()->image) }}" alt="" style="border-radius:50%;height:70px; width:70px;">   
        </a>
        </li>
     
        </ul>
        @endauth
        
      </form>
    </div>
  </div>
</nav>
-->

<!-- 2eme barre --> 
<nav class="navbar navbar-expand-lg" style="background-color:rgb(3, 19, 73);">
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
          <a class="nav-link btn-outline-primary text-light fs-5 rounded-2 {{request()->is('/') ? 'active':''}} " aria-current="page" href="/">Acceuil</a>
        </li>
        <!-- permet juste de cacher le boutton si l'utilisateur n'est pas admin  --> 
          @if(auth()->check() AND auth()->user()->role == 'admin')
        <li class="nav-item px-5">
          <a class="nav-link text-light fs-5 btn-outline-primary rounded-2 " href="{{ route('admin-users') }}"><i class="fa-solid fa-user-tie me-2"></i>Administrateur</a>
        </li>
        @endif
        <li class="nav-item px-5">
          <a class="nav-link btn-outline-primary text-light fs-5 rounded-2 {{request()->is('#1') ? 'active':''}}" href="#1">Presentation</a>
        </li>
       
        
        <li class="nav-item dropend px-3">
          <a class="nav-link btn-outline-primary  text-light fs-5 rounded-2 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           Associations
          </a>
          <!-- dropdown-menu-dark si on veut un menu noire --> 
          <ul class="dropdown-menu  fw-bold px-4 py-3" aria-labelledby="navbarDropdown">
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
        <a class="nav-link btn btn-outline-success text-light {{request()->is('register') ? 'active':''}} fw-bold me-3 " aria-current="page" href="{{ route('register') }}"> <i class="fas fa-user text-light fw-bold me-2"></i>s'inscrire</a> <!-- sur les modal il y'a obligatoire un lien comme ça '?#' sinon sans ça il gènere un probleme -->
        </li>
        
         <li class="nav-item">
         <a class="nav-link text-light btn btn-outline-primary {{request()->is('login') ? 'active':''}} fw-bold me-3" aria-current="page" href="{{ route('login') }}"> <i class="fas fa-user-check fw-bold text-light me-2"></i>se connecter</a>
        
        </li>
        </ul>
        @endguest

        @auth
         <ul class="togle navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
         
         <a class="nav-link active fs-4" aria-current="page" href="{{ route('home') }}">
          <i class="fas fa-door-open text-light fs-2"></i>
         <img class="me-2" src="{{ asset('storage/'.auth()->user()->image) }}" alt="" style="border-radius:50%;height:70px; width:70px;">   
        </a>
        </li>
     
        </ul>
        @endauth
        
      </form>
    </div>
  </div>
</nav>
<!-- fin --> 
     <!-- ajouter quelque chose -->

      
         @yield('content')


   <!--  newsletter-->

     <div class="container-fluid" id="newsletter"> 
       <div class="row gap-2">
         <div class="col-md-4 my-3">  
             <h4 class="fw-bold">Rejoigner la Comunauté</h2> <hr class="w-25 " style="height:5px; color:var(--bleu--)">
             Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam, vitae eum. Voluptatum cupiditate mollitia corrupti quasi numquam? Ullam quibusdam temporibus dolorum iste, nam optio ipsum inventore dolores at cumque quidem! <br/>
             <div class="mt-3">
            <strong class="mt-3">
             <a href="" class="text-primary " style="text-decoration:none;">En savoir plus ....</a>
           </strong>
           </div>
            </div>
            <div class="col-md-4 my-3">
              <h4 class="fw-bold"><i class="fas fa-envelope  me-2"></i>Abonnez-vous au Newsletter</h2><hr class="w-50 " style="height:5px; color:var(--bleu--);">
             
              <form class="forms">
 
              <div class="mb-3">
    
              <label for="exampleInputEmail1" class="bg form-label">Addresse email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nom@gmail.com">
           </div>

          <button type="submit" class="btn btn-dark" style="color:var(--blanc--);">S'abonner</button>
           </form>
                

            </div>
            <div class="col-md-3 my-3">
           <h4 class="fw-bold">Nous suivre</h2> <hr class="w-50" style="height:5px;color:var(--bleu--);">
           <span class="fs-5">
           <i class="fab fa-facebook-square ms-3 me-2"></i><a href="" style="text-decoration:none; color:var(--noir--)">facebook.com </a> <br>
            <i class="fab fa-twitter ms-3 me-2"></i><a href="" style="text-decoration:none;color:var(--noir--)">Twitter.com</a> <br>
            <i class="fab fa-google-plus-g ms-3 me-2"></i><a href="" style="text-decoration:none;color:var(--noir--)">Google.com </a> <br>
            <i class="fab fa-linkedin-in ms-3 me-2"></i><a href="" style="text-decoration:none;color:var(--noir--)">Google.com </a> <br>
          </span>
          </div>
        
       </div>
     </div>    
     
     <!--  -->
           
     <!--Liens du footer-->

     <div class="liens container-fluid px-3">
       <div class="row">
         <div class="col-md-3 my-3">  
             <h4 class="fw-bold">Présentation</h2> <hr class="w-25 " style="height:5px;color: var(--bisque--);">
             Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam, vitae eum. Voluptatum cupiditate mollitia corrupti quasi numquam? Ullam quibusdam temporibus dolorum iste, nam optio ipsum inventore dolores at cumque quidem! <br/>
             <div class="mt-3">
            <strong class="mt-3">
             <a href="" class="text-primary " style="text-decoration:none;">En savoir plus ....</a>
           </strong>
           </div>
            </div>
            <div class="col-md-3 my-3">
              <h4 class="fw-bold">Liens</h2><hr class="w-25 " style="height:5px;color: var(--bisque--);">
             <i class="far fa-arrow-alt-circle-right me-2 mt-3"></i><a href="" style="text-decoration:none;color: var(--blanc--);">Acceuil </a> <br>

              <i class="far fa-arrow-alt-circle-right me-2 mt-3"></i><a href="" style="text-decoration:none;color: var(--blanc--);">Présentation </a> <br>

               <i class="far fa-arrow-alt-circle-right me-2 mt-3"></i><a href="" style="text-decoration:none;color: var(--blanc--);">Recherche </a> <br>

                <i class="far fa-arrow-alt-circle-right me-2 mt-3"></i><a href="" style="text-decoration:none;color: var(--blanc--);">Partenariats </a> <br>

                 <i class="far fa-arrow-alt-circle-right me-2 mt-3"></i><a href="" style="text-decoration:none;color: var(--blanc--);">Contact </a> <br>

                

            </div>
            <div class="col-md-3 my-3">


           <h4 class="fw-bold">Dernier acutalité</h2> <hr class="w-25 " style="height:5px;color:var(--bisque--)">

           <i class="far fa-arrow-alt-circle-right me-2 mt-3"></i><a href="" style="text-decoration:none; color: var(--blanc--);">Les Associations etudiants. </a> <br>

            <i class="far fa-arrow-alt-circle-right  me-2 mt-3"></i><a href="" style="text-decoration:none;color: var(--blanc--);">Consultez tout les Evenements </a> <br>

             <i class="far fa-arrow-alt-circle-right me-2 mt-3"></i><a href="" style="text-decoration:none;color: var(--blanc--);">Plus d'informations.... </a> <br>


          </div>
          <div class="col-md-3 my-3">
            <h4 class="fw-bold">Contactez-nous</h2> <hr class="w-25 " style="height:5px;color: var(--bisque--);">
           <i class="fas fa-home me-2"></i> Avenue de Sebta, Mhannech II
            <br/>93002 - Tétouan - Maroc  <br/>

           <i class="fas fa-phone-alt mt-3 me-2"></i> <a href="" style="text-decoration:none; color: var(--blanc--);"> (+212) 5 39 99 64 32 </a><br>
           <i class="fas fa-tty me-2 mt-3"></i><a href="" style="text-decoration:none;color: var(--blanc--);"> (+212) 5 39 99 45 00 </a> <br>
           <i class="fas fa-envelope mt-3 me-2"></i> <a href="" style="text-decoration:none;color: var(--blanc--);"> fs.tetouan.contact@gmail.com </a><br>
         </div>
       </div>
     </div>
     <!--liens-->

     <!--copyright-->
     <div class="container-fluid d-flex  justify-content-center align-items-center " style="background-color:var(--noir--); height:70px; color:var(--blanc--);">
     <div class="row">
       <div class="col-md-12">tous les droits réservés fs tetouan <a href="" style="text-decoration:none;color:var(--bisque--);" class="me-3 ms-1"> Copyright © 2022.</a> Courriel : <a href="" class="ms-1" style="text-decoration:none; color:var(--bisque--);"> fs.tetouan.contact@gmail.com </a> 
       &nbsp;&nbsp; <span class="border border-secondary me-2 bg-light"></span> <a href="" style="color:var(--bisque--);text-decoration:none;"> mention legale </a> &nbsp; &nbsp; 
       &nbsp;&nbsp; <span class="border border-secondary me-2 bg-light"></span> <a href="" style="color:var(--bisque--); text-decoration:none;"> politique de confidentialité </a> &nbsp; &nbsp;  <br/>
      </div>
     </div>  
     </div>
     <!-- -->
 

  <script src="{{asset('js/app.js')}}"></script>
</body>
</html>