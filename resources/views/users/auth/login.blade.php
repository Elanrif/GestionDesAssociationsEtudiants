@extends('layouts.app')

@section('content')

<!-- le body du modal -->
 <div class="container">
<form class="row g-3 d-flex justify-content-center mx-5 mt-5" method="post" action="{{ route('login') }}">
    @csrf
    <div class="col-md-7">
    <label for="email" class="form-label fw-bold">Email</label>
    <input type="email" name="email" value="{{ old('email') }}" required class="form-control @error('email') is-invalid @enderror" id="email" placeholder="saisir votre email">
     @error('email')
          <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
           </span>
     @enderror
  </div>

  <div class="col-md-7">
    <label for="password" class="form-label fw-bold">Mot de passe</label>
    <input type="password" name="password" value="{{ old('password') }}" required class="form-control @error('password') is-invalid @enderror"  id="password" placeholder="saisir votre mot de passe">
     @error('password')
          <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
           </span>
     @enderror
  </div>
  
  <div class="col-md-7 me-2">
              
           <div class="form-check">
                 <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label fs-5" for="remember">
                            {{ __('Se rappeler de moi ') }}
                    </label>
           </div>
    
  </div>
   
   <div class="col-md-7 py-2">

      <button type="submit" class="btn d-inline me-2  btn-primary">
                                    {{ __('Se connecter') }}
                                </button>
                        
                    <button type="button" class="btn d-inline ms-2 btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop1" type="reset">Annuler</button> <br>

                    <!-- # = password.request --> 
                                    <a class="btn btn-link mt-2 " href="#">
                                        {{ __('Mot de passe oublié ?') }}
                                    </a> <br>
   </div>
   <!-- Modal -->
<div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="staticBackdropLabel"> <i class="fas fa-exclamation-triangle me-2 text-danger"></i> Attention</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body fw-bold">
       Êtes-vous sur de Rénitialiser tout les champs déjà rempli ! 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Non</button>
        <button type="reset" class="btn btn-info" data-bs-dismiss="modal">Oui</button>
      </div>
    </div>
  </div>
</div>
</form>
 </div>
@endsection




