
     <!-- Membre du Bureau -->

   <button class="btn btn-outline-success fw-bold mb-3" data-bs-toggle="modal" data-bs-target="#evener"><i class="fa-solid fa-square-plus me-2"></i>Ajouter</button>


<!-- Modal -->
<div class="modal fade" id="evener" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
         
<form action="{{ route('adminevent.store')}} " method="post" enctype="multipart/form-data">
    @csrf

<div class="container mt-3">
 <div class="input-asso row row-cols-1 align-items-center d-flex justify-content-center">

    <div class="col col-md-9">
      <div class="mb-3">
    <label for="exampleInputE" class="form-label fw-bold">Évènement</label>
    <input type="text" class="form-control" name = "type" value = "{{ old('type') }}" id="exampleInputE" aria-describedby="emailHelp" placeholder="saisir le type d'évènement..." required>
     @error('type')
          <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
           </span>
     @enderror
    
         </div>
    </div>

      <div class="col col col-md-9">
         <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label fw-bold">Date</label>
    <input type="date" class="form-control" name = "date" value = "{{ old('date') }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Date création..." required>
     @error('date')
          <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
           </span>
     @enderror
    
         </div>
       
    </div>
       <div class="col col col-md-9">
         <div class="mb-3">
    <label for="exampleInputEmail13" class="form-label fw-bold">Heure</label>
    <input type="time" class="form-control" name = "heure" value = "{{ old('heure') }}" id="exampleInputEmail13" aria-describedby="emailHelp" placeholder="Date création..." required>
     @error('heure')
          <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
           </span>
     @enderror
    
         </div>
       
    </div>
       <div class="col col col-md-9">
         <div class="mb-3">
    <label for="exampleInputEmail12" class="form-label fw-bold">Lieu</label>
    <input type="text" class="form-control" name = "lieu" value = "{{ old('lieu') }}" id="exampleInputEmail12" aria-describedby="emailHelp" placeholder="Date création..." required>
     @error('lieu')
          <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
           </span>
     @enderror
    
         </div>
       
    </div>

     <div class="col col-md-9 mb-3">
         <label for="tetareaser" class="fw-bold mb-1">Description</label>
         <div class="form-floating ">
                <textarea id="tetareas" name= "description" value = "{{ old('description') }}" class="form-control" placeholder="Leave a comment here" id="floatingTextareaser" style="height: 100px" required></textarea>
                <label for="floatingTextarea2">écrire...</label>
          </div>
        </div>
        
        <div class="col col-md-9">
          <div class="mb-3">
     <label for="exampleInputEmail11" class="form-label fw-bold">Image </label>
     <input type="file" class="form-control" name = "image" value = {{ old('image') }} id="exampleInputEmail11" aria-describedby="emailHelp" placeholder="Date création..." required>
     
          </div>
         </div>

           <div class="col col-md-9 visually-hidden">
          <div class="mb-3">
     <label for="exampleInputEmail132" class="form-label fw-bold">association </label>
     <input type="text" class="form-control fw-bold" name = "association_id" value = {{ $association->id }} id="exampleInputEmail132" aria-describedby="emailHelp"  required>
     
          </div>
         </div>

         <div class="col col-md-9">
             <div class="mb-3">
                  <div class="col col-md-9 mt-3 ">
        <button type="submit" class="btn btn-primary">Valider</button>
       <button type ="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Annuler</button>
    </div>
</div>
</div>

</div>

</div>

</form>
   </div>
</div>

<!--Modal Annuler -->

      </div>
 
    </div>


<!-- Modal -->