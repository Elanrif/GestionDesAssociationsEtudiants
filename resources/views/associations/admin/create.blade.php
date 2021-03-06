@extends("../../admin/home")
@section('admin')

<div class="container-fluid">


<form action="{{ route('admin-asso.store')}} " method="post" enctype="multipart/form-data">
    @csrf

    <div class="container mt-5  d-flex justify-content-center mt-2 bg-body shadow shadow-3 py-2 px-1 rounded-1 fs-4 fw-bold" style="width:40%;"> <i class="fa-solid fa-clone p-1 me-1 fs-4 shadow shadow-3"></i>Créer une Association Etudiante </div>

<div class="row d-flex justify-content-center"> <!-- row a l'interieur de row . -->
  
<div class="col-auto col-md-6 mt-5">

<div class="container mt-3">
 <div class="input-asso row row-cols-1 align-items-center d-flex justify-content-center">

    <div class="col">
      <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label fw-bold">Assocation</label>
    <input type="text" class="form-control" name = "nom" value = "{{ old('nom') }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Veuillez entrez le nom de l'association..." required>
    
         </div>
    </div>

      <div class="col">
         <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label fw-bold">Date</label>
    <input type="date" class="form-control" name = "date" value = "{{ old('date') }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Date création..." required>
    
         </div>
    </div>

     <div class="col mb-3">
         <label for="tetarea" class="fw-bold mb-1">Description</label>
         <div class="form-floating ">
                <textarea id="tetarea" name= "description" value = "{{ old('description') }}" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" required></textarea>
                <label for="floatingTextarea2">écrire...</label>
          </div>
        </div>
        
        <div class="col">
          <div class="mb-3">
     <label for="exampleInputEmail1" class="form-label fw-bold">Image </label>
     <input type="file" class="form-control" name = "image" value = {{ old('image') }} id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Date création..." required>
     
          </div>
     </div>

           </div>

       </div>
     
    <div class="mt-3 ms-4">
        <button type="submit" class="btn btn-primary">Valider</button>
       <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Annuler</button>
    </div>
   </div>
</div>

</form>
<!--Modal Annuler -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="exampleModalLabel"><i class="fa-solid text-danger fa-triangle-exclamation me-1"></i> Abandonner</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body fw-bold">
        êtes-vous sûr de vouloir <span class="text-danger">abandonner</span>  et <span class="text-primary"> revenir dans la page préçedente</span> ? 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Non</button>
      <a href="{{ route('admin-asso.index') }}"> <button type="button" class="btn btn-primary">Oui</button></a> 
      </div>
    </div>
  </div>
</div>

<!--Modal -->
</div>

@endsection