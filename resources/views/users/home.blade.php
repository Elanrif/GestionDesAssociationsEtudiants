
@extends('layouts.app')

@section('content')
<div class="mt-5">
    <div class="row g-4">
    <div class="col-8 pt-3 col-lg-3 me-3">
<img class="me-2" src="{{ asset('images/assurance_association_sportive.jpg') }}" alt="" style="border-radius:50%;height:250px; width:250px;">
</div>
<div class="col ms-3 pt-1 ps-5 text-primary fs-5"> 
    <p> <span class="fw-bold text-dark">Nom</span> : {{ auth()->user()->nom }}  </p>
    <p> <span class="fw-bold text-dark">Prenom</span>  : {{ auth()->user()->prenom }} </p>
    <p> <span class="fw-bold text-dark">Email</span> : {{ auth()->user()->email }} </p>
    <p> <span class="fw-bold text-dark">Code Apogée</span>  : {{ auth()->user()->code_apogée}}  </p>
    <p> <span class="fw-bold text-dark">Numero Tel </span> : {{ auth()->user()->num_tel }} </p>
    <p> <span class="fw-bold text-dark">Filière</span> : {{ auth()->user()->filiere }} </p>
    </div>

</div>
</div>
<hr>
<div class="row"> 
    <div class="col"><i class="far fs-4 text-primary fa-comments"></i> Poster un commentaire</div>
    <div class="col"><i class="fas fa-user-edit fs-4 text-primary"></i> Modifier les informations</div>
    <div class="col"><i class="far fs-4 text-primary fa-comments"></i> Poster un commentaire</div>
</div>

@endsection
