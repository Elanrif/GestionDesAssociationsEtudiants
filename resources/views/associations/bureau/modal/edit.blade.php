
        <!-- Attention ici j'aurais besoin de plusieur modal différent car chaque membre aura son modal --> 
        <div class="ms-3">  <!-- editer le membre du bureau --> 
             <button type="button" data-bs-toggle="modal" data-bs-target="#edit{{ $loop->index }}" class="btn btn-outline-primary"><i class="fa-solid fa-file-pen"></i></button>
      <!-- et data-bs-target c'est comme une variable il n'accepte les espace , ou seulement nombre , il a tout les propriété d'une variable --> 
  
<!-- Modal pour editer -->
<div class="modal fade" id="edit{{ $loop->index }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="exampleModalLabel">    <div class="container d-flex justify-content-center mt-4 bg-body shadow shadow-3 py-2 px-1 rounded-1 fs-4 fw-bold" style="width:auto" > <i class="fa-solid fa-clone p-1 me-1 fs-4 shadow shadow-3"></i>Modifier un Membre Du Bureau </div>  </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">


        <form class="form" method="POST" action="{{ route('update.bureau',['bureau'=>$bureau->id]) }}" enctype="multipart/form-data">

          @csrf
          @method('put')

    <span class="row g-3 gx-5 d-flex justify-content-center mt-1">
    
   <div class="col-md-5">
    <label for="inputEmail4" class="form-label fw-bold">Nom</label>
    <input type="text" name="nom" value="{{$bureau->nom }}" required class="form-control border  @error('nom') is-invalid @enderror"  id="inputEmail4" placeholder="saisir votre nom">
     @error('nom')
          <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
           </span>
     @enderror
  </div>
    <div class="col-md-5">
    <label for="inputEmail42" class="form-label fw-bold">Prenom</label>
    <input type="text" name="prenom" value="{{ $bureau->prenom }}" required class="form-control @error('prenom') is-invalid @enderror" id="inputEmail42" placeholder="saisir votre Prenom">
     @error('prenom')
          <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
           </span>
     @enderror
  </div>

  <div class="col-md-5">
    <label for="inputEmaiel4" class="form-label fw-bold">Poste</label>
    <select id="inputEmaiel4" type="Post" class="form-select @error('Poste') is-invalid @enderror" name="Poste" value="{{ old('Poste') }}" required autocomplete="Poste">
                               <option selected><span class="btn disabled text-muted">{{ $bureau->Poste }}</span></option>
                               <option value="President" class="fw-bold">Président</option>
                               <option value="Tresorier" class="fw-bold">Trésorier</option>
                               <option value="Secretaire"
                               class="fw-bold">Sécrétaire</option>   
                               <option value="autre"
                               class="fw-bold">autre...</option>   
                                 
                            </select>
     @error('Poste')
          <span class="invalid-feedback " role="alert">
                    <strong>{{ $message }}</strong>
           </span>
     @enderror
  </div>
    <div class="col-md-5">
    <label for="num_tel" class="form-label fw-bold">Tel</label>
    <input type="number" name="Tel" value="{{ $bureau->Tel }}" required class="form-control @error('Tel') is-invalid @enderror" id="num_tel" placeholder="saisir votre Numéro">
     @error('Tel')
          <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
           </span>
     @enderror
  </div>

  <div class="col-md-5">
    <label for="inputEmaiel4" class="form-label fw-bold">Filière</label>
    <select id="inputEmaiel4" type="filiere" class="form-select @error('filiere') is-invalid @enderror" name="filiere" value="{{ old('filiere') }}" required autocomplete="filiere">
                               <option selected><span class="btn disabled">{{ $bureau->filiere }}</span></option>
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
 
    <div class="col-md-5">
    <label for="email" class="form-label fw-bold">Email</label>
    <input type="email" name="email" value="{{ $bureau->email }}" required class="form-control @error('email') is-invalid @enderror" id="email" placeholder="saisir votre email">
     @error('email')
          <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
           </span>
     @enderror
  </div>

  <div class="col-md-5">
    <label for="email" class="form-label fw-bold">Date Mandat</label>
    <input type="date" name="date_mandat" value="{{ $bureau->date_mandat }}" required class="form-control @error('date_mandat') is-invalid @enderror" id="email" >
     @error('date_mandat')
          <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
           </span>
     @enderror
  </div>

  <div class="col-md-5 visually-hidden">
    <label for="email" class="form-label fw-bold">Association</label>
    <input type="text" name="association_id" value="{{ $association->id}}" required class="form-control @error('association_id') is-invalid @enderror" id="email" placeholder="saisir votre email" >
     @error('association_id')
          <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
           </span>
     @enderror
  </div>

  <div class="col-md-5">
    <label for="image" class="form-label fw-bold">Image</label>
    <input type="file" name="image"  class="form-control @error('image') is-invalid @enderror" id="image">
     @error('image')
          <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
           </span>
     @enderror
  </div>

 
</span>
  

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
        <button type ="submit"   class="btn btn-primary fw-bold ">Envoyer</button> 
      </div>

</form>

    </div>
  </div>
</div>

<!-- fin modal -->
      
  </div>