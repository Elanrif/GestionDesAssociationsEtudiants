
@extends('layouts.app')

@section('content')
<div class="mt-5">

<!-- Modal pour la photo -->
<div class="modal fade" id="xampleModal" tabindex="-1" aria-labelledby="xampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-black text-light">
      <div class="modal-header">
        <h5 class="modal-title  fs-5" id="xampleModalLabel"> Mettre à jour votre photo ! </h5>
        <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
  <form action="{{ route('users-image.store') }}" method="post" enctype="multipart/form-data"> <!-- pour envoyer la photo --> 
    @csrf 
    
    <div class="modal-body">
        <div class="mb-3">
          <input class="form-control" type="file" id="formFile" name="image" required> <!-- le photo --> 
        </div>
      </div>  
   
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Modifier</button>
      </div>
   </form>
    </div>
  </div>
</div>



  
  <!-- pour s'être connecter --> 
    @if ($message = Session::get('login'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
   <span class="fw-bold">{{ $message }}</span><strong class="fs-5"> <i class="fa-solid fa-face-grin-wide" style="color:rgb(255, 0, 157);"></i> </strong>.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>
    @endif

   
      <!-- pour l'image  --> 
    @if ($message = Session::get('image'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
   <span class="fw-bold">{{ $message }}</span><strong class="fs-5"> <i class="fa-solid fa-face-grin-wide" style="color:rgb(255, 0, 157);"></i> </strong>.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>
    @endif

    <!-- pour La création du compte --> 
    @if ($message = Session::get('register'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
   <span class="fw-bold">{{ $message }}</span><strong class="fs-5"> <i class="fa-solid fa-face-grin-wide" style="color:rgb(255, 0, 157);"></i> </strong>.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>
    @endif
  <!-- pour la modification --> 
   @if ($message = Session::get('update'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
   <span class="fw-bold">{{ $message }}</span><strong class="fs-5"> <i class="fa-solid fa-face-grin-wide" style="color:rgb(255, 0, 157);"></i> </strong>.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>
    @endif
    <div class="row g-4"> <!-- button xample pour la photo --> 
    <a class="w-25" data-bs-toggle="modal" data-bs-target="#xampleModal" href="#">  
    <div class="col-8 pt-3 col-lg-3 me-3">
      <div class="mb-3">
  <i class="inoc fa-solid fa-camera-retro fs-3 position-fixed d-inline"></i> <!-- icons de la photo -->
</div>
<img class="pe-2 d-iline" src="{{ asset('storage/'.auth()->user()->image) }}" alt="" style="border-radius:50%;height:250px; width:250px;">
</div>
</a>
<div class="col ms-3 d-flex  align-items-center pt-1 ps-5 fs-5"> 
    <h3> {{ auth()->user()->nom }}   {{ auth()->user()->prenom }} &nbsp;&nbsp; <button class="btn btn-outline-primary fw-bold" data-bs-toggle="modal" data-bs-target="#staticBackdrop11"> <i class="fa-solid fa-lock"></i> &nbsp;Confidentialité</button></h3>
    </div>

</div>
</div>
<hr>
<div class="row"> 
    <div class="col"><i class="far fs-4 text-primary fa-comments"></i> Poster un commentaire</div>
    <div class="col"><a href="{{ route('register.edit',auth()->user()->id) }}"> <i class="fas fa-user-edit fs-4 text-primary"></i> Modifier les informations</a></div>
    <div class="col"><i class="far fs-4 text-primary fa-comments"></i> Poster un commentaire</div>
</div>


<!-- Modal02 -->
<div class="modal fade" id="staticBackdrop11"  data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel11" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="staticBackdropLabel11"> <i class="fa-solid fa-circle-info text-info me-2"></i>Information Personnelle </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body fw-bold ">
        <ul class="nav ps-5" style="display:block;">
            <div class="row">
                <div class="col">
              <li> 
              <div class="d-inline">Nom</div>
              <div class="shadow-sm p-3 mb-5 bg-body rounded w-75">{{ auth()->user()->nom }}</div>
            </li>
             <li>
                 <div class="d-inline">E-mail</div>
              <div class="shadow-sm p-3 mb-5 bg-body rounded w-75">{{ auth()->user()->email }}</div>
            </li>
                    <li>
                         <div class="d-inline">Code Etudiant</div>
              <div class="shadow-sm p-3 mb-5 bg-body rounded w-75">{{ auth()->user()->code_apogée }}</div>
            </li>
               <li>
                         <div class="d-inline">Role</div>
              <div class="shadow-sm p-3 mb-5 bg-body rounded w-75">{{ auth()->user()->role }}</div>
            </li>
                </div>
        <!-- deuxième partie --> 
                <div class="col">
                     <li>
                 <div class="d-inline">Prenom</div>
              <div class="shadow-sm p-3 mb-5 bg-body rounded w-75">{{ auth()->user()->prenom }}</div>
            </li>
             <li>
                <div class="d-inline text-primary">Mot de passe</div>
              <div class="shadow-sm p-3 mb-5 bg-body  rounded w-75">{{ auth()->user()->password }}</div>
            </li>
               
             <li>
                 <div class="d-inline">Filière</div>
              <div class="shadow-sm p-3 mb-5 bg-body rounded w-75">{{ auth()->user()->filiere }}</div>
            </li>

             <li>
                 <div class="d-inline">Numero Tel</div>
              <div class="shadow-sm p-3 mb-5 bg-body rounded w-75">{{ auth()->user()->num_tel }}</div>
            </li>
                </div>
            </div>
           
            
            
        </ul>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <div><a class="nav link btn btn-danger" style="text-decoration:none;" href="{{ route('register.edit',auth()->user()->id) }}"> <i class="fas fa-user-edit fs-4 me-2"></i> Modifier</a></div>
        <button type="button" class="btn d-inline px-4  btn-secondary" data-bs-dismiss="modal">Fermer</button>
        
      </div>
    </div>
  </div>
</div>



@endsection
