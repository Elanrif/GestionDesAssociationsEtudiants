


@extends('user_layouts.app')

@section('user_content')

<div class="container-fluid d-flex justify-content-center">
    <div style="width:70vh;min-height:40vh;margin-top:100px;">
     
    <div class="row"> <!-- button xample pour la photo --> 
    <a class="w-25" data-bs-toggle="modal" data-bs-target="#xampleModal" href="#">  
    <div class="col-8 pt-3 col-lg-3 me-3">
      <div class="mb-3">

</div>
<img class="pe-2 d-iline" src="{{ asset('storage/'.auth()->user()->image) }}" alt="" style="border-radius:50%;height:150px; width:150px;">
</div>
</a>
<div class="col ms-3 flex-column  align-items-center pt-1 ps-5 fs-5"> 
    <h3 class="fw-bold mt-5"> {{ auth()->user()->nom }}   {{ auth()->user()->prenom }}  
     </h3>
     <div class="row mt-5 g-3 row-cols-1 row-cols-md-2"> 
      <a href="{{ route('home.general') }}"> <button class="col btn border border-black btn-outline-black fw-bold" data-bs-toggle="modal" data-bs-target="#staticBackdrop11"> <i class="fa-solid fa-highlighter"></i> &nbsp;Editer profile</button></a>

      <a href="#"> <button class="col btn border border-black fw-bold" data-bs-toggle="modal" data-bs-target="#staticBackdrop11">  <i class="fa-solid fa-lock"></i> &nbsp;Confidentialité</button></a>
   
    </div>
    </div>

</div>
    </div>
</div>

@endsection





