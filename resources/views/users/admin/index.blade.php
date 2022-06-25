@extends("../../admin/home")
@section('admin')


<!-- pour la modification --> 
    @if ($message = Session::get('update'))
        <div class="alert alert-primary alert-dismissible fade show w-50" role="alert">
   <span class="fw-bold">{{ $message }}</span><strong class="fs-5"><i class="fa-solid fa-face-laugh-wink" style="color:rgb(26, 142, 84);"></i> </strong>.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>
    @endif

<!-- pour la suppression --> 
    @if ($message = Session::get('delete'))
        <div class="alert alert-primary alert-dismissible fade show w-50" role="alert">
   <span class="fw-bold">{{ $message }}</span><strong class="fs-5"> <i class="fa-solid fa-face-grin-wide" style="color:rgb(255, 0, 157);"></i> </strong>.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>
    @endif  
<!-- fin des message -->

 <div class="container d-flex justify-content-center mt-2 mb-3 bg-body shadow shadow-3 w-25 p-2 rounded-1  fs-4 fw-bold"> <i class="fa-solid p-2 fs-5 shadow shadow-xl  me-3 fa-users-between-lines"></i>Liste des Utilisateurs </div>
       
 <!-- pour la barre de recherche --> 
       <div class="float-end me-5 mb-4">
          <form action = "{{ route('admin.userSearch') }}" class="d-flex">
            @csrf
        
<input name = 'q' class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Recherche...">
<datalist id="datalistOptions">
  @foreach ($users as $user )

  <option value="{{ $user->nom }}"> {{ $user->prenom }} {{ $user->email }} {{ $user->filiere }} {{ $user->role}}</option>
    
  @endforeach

</datalist>

        <button class="btn btn-dark fw-bold text-light ms-3" type="submit">Recherche</button>
      </form>
       </div>
<!-- fin --> 
    <table class="table table-hover">
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
      @foreach($users as $user) 
      
      
 
    <tr>
      <th scope="row">{{ $loop->index+1 }}</th>
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

      
      <td> 
        <!-- data-bs-target accepte seulement un nom simple exp ; 'elanrif' ou 'elanrif1002' seulement les deux cas --> 
        <!-- Au début j'avais comme idée d'aller créer une colone dans la table qui aura par défaut un nom qui respecte bien les conditions de $data-bs-target mais pas 
        la peine car on peut utiliser un nom puis le concatenez avec des chiffres --> 
        <!-- donc faire un nom au début puis concatenez avec le $loop->index --> 
          <a href="#" data-bs-toggle="modal" data-bs-target="#Manar{{ $loop->index+1 }}"> <i class="fa-solid text-danger fs-4 fa-trash"></i> </a>
       </td>
          <!-- doit être dans le foreach pour avoir la variable $user->id  -->
<div class="modal fade" id="Manar{{ $loop->index+1 }}" tabindex="-1" aria-labelledby="exampleModalLabel0001" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel0001"><i class="fa-solid fa-triangle-exclamation me-1 text-danger"></i> Attention</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
       <div class="modal-body fw-bold d-flex justify-content-center">
        êtes-vous sur de vouloir  <span class="text-danger fw-bold px-2">supprimé</span> <span class="text-primary"> {{$user->nom}} </span>   ? 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">non</button>
        <form action="{{ route('admin-users.destroy', $user->id) }}" method="post">
         @csrf
         @method('DELETE')
       <button type="submit" onClick="history.go(0)" class="btn btn-danger mx-2" data-bs-dismiss="modal">Oui</button></td><!-- supprimer-->
        </form>
      </div>
    </div>
  </div>
</div>
<!-- fin -->
     
      <td><a href="{{ route('admin-users.edit',$user->id) }}"><i class="fa-solid fa-file-pen fs-4 text-primary"></i></a> </td><!--modifer-->
      <td><a href="#"><i class="fa-solid fs-4 text-success fa-eye"></i></a></td><!-- voir --> 
   
    </tr>

      @endforeach
  </tbody>
</table>




@endsection