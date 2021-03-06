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


<div class="container mt-3">
    @include('associations.admin.table.asso')
</div>


@endsection