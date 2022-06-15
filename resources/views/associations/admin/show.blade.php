@extends("../../admin/home")
@section('admin')

 <!-- suppression membre du bureau --> 
   @if ($message = Session::get('manarfatiguer'))
     <div class="container d-flex justify-content-center mt-2 bg-body rounded-1 fs-5 fw-bold">     <div class="alert  alert-primary ms-4 alert-dismissible fade show w-50" role="alert">
   <span class="fw-bold justify-content-center d-flex">{{ $message }} <strong class="fs-5"> <i class="fa-solid ms-2 fa-face-grin-wide" style="color:rgb(255, 0, 157);"></i> </strong>.</span>
  <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
     </div>
    @endif 

     <!-- suppression membre du bureau --> 
   @if ($message = Session::get('edit'))
     <div class="container d-flex justify-content-center mt-2 bg-body rounded-1 fs-5 fw-bold">     <div class="alert  alert-primary ms-4 alert-dismissible fade show w-50" role="alert">
   <span class="fw-bold justify-content-center d-flex">{{ $message }} <strong class="fs-5"> <i class="fa-solid ms-2 fa-face-grin-wide" style="color:rgb(255, 0, 157);"></i> </strong>.</span>
  <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
     </div>
    @endif
    
    @if ($message = Session::get('manar'))
     <div class="container d-flex justify-content-center mt-2 bg-body rounded-1 fs-5 fw-bold">     <div class="alert  alert-primary ms-4 alert-dismissible fade show w-50" role="alert">
   <span class="fw-bold justify-content-center d-flex">{{ $message }} <strong class="fs-5"> <i class="fa-solid ms-2 fa-face-grin-wide" style="color:rgb(255, 0, 157);"></i> </strong>.</span>
  <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
     </div>
    @endif 

    <!-- creation membre du bureau --> 
      @if ($message = Session::get('create'))
     <div class="container d-flex justify-content-center mt-2 bg-body rounded-1 fs-5 fw-bold">     <div class="alert  alert-primary ms-4 alert-dismissible fade show w-50" role="alert">
   <span class="fw-bold justify-content-center d-flex">{{ $message }} <strong class="fs-5"> <i class="fa-solid ms-2 fa-face-grin-wide" style="color:rgb(255, 0, 157);"></i> </strong>.</span>
  <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
     </div>
    @endif 

  <!-- pour la suppression --> 
    @if ($message = Session::get('delete'))
     <div class="container d-flex justify-content-center mt-2 bg-body rounded-1 fs-5 fw-bold">     <div class="alert  alert-primary ms-4 alert-dismissible fade show w-50" role="alert">
   <span class="fw-bold justify-content-center d-flex">{{ $message }} <strong class="fs-5"> <i class="fa-solid ms-2 fa-face-grin-wide" style="color:rgb(255, 0, 157);"></i> </strong>.</span>
  <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
     </div>
    @endif  

    <!-- suppression membre du bureau --> 
  <!-- pour la suppression --> 
    @if ($message = Session::get('message'))
     <div class="container d-flex justify-content-center mt-2 bg-body rounded-1 fs-5 fw-bold">     <div class="alert  alert-primary ms-4 alert-dismissible fade show w-50" role="alert">
   <span class="fw-bold justify-content-center d-flex">{{ $message }} <strong class="fs-5"> <i class="fa-solid ms-2 fa-face-grin-wide" style="color:rgb(255, 0, 157);"></i> </strong>.</span>
  <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
     </div>
    @endif 


<div class="card bg-dark text-white mt-2">
  <div class="card-img" alt="..." style="height:80vh;background:linear-gradient(rgba(40, 7, 10, 0.6),rgb(4, 2, 59)),url({{ asset('storage/'.$association->image) }}) center / cover no-repeat  ;"></div>
  <div class="card-img-overlay ms-4" style="margin:50px">
    <h3 class="card-title fs-1 fw-bold">Association <span class="text-uppercase">{{ $association->nom }}</span></h3>
     <h3 class="card-title fs-1 my-4 fw-bold">Date <span class="text-primary text-uppercase">{{ $association->date }}</span></h3>
    <p class="card-text fs-3 fw-bold"> {{ $association->description }}.</p>
    

    <a href="{{ route('admin-asso.index') }}"> <button class="btn btn-danger fw-bold mt-4 p-4 rounded-circle" style="font-size:40px;">Retour</button>
        </a>
  </div>
</div>

<div class="container-fluid my-5">
  <p class="fs-1 text-center fw-bold">Membre du Bureau</p>

 <!-- Remarque : pour les include tjrs on commence par la racine de view ; .........pour créer les membre du bureau --> 
     @include('associations\bureau\modal\create')
<!-- fin --> 

    <div class="row row-cols-1 row-cols-lg-3 g-4">
  <!-- a l'interieur de boucle foreach on aura acces TJRS LA VARIABLE qui SONT AVANT le foreach comme ici $ASSOCIATION -->
 
    @include('associations.admin.table.show')
 
