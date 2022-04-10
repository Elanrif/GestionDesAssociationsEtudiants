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

    <link rel="stylesheet" href="{{asset('css/component.css')}}">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

 <!-- pour désactiver le modal seulement supprimer la class modal du parent . car c'est elle qui ouvre tout les modals --> 

<div  tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollbar modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title shadow p-3" id="exampleModalLabel">Crée le : <span class="fw-bold"> {{ $association->date }} </span></h5> 
       
      </div>
      <div class="modal-body"> <!-- ajout de card -->
        <div class="card shadow-lg" style="width: auto;">
          <img src="{{ asset('storage/'.$association->image) }}" class="card-img-top" alt="..." style="background-image:center/cover no-repeat">
          <div class="card-body">
            <h5 class="card-title text-primary"> <span class="fw-bold text-dark">Association</span> : {{ $association->nom }}</h5> 
            <h6 class="card-text"><span class="fw-bold"> description :  </span> <span class="pt-3">{{ $association->description }}</span>  </h6> 
            <h6 class="fw-bold">Date : <span class="shadow-lg text-primary"> {{ $association->date }}</span></h6>
           
          </div>
       </div>
       <hr>
       <div class="card shadow-lg" style="width:auto;">

        <div class="text-center p-3 shadow fw-bold w-25 mb-3">Membre du Bureau</div>
         <div class="row gy-3 row-cols-1 row-cols-md-3 p-3">
           <div class="col">
             <h5 class="text-primary fw-bold">Président</h5>
             Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto iste ullam deserunt, id fugiat blanditiis repudiandae facere ut mollitia esse!
           </div>
           <div class="col"> <h5 class="text-primary fw-bold">Trésorier</h5>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellat, repellendus?</div>
           <div class="col"><h5 class = " text-primary fw-bold">Secrétaire</h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet culpa fuga sapiente.</div>
           
         </div>
       </div>

      </div>
      <div class="modal-footer d-flex justify-content-center ">
        <!-- je vais faire des conditions pour rediriger la personne selon si simple user ou admin ou bien simple visiteur -->

        @auth <!-- personne est connécté-->
          @if(auth()->user()->role == 'admin') <!-- si c'est l'admin --> 
          <a href="{{ route('admin-asso.index') }}"> <button type="button" class="btn btn-danger justify-content-start" data-bs-dismiss="modal">Retour</button>
        </a>
         @else  <!-- si un simple user --> 

         <a href="{{ route('admin-asso.index') }}"> <button type="button" class="btn btn-danger justify-content-start" data-bs-dismiss="modal">Retourauth</button>
        </a>
        @endif
        @endauth

        @guest <!-- visiteur ; je vais le rediriger sur la création d'un compte  --> 
          <a href="{{ route('register') }}"> <button type="button" class="btn btn-primary justify-content-start" data-bs-dismiss="modal">suivre</button>
        </a>
        @endguest
       
      </div>
    </div>
  </div>
</div>



<!-- fin -->
</body>
</html>
