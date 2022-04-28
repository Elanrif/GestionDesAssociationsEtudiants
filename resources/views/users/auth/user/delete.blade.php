@extends('user_layouts.general')

@section('general')

<form action="{{ route('deleteAccount') }}" method="post">
    @csrf
   
        <div class="card shadow bg-dark text-light" style="height:50vh;">
  <div class="card-body">
    <h5 class="card-title fs-1 fw-bold mb-5">Nous sommes désolé de te voir partir </h5>
    <h6 class="card-subtitle mb-2 text-muted"></h6>
    <p class="card-text mb-3">Si vous souhaitez réduire vos notifications par e-mail, vous pouvez les désactiver ici ou si vous souhaitez simplement modifier votre nom d'utilisateur, vous pouvez le faire ici.

<span class="text-danger fw-bold">Attention, la suppression du compte est définitive.</span>  Il n'y aura <span class="fw-bold"> aucun moyen de restaurer votre compte.</span></p>
   
    <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdropj1" class="card-link nav-link fw-bold text-danger">Supprimer mon Compte</a>
    <div class="modal fade text-dark" id="staticBackdropj1"  data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="staticBackdropLabel"> <i class="fas fa-exclamation-triangle me-2 text-danger"></i> Dernier avertissement ! </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body fw-bold">
      <span class="text-danger fw-bold">Attention, la suppression du compte est définitive.</span>  Il n'y aura <span class="fw-bold"> aucun moyen de restaurer votre compte.</span>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-info px-3">Oui</button>
        <button type="button" class="btn btn-danger px-3"  data-bs-dismiss="modal">Non</button>
      </div>
    </div>
  </div>
</div>
  </div>
</div>

</div>

</form>
@endsection


