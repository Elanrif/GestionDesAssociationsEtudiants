@extends("../../admin/home")
@section('admin')

<!-- PARTIE DES ASSOCIATOINS --> 
<div class="container-fluid  px-4" style="min-height:50vh;background-color:rgb(228, 230, 231);">
  <h3 class="fw-bold text-center mb-3 fs-2 pt-4">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">{{ $association->nom }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">Gestion évènements</li>
  </ol>
</nav>
</h3>
  
  @include('associations.bureau.evenement.create') <!-- pour créer l'evenements --> 

  <div class="row row-cols-1 row-cols-md-3 pb-5 g-4">
 
    @foreach ($association->evenements->sortByDesc('id') as $evenement )
      
    <div class="col pb-5">
      <div class="card">
        <div class="card-img-top" alt="..."  style="height:20vh; background: linear-gradient(rgba(38, 35, 66, 0.5),#0e0324) , url({{ asset('storage/'.$evenement->image) }} ) center / cover no-repeat  ;"></div>
        <div class="card-body">
          <h5 class="card-title fw-bold ms-3">ÉVÈNEMENT {{ $evenement->type }}</h5>
          <p class="card-text">
            <ul class="nav flex-column">
              <a href="#" class="nav-link my-2 text-dark fw-bold"><i class="fa-solid fa-calendar"></i> {{ $evenement->date }}</a>
              <a href="#" class="nav-link my-2 text-dark fw-bold"><i class="fa-solid fa-clock"></i> {{ $evenement->heure }}</a>
              <a href="#" class="nav-link my-2 text-dark fw-bold"><i class="fa-solid fa-location-dot"></i> {{ $evenement->lieu }}</a>
            </ul>
          </p>
        </div>

       <div class="d-flex ms-4 mb-3">
     <!-- pour la suppression d'un evenement et l'edition  --> 

     @include('associations.bureau.evenement.delete')

      @include('associations.bureau.evenement.edit')
      <!-- fin --> 

      </div>

      </div>
    </div>

    @endforeach
</div>


</div>
<!-- FIN --> 

@endsection