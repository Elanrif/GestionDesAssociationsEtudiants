@extends("../../admin/home")
@section('admin')


<div class="container">
<form class="row g-3 gx-5 mx-5 mt-5" method="POST" action="{{ route('admin-users.update',$user->id) }}">
    @csrf
    @method('PUT')
   <p class="fs-3"><i class="fas fa-user-edit text-primary fs-4 me-2"></i> Modification</p>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label fw-bold">Nom</label>
    <input type="text" name="nom" value="{{$user->nom }}" required class="form-control border  @error('nom') is-invalid @enderror"  id="inputEmail4" placeholder="saisir votre nom">
     @error('nom')
          <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
           </span>
     @enderror
  </div>
    <div class="col-md-6">
    <label for="inputEmail42" class="form-label fw-bold">Prenom</label>
    <input type="text" name="prenom" value="{{$user->prenom}}" required class="form-control @error('prenom') is-invalid @enderror" id="inputEmail42" placeholder="saisir votre Prenom">
     @error('prenom')
          <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
           </span>
     @enderror
  </div>

  <div class="col-md-6">
    <label for="inputEmail14" class="form-label fw-bold">Code Etudiant</label>
    <input type="number" name="code_apogée" value="{{ $user->code_apogée}}" required class="form-control @error('code_apogée') is-invalid @enderror"  id="inputEmail14" placeholder="saisir votre code apogée">
     @error('code_apogée')
          <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
           </span>
     @enderror
  </div>
    <div class="col-md-6">
    <label for="num_tel" class="form-label fw-bold">Tel</label>
  <!-- j'ai ajouté un zéro dans value '0' car par défaut le zéro n'etait pas sauvegardé -->
    <input type="number" name="num_tel" value="0{{$user->num_tel}}" required class="form-control @error('num_tel') is-invalid @enderror" id="num_tel" placeholder="saisir votre Numéro">
     @error('num_tel')
          <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
           </span>
     @enderror
  </div>

  <div class="col-md-6">
    <label for="inputEmaiel4" class="form-label fw-bold">Filière</label>
    <select id="inputEmaiel4" type="filiere" class="form-select @error('filiere') is-invalid @enderror" name="filiere" value="{{ old('filiere') }}" required autocomplete="filiere">
                               <option selected><span class="btn disabled">{{$user->filiere }}</span></option>
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
          <span class="invalid-feedback " role="alert">
                    <strong>{{ $message }}</strong>
           </span>
     @enderror
  </div>
 
    <div class="col-md-6">
    <label for="email" class="form-label fw-bold">Email</label>
    <input type="email" name="email" value="{{$user->email }}" required class="form-control @error('email') is-invalid @enderror" id="email" placeholder="saisir votre email">
     @error('email')
          <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
           </span>
     @enderror
  </div>

  <div class="col-md-6">
    <label for="password" class="form-label fw-bold">Mot de passe</label>
    <input type="password" name="password" value="{{$user->password }}" required class="form-control @error('password') is-invalid @enderror"  id="password" placeholder="saisir votre nom">
     @error('password')
          <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
           </span>
     @enderror
  </div>
    <div class="col-md-6">
    <label for="confirmation" class="form-label fw-bold">confirmation</label>
    <input type="password" value="{{ $user->password }}" name="password_confirmation" required class="form-control @error('password_confirmation') is-invalid @enderror" id="confirmation" placeholder="confimer le mot de passe">
    
  </div>
   <div class="col-md-6">
      
                  <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop001" class="btn me-2" style="background-color:var(--bleu--);color:var(--blanc--)"> Modifier  </button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop02">Annuler</button>
   </div>
   <!-- Button trigger modal -->


<!-- Modal02 -->
<div class="modal fade" id="staticBackdrop02"  data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel02" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="staticBackdropLabel02"> <i class="fas fa-exclamation-triangle me-2 text-danger"></i> Abandonner les modifications</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body fw-bold d-flex justify-content-center">
         voulez-vous vraiment revenir a la <span class="text-primary fw-bold ">&nbsp; page préçedente </span> &nbsp;  ? 
      </div>
      <div class="modal-footer" style="margin-right:150px;">
       <a href="{{ route('admin-users') }}"> <button type="button" class="btn d-inline px-4 btn-info" data-bs-dismiss="modal"> Oui </button> </a>
        <button type="button" class="btn d-inline px-4  btn-danger" data-bs-dismiss="modal">Non</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal 001 data-bs-backdrop="static" :pour ne pas permettre de faire disparaitre n'importe ou on clique il suffit juste de le supprimer le data-bs-backdrop !  --> 
<div class="modal fade" id="staticBackdrop001"  data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel001" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="staticBackdropLabel001"> <i class="fas fa-exclamation-triangle me-2 text-danger"></i> Modifier </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body fw-bold d-flex justify-content-center">
         Êtes-vous sûr de <span class="text-primary fw-bold ">&nbsp; vouloir Modifier vos informations ! </span> &nbsp; ? 
      </div>
      <div class="modal-footer" style="margin-right:150px;">
       <a href="{{ route('home') }}"> <button type="submit" class="btn d-inline px-4 btn-info" data-bs-dismiss="modal"> Oui </button> </a>
        <button type="button" class="btn d-inline px-4  btn-danger" data-bs-dismiss="modal">Non</button>
      </div>
    </div>
  </div>
</div>
<!-- -- > 
</form>


    </div>
     

@endsection



