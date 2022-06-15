@extends("../../admin/home")
@section('admin')

<!-- pour la suppression --> 
    @if ($message = Session::get('destroy'))
     <div class="container d-flex justify-content-center mt-2 bg-body rounded-1 fs-5 fw-bold">     <div class="alert  alert-primary ms-4 alert-dismissible fade show w-50" role="alert">
   <span class="fw-bold justify-content-center d-flex">{{ $message }} <strong class="fs-5"> <i class="fa-solid ms-2 fa-face-grin-wide" style="color:rgb(255, 0, 157);"></i> </strong>.</span>
  <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
     </div>
    @endif  

<!-- pour la suppression --> 
    @if ($message = Session::get('update'))
     <div class="container d-flex justify-content-center mt-2 bg-body rounded-1 fs-5 fw-bold">     <div class="alert  alert-primary ms-4 alert-dismissible fade show w-50" role="alert">
   <span class="fw-bold justify-content-center d-flex">{{ $message }} <strong class="fs-5"> <i class="fa-solid ms-2 fa-face-grin-wide" style="color:rgb(255, 0, 157);"></i> </strong>.</span>
  <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
     </div>
    @endif  


<!-- création d'association --> 

    @if ($message = Session::get('associations'))
     <div class="container d-flex justify-content-center mt-2 bg-body rounded-1 fs-5 fw-bold">     <div class="alert  alert-primary ms-4 alert-dismissible fade show w-50" role="alert">
   <span class="fw-bold justify-content-center d-flex">{{ $message }} <strong class="fs-5"> <i class="fa-solid ms-2 fa-face-grin-wide" style="color:rgb(255, 0, 157);"></i> </strong>.</span>
  <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
     </div>
    @endif 

  <!-- creation membre du bureau --> 
  <!-- pour la suppression --> 
    @if ($message = Session::get('message'))
     <div class="container d-flex justify-content-center mt-2 bg-body rounded-1 fs-5 fw-bold">     <div class="alert  alert-primary ms-4 alert-dismissible fade show w-50" role="alert">
   <span class="fw-bold justify-content-center d-flex">{{ $message }} <strong class="fs-5"> <i class="fa-solid ms-2 fa-face-grin-wide" style="color:rgb(255, 0, 157);"></i> </strong>.</span>
  <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
     </div>
    @endif  

    <!--fin-->

 <div class="container d-flex justify-content-center mt-2 bg-body shadow shadow-3 py-2 px-1 rounded-1 fs-4 fw-bold" style="width:30%;"> <i class="fa-solid fa-clone p-1 me-1 fs-4 shadow shadow-3"></i>Les Associations Etudiants </div>
<a class="mt-4 ms-4" href="{{ route('admin-asso.create') }}">  <button class="btn border border-light shadow shadow-3 fw-bold mt-3 fs-5 btn-outline-primary ms-1 "><i class="fa-solid me-2 fa-square-plus"></i> Ajouter </button> </a> 
<div class="row row-cols-1 row-cols-md-3 g-4 m-3 ">
    @foreach($associations as $association)
    <div class="col">
    <div class="card admin-assohover h-100 shadow-lg bg-body" style="transition:0.6s ease-in-out;">
      <div class="card-body">
        <h3 class="card-title "> {{ $association->nom }}</h3>
        <h4 class="card-title "> {{ $association->date }}</h4>
        <p class="card-text"> {{ $association->description }} </p>
      </div>
      <form action = "{{ route('admin-asso.destroy',$association->id) }}" method = "post">
        @csrf
        @method('DELETE')
      <div class="d-flex">
      <button type = "button" data-bs-toggle="modal" data-bs-target="#exampleModaler" class="btn fs-3 text-danger"><i class="fa-solid fa-trash"></i></button>
     <a href="{{ route('admin-asso.edit',$association->id) }}"><div class="btn fs-3 text-primary"><i class="fa-solid fa-file-pen"></i></div></a> 
     
      <a href="{{ route('admin-asso.show',$association->id) }}" type="button"  class="btn fs-3 text-success"><i class="fa-solid fa-eye"></i></a>
    </div>

    <!-- Modal POUR VOIR le contenu des associations  -->
    <!-- Modal -->


    <!--Modal désactiver / ... pour la suppression -->
    <!-- Modal -->
<div class="modal fade" id="exampleModaler" tabindex="-1" aria-labelledby="exampleModalLabeler" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger" id="exampleModalLabeler"><i class="fa-solid text-danger fa-triangle-exclamation"></i> Attention </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body fw-bold">
        Êtes-vous sûr de vouloir supprimé l'association <span class="text-primary"> {{ $association->nom }} </span> ? 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">NON</button>
        <button type="submit" class="btn btn-danger">OUI</button>
      </div>
    </div>
  </div>
</div>
<!-- fin modal --> 
  </form>
    </div> 
</div>


@endforeach
</div>

@endsection