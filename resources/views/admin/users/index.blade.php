
<!-- Modal -->
<div class="modal fade" id="exampleModal001" tabindex="-1" aria-labelledby="exampleModalLabel001" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel001"> Attention</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Voulez-vous vous déconnecter du site LES ASSOCIATIONS ETUDIANTS DE LA FACULTÉS DE SCIENCES DE TETOUAN ? 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <a type="button" href="{{ route('logout') }}" class="btn btn-primary px-4 fw-bold">OK</a>
      </div>
    </div>
  </div>
</div>

  <!-- fin Modal --> 

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid px-4" style="padding:auto 100px;">
    <a class="navbar-brand ps-4 ms-4" href="/">
    <img src="{{asset('images/Logo_0008_Universite-AS.png') }}" class="img-fluid" alt="don't exist" style="height:80px; width:100px; border-radius:70px;">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedConten01t" aria-controls="navbarSupportedConten01t" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarSupportedConten01t" style="margin:auto 100px;">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="us-ser nav-item mx-5 px-4">
          <a class="nav-link active" aria-current="page" href="/"><i class="fas fa-home-alt me-2 fs-4"></i>Acceuil</a>
        </li>
        <li class="nav-item mx-5 px-4">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown02" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown02">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      
      </ul>
      <div class="pe-5" style="margin-right:80px;">
      <form class="d-flex me-3 pe-3" style="margin-right:200px;">
     
        @auth
        <a href="{{ route('logout') }}" data-bs-toggle="modal" data-bs-target="#exampleModal001" class="btn btn-outline-danger fw-bold"> Deconnexion </a>
        @endauth
      </form>
      </div>
    </div>
  </div>
</nav>


