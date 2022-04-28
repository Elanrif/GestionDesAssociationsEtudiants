@extends('admin.home')
@section('admin')

<div class="container-fluid">
    
<div class="" id="staticBackdrop11"  data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel11" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="staticBackdropLabel11"> <i class="fa-solid fa-circle-info text-info me-2"></i>Information Personnelle </h5>
        <button type="button"  data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body fw-bold ">
        <ul class="nav ps-5" style="display:block;">
            <div class="row">
                <div class="col">
              <li> 
              <div class="d-inline text-success">Nom</div>
              <div class="shadow-sm p-3 mb-4 bg-body rounded w-75">{{ auth()->user()->nom }}</div>
            </li>
             <li>
                 <div class="d-inline text-success">E-mail</div>
              <div class="shadow-sm p-3 mb-4 bg-body rounded w-75">{{ auth()->user()->email }}</div>
            </li>
                    <li>
                         <div class="d-inline text-success">Code Etudiant</div>
              <div class="shadow-sm p-3 mb-4 bg-body rounded w-75">{{ auth()->user()->code_apogée }}</div>
            </li>
               <li>
                         <div class="d-inline text-success">Role</div>
              <div class="shadow-sm p-3 mb-4 bg-body rounded w-75">{{ auth()->user()->role }}</div>
            </li>
                </div>
        <!-- deuxième partie --> 
                <div class="col">
                     <li>
                 <div class="d-inline text-success">Prenom</div>
              <div class="shadow-sm p-3 mb-4 bg-body rounded w-75">{{ auth()->user()->prenom }}</div>
            </li>
             <li>
                <div class="d-inline text-primary text-success">Mot de passe</div>
              <div class="shadow-sm p-3 mb-4 bg-body  rounded w-75">{{ auth()->user()->password }}</div>
            </li>
               
             <li>
                 <div class="d-inline text-success">Filière</div>
              <div class="shadow-sm p-3 mb-4 bg-body rounded w-75">{{ auth()->user()->filiere }}</div>
            </li>

             <li>
                 <div class="d-inline text-success">Numero Tel</div>
              <div class="shadow-sm p-3 mb-4 bg-body rounded w-75">{{ auth()->user()->num_tel }}</div>
            </li>
                </div>
            </div>
           
            
            
        </ul>
      </div>
  
    </div>
  </div>
</div>

 
</div>
    @endsection