
@extends('user_layouts.general')

@section('general')

   
<div class="container">
   <!-- pour mot de passe erreur --> 
    @if ($message = Session::get('erreur'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
   <span class="fw-bold">{{ $message }}</span><strong class="fs-5"> <i class="fa-solid fa-face-grin-wide" style="color:rgb(255, 0, 157);"></i> </strong>.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>
    @endif

    <!-- pour mot de passe valider--> 
    @if ($message = Session::get('success'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
   <span class="fw-bold">{{ $message }}</span><strong class="fs-5"> <i class="fa-solid fa-face-grin-wide" style="color:rgb(255, 0, 157);"></i> </strong>.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>
    @endif
<form class="row g-3 gx-5 " method="POST" action="{{ route('register.password')}}">
    @csrf
    @method('PUT')


  <div class="col-md-12 py-3">
    <label for="password" class="form-label fw-bold"> <span class="text-danger me-1">*</span>Ancien mot de passe</label>
    <input type="password" name="password"   class="form-control @error('password') is-invalid @enderror"  id="password">
     @error('password')
          <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
           </span>
     @enderror
  </div>
    <div class="col-md-12 mt-5">
    <label for="confirmation" class="form-label fw-bold"> <span class="text-danger me-1">*</span>nouveau mot de passe</label>
    <input type="password"  name="nouveau"  class="form-control @error('nouveau') is-invalid @enderror" id="confirmation" placeholder="minimum 8 characters">
     @error('nouveau')
          <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
           </span>
     @enderror
  </div>
    <div class="col-md-12 mb-5 py-4">
      
                  <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop001" class="btn me-2 fw-bold" style="background-color:rgb(194, 28, 114);color:var(--blanc--)"> valider  </button>
                
   </div>
   <!-- Button trigger modal -->


<!-- Modal 001 data-bs-backdrop="static" :pour ne pas permettre de faire disparaitre n'importe ou on clique il suffit juste de le supprimer le data-bs-backdrop !  --> 
<div class="modal fade" id="staticBackdrop001"  data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel001" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="staticBackdropLabel001"> <i class="fas fa-exclamation-triangle me-2 text-danger"></i> Modifier </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body fw-bold d-flex justify-content-center">
         Êtes-vous sûr de <span class="text-primary fw-bold ">&nbsp; valider les Modifications </span> &nbsp; ? 
      </div>
      <div class="modal-footer" style="margin-right:150px;">
       <a href="{{ route('home') }}" class="nav-link"> <button type="submit" class="btn  d-inline px-4 btn-info" data-bs-dismiss="modal"> Oui </button> </a>
        <button type="button" class="btn d-inline px-4  btn-danger" data-bs-dismiss="modal">Non</button>
      </div>
    </div>
  </div>
</div>
<!-- --> 
</form>


    </div>
     

@endsection