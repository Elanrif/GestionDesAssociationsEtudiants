@extends("../../admin/home")
@section('admin')
@foreach ($users as $user )

 <ul>
     <li> {{ $user->nom }} {{ $user->prenom }} {{ $user->password }}</li>
 </ul>
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
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>

@endforeach
@endsection