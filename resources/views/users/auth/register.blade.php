
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<!-- le body du modal -->

<div class="container">
<form class="row g-3" method="POST" action="{{ route('register') }}">
    @csrf
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Nom</label>
    <input type="text" name="nom" value="{{ old('nom') }}" required class="form-control @error('nom') is-invalid @enderror"  id="inputEmail4" placeholder="saisir votre nom">
     @error('nom')
          <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
           </span>
     @enderror
  </div>
    <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Prenom</label>
    <input type="text" name="prenom" value="{{ old('prenom') }}" required class="form-control @error('prenom') is-invalid @enderror" id="inputEmail4" placeholder="saisir votre Prenom">
     @error('prenom')
          <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
           </span>
     @enderror
  </div>

  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Code Etudiant</label>
    <input type="number" name="code_apogée" value="{{ old('code_apogée') }}" required class="form-control @error('code_apogée') is-invalid @enderror"  id="inputEmail4" placeholder="saisir votre code apogée">
     @error('code_apogée')
          <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
           </span>
     @enderror
  </div>
    <div class="col-md-6">
    <label for="num_tel" class="form-label">Tel</label>
    <input type="number" name="num_tel" value="{{ old('num_tel') }}" required class="form-control @error('num_tel') is-invalid @enderror" id="num_tel" placeholder="saisir votre Numéro">
     @error('num_tel')
          <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
           </span>
     @enderror
  </div>

  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Filière</label>
    <select id="filiere" type="filiere" class="form-select @error('filiere') is-invalid @enderror" name="filiere" value="{{ old('filiere') }}" required autocomplete="filiere">
                               <option selected><span class="btn disabled">sélectionner la filiere</span></option>
                               <option value="SMAI">SMAI</option>
                               <option value="SVT">SVT</option>
                               <option value="SMPC">SMPC</option>   
                               <option value="SMA">SMA</option>   
                               <option value="SMI">SMI</option>   
                               <option value="SVI">SVI</option>   
                               <option value="STU">STU</option>   
                               <option value="SMP">SMP</option>   
                               <option value="SMC">SMC</option>   
                            </select>
     @error('filiere')
          <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
           </span>
     @enderror
  </div>
 
    <div class="col-md-6">
    <label for="email" class="form-label">Email</label>
    <input type="email" name="email" value="{{ old('email') }}" required class="form-control @error('email') is-invalid @enderror" id="email" placeholder="saisir votre email">
     @error('email')
          <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
           </span>
     @enderror
  </div>

  <div class="col-md-6">
    <label for="password" class="form-label">Mot de passe</label>
    <input type="password" name="password" value="{{ old('password') }}" required class="form-control @error('password') is-invalid @enderror"  id="password" placeholder="saisir votre nom">
     @error('password')
          <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
           </span>
     @enderror
  </div>
    <div class="col-md-6">
    <label for="confirmation" class="form-label">confirmation</label>
    <input type="password" name="password_confirmation" required class="form-control @error('password_confirmation') is-invalid @enderror" id="confirmation" placeholder="confimer le mot de passe">
    
  </div>
   <div class="col-md-6">
      
                  <button type="submit" class="btn fs-5" style="background-color:var(--bleu--);color:var(--blanc--)">
                                    {{ __('S\'inscrire') }}
                    </button>
                    <button class="btn fs-5 btn-danger" data-bs-dismiss="modal">Annuler</button>
   </div>
</form>
 </div>
 <!-- fin de body --> 
 </div>
     
  </div>
</div>
</div>