</div>
</div>

<!-- PARTIE DES ASSOCIATOINS --> 
<div class="container-fluid  px-4" style="min-height:50vh;background-color:rgb(228, 230, 231);">
  <p class="text-center fw-bold pt-4 fs-1">Les évènements </p>

  @include('associations.bureau.evenement.create') <!-- pour créer l'evenements --> 

  <div class="row row-cols-1 row-cols-md-3 pb-5 g-4">
 
   
  </div>

  @include('associations.admin.table.event')


</div>
<!-- FIN --> 

<!-- PARTIE  des BÉNÉVOLES --> 

<div class="container-fluid px-4" style="background-color:var( --gold-crayola )">
  <p class="text-center fw-bold pt-4 fs-1">Les Bénévoles</p>


  <a href="#"> <button data-bs-toggle="modal" data-bs-target="#exampleModaling"  class="btn btn-outline-success float-end fw-bold mb-3"><i class="fa-solid fa-square-plus me-2"></i>Ajouter</button> </a> 
  <!-- DEbut MODAL --> 


<div class="modal fade" id="exampleModaling" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter un membre</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('admin-asso.membre_create') }}" method = "post">
        @csrf
      <div class="modal-body">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Utilisateur :</label>
             <select name ="user_id" class="form-select" aria-label="Default select example">
            <option selected>Veuillez séléctionner un utilisateur </option>
            @foreach ($users as $user)
            
            <option value="{{ $user->id }}">{{ $user->nom }}</option>
            @endforeach
           </select>
          </div>
          <div class="mb-3 visually-hidden">
            <label for="message-text" class="col-form-label">Association :</label>
            <select name="association_id" class="form-select" aria-label="Default select example">
            <option value="{{ $association->id }}">{{ $association->nom }}</option>
           </select>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger px-3" data-bs-dismiss="modal">non</button>
        <button type="submit" class="btn btn-primary px-3">oui</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- fin --> 
  <table class="table table-hover" style="min-height:30vh;padding-bottom:60px;">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
      <th scope="col">E-mail</th>
      <th scope="col">Mot de passe</th>
      <th scope="col">Filière</th>
      <th scope="col">Code</th>
      <th scope="col">Tel</th>
      <th scope="col">Role</th>
      <th scope="col">Active</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
   
      @foreach($association->users->sortByDesc('id') as $user) 
    <tr>
      <th scope="row">{{ $loop->index + 1}}</th>
      <td>{{ $user->nom }}</td>
      <td>{{ $user->prenom }}</td>
      <div class="row">
      <td class="col-2 text-primary">{{ $user->email }}</td>
      </div>
      <td>{{ $user->password }}</td>
      <td>{{ $user->filiere }}</td>
      <td>{{ $user->code_apogée }}</td>
      <td>{{ $user->num_tel }}</td>
      <td>{{ $user->role }}</td>
      <td>{{ $user->active }}</td>
      
      
      <td>   <a href="#" data-bs-toggle="modal" data-bs-target="#membre{{ $loop->index+1 }}"> <i class="fa-solid text-danger fs-4 fa-trash"></i> </a> </td>
     
   
   
    </tr>

    <!-- doit être dans le foreach pour avoir la variable $user->id  -->
<div class="modal fade" id="membre{{ $loop->index+1 }}" tabindex="-1" aria-labelledby="exampleModalLabel0001" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel0001"><i class="fa-solid fa-triangle-exclamation me-1 text-danger"></i> Attention</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
       <div class="modal-body fw-bold d-flex justify-content-center">
        êtes-vous sur de vouloir  <span class="text-danger px-2">supprimé</span> <span class="text-primary fw-bold"> {{ $user->nom }} </span> ? 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger px-3" data-bs-dismiss="modal">non</button>
        <!-- $user->pivot ou $association->pivot en fait pivot nous permet directement de trouver le model intermediaire -->
        <!-- Notez que chaque usermodèle que nous récupérons se voit automatiquement attribuer un pivotattribut. Cet attribut contient un modèle représentant la table intermédiaire.-->
        <form action="{{ route('admin-asso.membre_destroy',$user->id) }}" method="post"> <!-- "id"=>$user->pivot... car je ne peux pas recuper $user->pivot->id comme ça dans le url de web.php donc je l'affecte a une nom -->
         @csrf
         @method('DELETE')
         <input type="text" class="visually-hidden" name="user_id" value="{{ $user->pivot->user_id }}">
         <input type="text" class="visually-hidden" name="association_id" value={{ $user->pivot->association_id }}>
       <button type="submit" onClick="history.go(0)" class="btn btn-primary px-3 mx-2" data-bs-dismiss="modal">Oui</button></td><!-- supprimer-->
        </form>
      </div>
    </div>
  </div>
</div>
      @endforeach
  </tbody>
</table>
    
</div>


@endsection
