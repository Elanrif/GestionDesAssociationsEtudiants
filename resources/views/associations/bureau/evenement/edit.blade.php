

        <!-- Attention ici j'aurais besoin de plusieur modal différent car chaque membre aura son modal --> 
        <div class="ms-3">  <!-- editer le membre du bureau --> 
             <button type="button" data-bs-toggle="modal" data-bs-target="#date{{ $loop->index }}" class="btn btn-outline-primary"><i class="fa-solid fa-file-pen"></i></button>
        </div>     
      <!-- et data-bs-target c'est comme une variable il n'accepte les espace , ou seulement nombre , il a tout les propriété d'une variable --> 
  
<!-- Modal pour editer -->
<div class="modal fade" id="date{{ $loop->index }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="exampleModalLabel">    <div class="container d-flex justify-content-center mt-4 bg-body shadow shadow-3 py-2 px-1 rounded-1 fs-4 fw-bold" style="width:auto" > <i class="fa-solid fa-clone p-1 me-1 fs-4 shadow shadow-3"></i>Modifier l'évènement <span class="text-primary fw-bold me-2"> &nbsp;{{ $evenement->type }} </span></div>  </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">


        <form class="form" method="POST" action="{{ route('update.evenement',$evenement->id) }}" enctype="multipart/form-data">
        
            @csrf
            @method('put')

<div class="container mt-3">
 <div class="input-asso row row-cols-1 align-items-center d-flex justify-content-center">

    <div class="col col-md-9">
      <div class="mb-3">
    <label for="exampleInputE" class="form-label fw-bold">Évènement</label>
    <input type="text" class="form-control" name = "type" value = "{{$evenement->type}}" id="exampleInputE" aria-describedby="emailHelp" placeholder="saisir le type d'évènement..." required>
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
    <input type="date" class="form-control" name = "date" value = "{{$evenement->date}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Date création..." required>
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
    <input type="time" class="form-control" name = "heure" value = "{{$evenement->heure}}" id="exampleInputEmail13" aria-describedby="emailHelp" placeholder="Date création..." required>
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
    <input type="text" class="form-control" name = "lieu" value = "{{$evenement->lieu}}" id="exampleInputEmail12" aria-describedby="emailHelp" placeholder="Date création..." required>
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
                <textarea id="tetareas" name= "description" value = "{{$evenement->description}}" class="form-control" placeholder="Leave a comment here" id="floatingTextareaser" style="height: 100px" required>
                {{$evenement->description}}
              </textarea>
                <label for="floatingTextarea2">{{$evenement->description}}</label>
          </div>
        </div>
        
        <div class="col col-md-9">
          <div class="mb-3">
     <label for="exampleInputEmail11" class="form-label fw-bold">Image </label>
     <input type="file" class="form-control" name ="image"  id="exampleInputEmail11" aria-describedby="emailHelp" placeholder="Date création..." required>
     
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
        <button type="submit" class="btn btn-primary">modifier</button>
       <button type ="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Annuler</button>
    </div>
</div>
</div>

</div>

</div>


</form>

    </div>
  </div>
</div>

<!-- fin modal -->
      
  </div>