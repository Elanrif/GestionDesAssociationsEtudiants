@extends("../../admin/home")
@section('admin')

<!-- PARTIE DES ASSOCIATOINS --> 
<div class="container-fluid  px-4" style="min-height:87.5vh;background-color:rgb(228, 230, 231);">
  <h3 class="fw-bold text-center mb-3 fs-2 pt-4">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin-asso.show',$association->id) }}">Association {{ $association->nom }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">Gestion évènements</li>
  </ol>
</nav>
</h3>
  
  @include('associations.bureau.evenement.create') <!-- pour créer l'evenements --> 

  <div class="row row-cols-1 row-cols-md-3 pb-5 g-4">
 
   
</div>

 @include('associations.admin.table.event2')


</div>
<!-- FIN --> 

@endsection