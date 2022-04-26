@extends('user_layouts.general')

@section('general')

   
<div class="container">

   
      <!-- pour l'image  --> 
    @if ($message = Session::get('image'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
   <span class="fw-bold">{{ $message }}</span><strong class="fs-5"> <i class="fa-solid fa-face-grin-wide" style="color:rgb(255, 0, 157);"></i> </strong>.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>
    @endif

  <form action="{{ route('users-image.store') }}" method="post" enctype="multipart/form-data"> <!-- pour envoyer la photo --> 
    @csrf 
  <div class="d-flex">
      <img class="pe-2 " src="{{ asset('storage/'.auth()->user()->image) }}" alt="" style="border-radius:50%;height:88px; width:88px;">
        <div class="fw-bold fs-4 mt-4"> 
          <a  href="{{ route('home.general') }}"> <button style =" background-color:rgb(194, 28, 114);" class="col btn border border-black text-light btn-outline-black fw-bold shadow-sm" data-bs-toggle="modal" data-bs-target="#xampleMessi">  &nbsp;Ajouter image</button></a> &nbsp; &nbsp; 
        <a href="{{ route('home.general') }}"> <button class="col btn border border-black btn-outline-black fw-bold shadow-sm" data-bs-toggle="modal" data-bs-target="#xampledelete"> <i class="fa-solid text-danger fa-trash"></i> &nbsp;supprimer</button></a>

        </div> 
        
<!-- Modal pour ajout de  la photo -->
<div class="modal fade" id="xampleMessi" tabindex="-1" aria-labelledby="xampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title  fs-5" id="xampleModalLabel"> Mettre à jour votre photo ! </h5>
        <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
  <form action="{{ route('users-image.store') }}" method="post" enctype="multipart/form-data"> <!-- pour envoyer la photo --> 
    @csrf 
    
    <div class="modal-body">
        <div class="mb-3">
          <input class="form-control fw-bold" type="file" id="formFile" name="image" required> <!-- le photo --> 
        </div>
      </div>  
   
      <div class="modal-footer">
        <button type="button" class="btn btn-danger fw-bold" data-bs-dismiss="modal">Non</button>
        <button type="submit" class="btn btn-primary fw-bold">Oui</button>
      </div>
   </form>
    </div>
  </div>
</div>
<!-- fin modal --> 

<!-- Modal pour la suppression de  la photo -->
<div class="modal fade" id="xampledelete" tabindex="-1" aria-labelledby="xampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title  fs-5" id="xampleModalLabel"> Supprimer la photo! </h5>
        <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
  <form action="{{ route('users-image.delete') }}" method="post" enctype="multipart/form-data"> <!-- pour envoyer la photo --> 
    @csrf 
    @method('DELETE')
    
    <div class="modal-body">
        <div class="mb-3 fw-bold">
          êtes-vous sur de vouloir <span class="text-danger">supprimer</span> votre photo  ? 
        </div>
      </div>  
   
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary fw-bold">Oui</button>
        <button type="button" class="btn btn-danger fw-bold" data-bs-dismiss="modal">Non</button>
      </div>
   </form>
    </div>
  </div>
</div>
<!-- fin modal -->

      
   </div>
</form>


<form class="row g-3 gx-5 " method="POST" action="{{ route('register.update',auth()->user()->id) }}">
    @csrf
    @method('PUT')
  
  <div class="col-md-12">
    <label for="inputEmail4" class="form-label fw-bold"> <span class="text-danger me-1">*</span> Nom</label>
    <input type="text" name="nom" value="{{ auth()->user()->nom }}" required class="form-control border  @error('nom') is-invalid @enderror"  id="inputEmail4" placeholder="saisir votre nom">
     @error('nom')
          <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
           </span>
     @enderror
  </div>
    <div class="col-md-12">
    <label for="inputEmail42" class="form-label fw-bold"> <span class="text-danger me-1">*</span>Prenom</label>
    <input type="text" name="prenom" value="{{auth()->user()->prenom}}" required class="form-control @error('prenom') is-invalid @enderror" id="inputEmail42" placeholder="saisir votre Prenom">
     @error('prenom')
          <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
           </span>
     @enderror
  </div>

  <div class="col-md-12">
    <label for="inputEmail14" class="form-label fw-bold"> <span class="text-danger me-1">*</span>Code Etudiant</label>
    <input type="number" name="code_apogée" value="{{ auth()->user()->code_apogée}}" required class="form-control @error('code_apogée') is-invalid @enderror"  id="inputEmail14" placeholder="saisir votre code apogée">
     @error('code_apogée')
          <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
           </span>
     @enderror
  </div>
    <div class="col-md-12">
    <label for="num_tel" class="form-label fw-bold"> <span class="text-danger me-1">*</span>Tel</label>
  <!-- j'ai ajouté un zéro dans value '0' car par défaut le zéro n'etait pas sauvegardé -->
    <input type="number" name="num_tel" value="0{{auth()->user()->num_tel}}" required class="form-control @error('num_tel') is-invalid @enderror" id="num_tel" placeholder="saisir votre Numéro">
     @error('num_tel')
          <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
           </span>
     @enderror
  </div>

  <div class="col-md-12">
    <label for="inputEmaiel4" class="form-label fw-bold"> <span class="text-danger me-1">*</span>Filière</label>
    <select id="inputEmaiel4" type="filiere" class="form-select @error('filiere') is-invalid @enderror" name="filiere" value="{{ old('filiere') }}" required autocomplete="filiere">
                               <option selected><span class="btn disabled">{{ auth()->user()->filiere }}</span></option>
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
 
    <div class="col-md-12">
    <label for="email" class="form-label fw-bold"> <span class="text-danger me-1">*</span>Email</label>
    <input type="email" name="email" value="{{ auth()->user()->email }}" required class="form-control @error('email') is-invalid @enderror" id="email" placeholder="saisir votre email">
     @error('email')
          <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
           </span>
     @enderror
  </div>

  <div class="col-md-12">
    <label for="password" class="form-label fw-bold"> <span class="text-danger me-1">*</span>Mot de passe</label>
    <input type="password" name="password" value="{{ auth()->user()->password }}" required class="form-control @error('password') is-invalid @enderror"  id="password" placeholder="saisir votre nom">
     @error('password')
          <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
           </span>
     @enderror
  </div>
    <div class="col-md-12">
    <label for="confirmation" class="form-label fw-bold"> <span class="text-danger me-1">*</span>confirmation</label>
    <input type="password" value="{{ auth()->user()->password }}" name="password_confirmation" required class="form-control @error('password_confirmation') is-invalid @enderror" id="confirmation" placeholder="confimer le mot de passe">
    
  </div>
   <div class="col-md-12 mb-5 pb-4">
      
                  <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop001" class="btn fw-bold text-light px-3 me-2" style="background-color:rgb(255, 0, 157);"> valider  </button>
                   
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
         Êtes-vous sûr de <span class="text-primary fw-bold ">&nbsp; valider les Modifications ! </span> &nbsp; ? 
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
