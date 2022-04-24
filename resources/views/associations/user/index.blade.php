@extends("source/layout")
@section('content')

<div class="card bg-dark text-white">
<!-- pour faire dynamique l'image de l'asso dans le disque storage -->    

 <!-- suppression membre du bureau --> 
   @if ($message = Session::get('suivis'))
     <div class="container d-flex justify-content-center mt-2 bg-body rounded-1 fs-5 fw-bold">     <div class="alert  alert-primary ms-4 alert-dismissible fade show w-50" role="alert">
   <span class="fw-bold justify-content-center d-flex">{{ $message }} <strong class="fs-5"> <i class="fa-solid ms-2 fa-face-grin-wide" style="color:rgb(255, 0, 157);"></i> </strong>.</span>
  <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
     </div>
    @endif 
<!-- fin -->

  <div class="bureau-asso card-img" alt="..." style="height:80vh; background:linear-gradient(rgba(6, 6, 6, 0.6),rgb(2, 4, 65)),url({{ asset('storage/'.$association->image) }}) center / cover no-repeat  ;"></div>
  <div class="card-img-overlay ms-4" style="margin:50px">                         
    <h3 class="card-title fs-1 fw-bold">Association <span class="text-uppercase">{{ $association->nom }}</span></h3>
     <h3 class="card-title fs-1 my-4 fw-bold">Date <span class="text-primary text-uppercase">{{ $association->date }}</span></h3>
    <p class="card-text fs-3 fw-bold w-50"> {{ $association->description }}.</p>
   
    @auth
    
   @if(auth()->user()->suit($association)) <!-- si la personne suit  l'associatoin -->

  <form action="{{ route('suivis.delete',$association->id) }}" method ="post"> <!-- pour l'utilisateur connecté suit l'Asso --> 
   
      @csrf
      @method('delete')
 
    <a href="#"> <button type = "submit"  class="btn text-success fw-bold mt-4 p-4 rounded-circle p-1" style="font-size:40px;"><i class="fas fa-check-double" style="font-size:90px;"></i></button> </a>

  </form>

   @else <!-- si il ne suit pas l'association et qu'il clique sur suivre on l'ajoute l'associaton --> 

  <form action="{{ route('suivis.attach',$association->id) }}" method ="post"><!-- $associatoin->id n'est pas important ici mais c'est juste pour voir ID de l'association -->
     @csrf 

     <input type="text" class="visually-hidden" name="user_id" value="{{ auth()->user()->id }}">

    <input type="text" class="visually-hidden" name="association_id" value={{ $association->id }}>

   <a href="#"> <button type = "submit"  class="btn btn-primary fw-bold mt-4 p-4 rounded-circle" style="font-size:40px;">SUIVRE</button> </a>
  </form>
  
  @endif
        
     @endauth
        
        @guest
         <button data-bs-toggle="modal" data-bs-target="#exampleModaler" class="btn btn-primary fw-bold mt-4 p-4 rounded-circle" style="font-size:40px;">SUIVRE</button>     
             <!-- Modal pour la personne qui veut suivre mais est un invité -->
<div class="modal fade" id="exampleModaler" tabindex="-1" aria-labelledby="exampleModalLabeler" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger fw-bold" id="exampleModalLabeler"><i class="fa-solid text-danger fw-bold fa-triangle-exclamation"></i> À savoir  </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body fs-5 text-dark">
       Vous devez vous <a style="text-decoration:none;" href="{{ route('register') }}">inscrire</a>  ou  <a style="text-decoration:none;" href="{{ route('login') }}">vous connecter</a> pour pouvoir <span class="text-success fw-bold">suivre</span> cette association ! 
      </div>
      <div class="modal-footer">
       <a href="{{ route('register') }}"> <button type="button" class="btn btn-outline-primary fw-bold" data-bs-dismiss="modal">S'inscire</button> </a>
       <a href="{{ route('login') }}"><button type="submit" class="btn btn-outline-success fw-bold">Se connecter</button> </a> 
      </div>
    </div>
  </div>
</div>
        @endguest
  </div>
</div>

<div class="container-fluid my-5">
    <!-- $association->id pour avoir l'instance de l'association dans le nouveau page $association -->
   
 <div class="text-center fs-1 fw-bold">Les Membres du Bureau </div> <br><br>
    <div class="row row-cols-1 row-cols-lg-3 px-5 g-4" style="min-height:50vh;">
  
  @foreach ($association->bureaus as $bureau) <!-- déja on a le bureau pas besoin de faire $association's as $association avant car on l'a déja fait et ici on a direcement $association sans 's' -->
  <div class="col hoover " style = "transition:0.6s ease-in;">
      <div class="card h-100 bg-dark text-light" style="width:80%;">
         
          <span class="text-center">

             <img src="{{ asset("images/association_default/DEVE-VE-Association_etudiantes.jpg") }}" class="card-img-top" alt="..." style="margin-top:10px;width:120px;border-radius:70% ;height:20vh;">

            <h4 class="card-title mt-3 text-warning">{{ $bureau->Poste }} </h4>
              <h5 class="card-title mt-2  fw-bold">{{ $bureau->nom }} {{ $bureau->prenom }}</h5>
          </span>
          <div class="card-body">
              
              <p class="card-text">
                  <ul class="nav flex-column">
                      
                          <a href="#" class="nav-link text-light fw-bold"> <i class="fa-solid fa-envelope me-2"></i>{{ $bureau->email }}</a>
                          <a href="#" class="nav-link text-light fw-bold">  <i class="fa-solid fa-mobile me-2"></i>{{ $bureau->Tel }}</a>
                          <a href="#" class="nav-link text-light fw-bold"> <i class="fa-solid fa-graduation-cap me-2"></i>{{ $bureau->filiere }}</a>
                      
                  </ul>
                
               

       
              <button  type="button" data-bs-toggle="modal" data-bs-target="#exampleModaler" class="btn btn-outline-danger"></button>
    
 
              
            </div>
        </div>
    </div>
    @endforeach
 
</div>
</div>



@endsection
