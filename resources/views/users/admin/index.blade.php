@extends("../../admin/home")
@section('admin')

    <table class="table">
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
      <th scope="row">{{ $loop->index }}</th>
      <td>{{ $user->nom }}</td>
      <td>{{ $user->prenom }}</td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->password }}</td>
      <td>{{ $user->filiere }}</td>
      <td>{{ $user->code_apogée }}</td>
      <td>{{ $user->num_tel }}</td>
      <td>{{ $user->role }}</td>
      <td>{{ $user->active }}</td>
      
      <td>   <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal0001"> <i class="fa-solid text-danger fs-4 fa-trash"></i> </a> </td>
     
      <td><a href="{{ route('admin-users.edit',$user->id) }}"><i class="fa-solid fa-file-pen fs-4 text-primary"></i></a></td><!--modifer-->
      <td><a href="#"><i class="fa-solid fs-4 text-success fa-eye"></i></a></td><!-- voir --> 
   
    </tr>

    <!-- doit être dans le foreach pour avoir la variable $user->id  -->
<div class="modal fade" id="exampleModal0001" tabindex="-1" aria-labelledby="exampleModalLabel0001" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel0001"><i class="fa-solid fa-triangle-exclamation me-1 text-danger"></i> Attention</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
       <div class="modal-body fw-bold d-flex justify-content-center">
        êtes-vous sur de vouloir  <span class="text-primary px-2">supprimé</span>  cette utilisateur   ? 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <form action="{{ route('admin-users.destroy', $user->id) }}" method="post">
         @csrf
         @method('DELETE')
       <button type="submit" onClick="history.go(0)" class="btn btn-danger mx-2" data-bs-dismiss="modal">Oui</button></td><!-- supprimer-->
        </form>
      </div>
    </div>
  </div>
</div>
      @endforeach
  </tbody>
</table>




@endsection