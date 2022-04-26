
@extends('user_layouts.general')

@section('general')

   
<div class="container">
    @if ($message = Session::get('general'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
   <span class="fw-bold">{{ $message }}</span><strong class="fs-5"> <i class="fa-solid fa-face-grin-wide" style="color:rgb(255, 0, 157);"></i> </strong>.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>
    @endif
<form class="row g-3 gx-5 " method="POST" action="{{ route('register.general',auth()->user()->id) }}">
    @csrf
    @method('PUT')
 
    <div class="col-md-12 py-3">
    <label for="inputEmail4" class="form-label fw-bold"> <span class="text-danger me-1">*</span> Nom</label>
    <input type="text" name="nom" value="{{ auth()->user()->nom }}" class="form-control border  @error('nom') is-invalid @enderror"  id="inputEmail4" placeholder="saisir votre nom">
     @error('nom')
          <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
           </span>
     @enderror
  </div>

    <div class="col-md-12 mt-5">
    <label for="email" class="form-label fw-bold"> <span class="text-danger me-1">*</span>Email</label>
    <input type="email" name="email" value="{{ auth()->user()->email }}"  class="form-control @error('email') is-invalid @enderror" id="email" placeholder="saisir votre email">
     @error('email')
          <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
           </span>
     @enderror
  </div>


   <div class="col-md-12 mb-5 py-4">
      
                  <button type="submit" data-bs-toggle="modal" data-bs-target="#statijcBackdrop00199" class="btn me-2 fw-bold" style="background-color:rgb(194, 28, 114);color:var(--blanc--)"> valider  </button>
                
   </div>
   <!-- Button trigger modal -->


</form>


    </div>
     

@endsection