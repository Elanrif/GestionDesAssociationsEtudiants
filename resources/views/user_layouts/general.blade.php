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
    
 
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> <!-- d'abord le lien de bootstrap après mes liens css --> 

    <link rel="stylesheet" href="{{asset('css/component.css')}}">
    <!-- Styles -->
</head>
<body>
 

@include('source.inluder')

 <div style="height:13vh;"></div>

 <div class="container-fluid d-flex justify-content-center">
    <div style="width:90vh;min-height:40vh;margin-top:30px;">
        <img class="pe-2 d-iline" src="{{ asset('storage/'.auth()->user()->image) }}" alt="" style="border-radius:50%;height:100px; width:100px;">
        <span class="fw-bold fs-4"> {{ auth()->user()->nom }}</span> <a  href="{{ route('home') }}"> <span class="fw-bold fs-5 ms-3 border btn text-light" style="background-color:rgb(246, 21, 160);">Mon compte</span></a>
        <div class="text-muted fw-bold" style="margin-left:90px;">Mettez à jour votre nom d'utilisateur et gérez votre compte</div>

        <div class="row" style="margin-top:7vh;">
            <div class="col-12 col-md-4 general">
                <ul class="nav  flex-column">
                   
         <!-- pour cursor au début c'était : lien-general  --> <!--lien-active --> 
                  <a class="nav-link fw-bold my-2 nav-lien  {{request()->is('home/general') ? 'nav-liens':''}}" href="{{ route('home.edit') }}">Génerale</a>

                    <a class="nav-link fw-bold my-2 nav-lien {{request()->is('home/editer') ? 'nav-liens':''}} " href="{{ route('home.general') }}">Editer</a>
                 
                    <a class="nav-link fw-bold my-2 nav-lien {{request()->is('home/password') ? 'nav-liens':''}} " href="{{ route('home.password') }}">Mot de passe</a>
                    <div style="height:15vh;"></div>
                    <hr>
                    
                    <a class="nav-link fw-bold text-danger lien-general {{request()->is('home/show/delete') ? 'lien-active':''}}" href="{{ route('showdelete') }}">Supprimer<span class="text-light">_</span>compte
                    </a>
                </ul>
            </div>
            <div class="col">
              
               @yield('general')

            </div>
        </div>
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
}, 7000);
 
});
</script>
<!-- fin --> 
</body>
</html>