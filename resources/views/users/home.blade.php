
@extends('layouts.app')

@section('content')
<div class="mt-5">
    <div class="row g-4">
    <div class="col-8 pt-3 col-lg-3 me-3">
<img class="me-2" src="{{ asset('images/assurance_association_sportive.jpg') }}" alt="" style="border-radius:50%;height:250px; width:250px;">
</div>
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
