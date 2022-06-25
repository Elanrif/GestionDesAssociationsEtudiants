@extends('source.layout')
@section('content')

<div class="container d-flex justify-content-center align-items-center mt-5" >
  <div style="max-width:600px;">
     <!-- pour s'être déconnecter --> 
    @if ($message = Session::get('logouts'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
   <span class="fw-bold">{{ $message }}</span><strong class="fs-5"> <i class="fa-solid fa-face-grin-wide" style="color:rgb(255, 0, 157);"></i> </strong>.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>
    @endif
  </div>
</div>

    
<!-- le body du modal -->
 <div class="container" style="min-height:60vh;padding-top:15px;">
<form class="row g-3 d-flex justify-content-center mx-5 mt-5" method="post" action="{{ route('storeadmin') }}">
    @csrf

    <div class="col-md-7">
          <div class="text-center">
            <p><img class="pe-2 " src="{{ asset('storage/users-image/admin.jpg') }}" alt="" style="border-radius:50%;height:88px; width:88px;"></p>
            <h3 class="fw-bold">ADMINISTRATEUR</h3>
          </div>
  </div>

      
    <div class="col-md-7">
    <label for="email" class="form-label fw-bold">Email</label>
    <input type="email" name="email" value="{{ old('email') }}" required class="form-control @error('email') is-invalid @enderror" id="email" placeholder="saisir votre email">
      @if ($message = Session::get('danger'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong class="fs-5">Oupps !</strong> <span class="fw-bold">{{ $message }}</span>.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>
        @elseif($message =  Session::get('utilisateur'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong class="fs-5">Oupps !</strong> <span class="fw-bold">{{ $message }}</span>.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
       
    @endif
  
     @error('email')
          <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
           </span>
     @enderror
  </div>

  <div class="col-md-7">
    <label for="password" class="form-label fw-bold">Mot de passe</label>
    <input type="password" name="password" value="{{ old('password') }}" required class="form-control @error('password') is-invalid @enderror"  id="password" placeholder="saisir votre mot de passe">
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
                        
                    <button type="button" class="btn d-inline ms-2 btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop1" type="reset">Rénitialiser</button> <br>

                    <!-- # = password.request --> 
                                    <a class="nav-link mt-2 " href="{{ route('recover.account') }}">
                                       Mot de passe oublié ?
                                    </a> <br>
   </div>
   <!-- Modal -->
<div class="modal fade" id="staticBackdrop1"  data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
        <button type="reset" class="btn btn-info px-3" onclick="history.go(0)" data-bs-dismiss="modal">Oui</button>
        <button type="button" class="btn btn-danger px-3"  data-bs-dismiss="modal">Non</button>
      </div>
    </div>
  </div>
</div>
</form>
 </div>
@endsection




