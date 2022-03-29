
<div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop1Label" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdrop1Label">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<!-- le body du modal -->
 <div class="container">
<form class="row g-3 d-flex justify-content-center" method="POST" action="{{ route('login') }}">
    @csrf
    <div class="col-md-7">
    <label for="email" class="form-label">Email</label>
    <input type="email" name="email" value="{{ old('email') }}" required class="form-control @error('email') is-invalid @enderror" id="email" placeholder="saisir votre email">
     @error('email')
          <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
           </span>
     @enderror
  </div>

  <div class="col-md-7">
    <label for="password" class="form-label">Mot de passe</label>
    <input type="password" name="password" value="{{ old('password') }}" required class="form-control @error('password') is-invalid @enderror"  id="password" placeholder="saisir votre mot de passe">
     @error('password')
          <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
           </span>
     @enderror
  </div>
   
   <div class="col-md-6 pt-5">
      <button type="submit" class="btn d-inline me-2  btn-primary">
                                    {{ __('Se connecter') }}
                                </button>
                               

                                @if (Route::has('password.request')) <!-- # = password.request --> 
                                    <a class="btn btn-link " href="#">
                                        {{ __('Mot de passe oublié ?') }}
                                    </a>
                                @endif
                    <button class="btn d-inline  btn-danger" data-bs-dismiss="modal">Annuler</button>
   </div>
</form>
 </div>
 <!-- fin de body --> 
 </div>
     
  </div>
</div>
</div>




