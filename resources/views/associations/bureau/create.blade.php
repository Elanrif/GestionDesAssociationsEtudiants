@extends("../../admin/home")
@section('admin')

<!-- la vue create connais déja l'association->id puisque avant de venir ici il a été passé sur la route voir dans la view asso../admin/show ligne 58 : 55..59 -->
 <!-- pour désactiver le modal seulement supprimer la class modal du parent . car c'est elle qui ouvre tout les modals --> 
<div class="container">
    <div class="container d-flex justify-content-center mt-4 bg-body shadow shadow-3 py-2 px-1 rounded-1 fs-4 fw-bold" style="width:30%;"> <i class="fa-solid fa-clone p-1 me-1 fs-4 shadow shadow-3"></i>Ajouter un Membre Du Bureau </div>
    <!-- je dois passer l'association pour le recuperer dans la methode store --> 
<form class="form" method="POST" action="{{ route('store.bureau',$association->id) }}">
  <!-- maintenant la store methode connaitra l'association aussi dans le web je dois l'ajouter ce paramètre $association --> 
    <span class="row g-3 gx-5 d-flex justify-content-center mt-3">
    @csrf
    
  <div class="col-md-5">
    <label for="inputEmail4" class="form-label fw-bold">Nom</label>
    <input type="text" name="nom" value="{{ old('nom') }}" required class="form-control border  @error('nom') is-invalid @enderror"  id="inputEmail4" placeholder="saisir votre nom">
     @error('nom')
          <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
           </span>
     @enderror
  </div>
    <div class="col-md-5">
    <label for="inputEmail42" class="form-label fw-bold">Prenom</label>
    <input type="text" name="prenom" value="{{ old('prenom') }}" required class="form-control @error('prenom') is-invalid @enderror" id="inputEmail42" placeholder="saisir votre Prenom">
     @error('prenom')
          <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
           </span>
     @enderror
  </div>

  <div class="col-md-5">
    <label for="inputEmaiel4" class="form-label fw-bold">Poste</label>
    <select id="inputEmaiel4" type="Post" class="form-select @error('Poste') is-invalid @enderror" name="Poste" value="{{ old('Poste') }}" required autocomplete="Poste">
                               <option selected><span class="btn disabled text-muted">sélectionner la filiere</span></option>
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
    <input type="number" name="Tel" value="{{ old('Tel') }}" required class="form-control @error('Tel') is-invalid @enderror" id="num_tel" placeholder="saisir votre Numéro">
     @error('Tel')
          <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
           </span>
     @enderror
  </div>

  <div class="col-md-5">
    <label for="inputEmaiel4" class="form-label fw-bold">Filière</label>
    <select id="inputEmaiel4" type="filiere" class="form-select @error('filiere') is-invalid @enderror" name="filiere" value="{{ old('filiere') }}" required autocomplete="filiere">
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
          <span class="invalid-feedback " role="alert">
                    <strong>{{ $message }}</strong>
           </span>
     @enderror
  </div>
 
    <div class="col-md-5">
    <label for="email" class="form-label fw-bold">Email</label>
    <input type="email" name="email" value="{{ old('email') }}" required class="form-control @error('email') is-invalid @enderror" id="email" placeholder="saisir votre email">
     @error('email')
          <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
           </span>
     @enderror
  </div>

  <div class="col-md-5">
    <label for="email" class="form-label fw-bold">Date Mandat</label>
    <input type="date" name="date_mandat" value="{{ old('date_mandat') }}" required class="form-control @error('date_mandat') is-invalid @enderror" id="email" >
     @error('date_mandat')
          <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
           </span>
     @enderror
  </div>

  <div class="col-md-5">
    <label for="email" class="form-label fw-bold">Association</label>
    <input type="text" name="association_id" value="{{ $association->id}}" required class="form-control @error('association_id') is-invalid @enderror" id="email" placeholder="saisir votre email" >
     @error('association_id')
          <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
           </span>
     @enderror
  </div>

  

   <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="staticBackdrop"  data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="staticBackdropLabel"> <i class="fas fa-exclamation-triangle me-2 text-danger"></i> Attention</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body fw-bold d-flex justify-content-center">
       Voulez-vous <span class = "text-primary mx-1">tout abandonner et revenir  </span> à la page préçedente   ! 
      </div>
      <div class="modal-footer" style="margin-right:150px;">
       <a  class="nav-link" href="#"> <button  onClick="history.back()" class="btn d-inline px-4 btn-info"> Oui </button> </a>
        <button type="button" class="btn d-inline px-4  btn-danger" data-bs-dismiss="modal">Non</button>
      </div>
    </div>
  </div>
</div>

</span>
        <div class="col-md-5 mt-5" style="margin-left:113px;">
     
                 <button type="submit" class="btn me-2" style="background-color:var(--bleu--);color:var(--blanc--)">
                                   Enregistrer
                   </button>
                   <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Annuler</button>
                   
         </div>
</form>

</div>


<!-- fin -->
@endsection
