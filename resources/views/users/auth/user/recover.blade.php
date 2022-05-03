@extends('source.layout')
@section('content')

<form action="{{ route('recover.myaccount') }}" method = "post">

    @csrf
<!-- la hauteur doit etre dans la balise d-flex --> 
<div class="d-flex justify-content-center align-items-center mt-5" style="background-color:rgb(187, 186, 186);min-height:70vh;" >
    <div style="max-width:100vh;background-color:white" >

          

        
        <div class="card border-light mb-3" style="max-width: 38rem;min-height:18rem;">
   <div class="card-header fw-bold fs-4">Retrouvez votre compte</div>
    <div class="card-body">

          <!-- pour s'être connecter --> 
    @if ($message = Session::get('error'))
        <div class="alert alert-danger fs-5 alert-dismissible fade show" role="alert">
   <span class="fw-bold">{{ $message }}</span><strong class="fs-5"> <i class="fa-solid fa-face-grin-wide" style="color:rgb(255, 0, 157);"></i> </strong>.
   <p>Votre recherche ne donne aucun résultat. Veuillez réessayer avec d’autres informations.</p>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>
    @endif

    <h5 class="card-title fw-bold">Veuillez entrer votre adresse e-mail et votre numéro de mobile pour rechercher votre compte.</h5>
    <p class="card-text mt-5">
        <label for="email" class="fw-bold"> <span class="text-danger fw-bold">*  </span> Email</label>
        <input type="email" name="email" id="email" class="form-control p-3 mb-3 fw-bold" placeholder="saisir votre adresse email">

        <label for="num" class="fw-bold"><span class="text-danger mt-4 fw-bold">* </span> numéro</label>
        <input type="number" name="num_tel" id="num" class="form-control p-3 fw-bold" placeholder="saisir votre numero de Télephone">
    </p>
    </div>
    <hr>
    <div class="footer mt-2">
        <div class="d-flex justify-content-end me-3">
           <a class="nav-link" href="{{ route('login') }}"> <button type="button" class="btn btn-secondary fw-bold me-1">Annuler</button> </a>
           <a class="nav-link" href="#"> <button type="submit" class="btn btn-primary fw-bold me-1">Envoyer</button> </a>

         
        </div>
    </div>
   </div>

    </div>
</div>

</form>
@endsection