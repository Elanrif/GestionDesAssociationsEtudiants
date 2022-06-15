
<div class="ms-2">
    
    <!-- on doit avoir plusieur modal de suppression dans chaque membre du bureau --> 
    <button  type="button" data-bs-toggle="modal" data-bs-target="#EVENT{{ $loop->index }}" class="btn btn-outline-success"><i class="fa-solid fa-eye"></i></button>
    
    
    <!-- Modal -->
    <div class="modal fade" id="EVENT{{ $loop->index }}" tabindex="-1" aria-labelledby="exampleModalLabeler" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary fw-bold" id="exampleModalLabeler"><i class="fa-solid fa-eye"></i> visualiser </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
      <div class="modal-body fw-bold">

           <div class="col pb-5">
      <div class="card">
        <div class="card-img-top" alt="..."  style="height:20vh; background: linear-gradient(rgba(38, 35, 66, 0.5),#0e0324) , url({{ asset('storage/'.$evenement->image) }} ) center / cover no-repeat  ;"></div>
        <div class="card-body">
          <h5 class="card-title fw-bold ms-3">ÉVÈNEMENT {{ $evenement->type }}</h5>
          <p class="card-text">
            <ul class="nav flex-column">
              <a href="#" class="nav-link my-2 text-dark fw-bold"><i class="fa-solid fa-calendar"></i> {{ $evenement->date }}</a>
              <a href="#" class="nav-link my-2 text-dark fw-bold"><i class="fa-solid fa-clock"></i> {{ $evenement->heure }}</a>
              <a href="#" class="nav-link my-2 text-dark fw-bold"><i class="fa-solid fa-location-dot"></i> {{ $evenement->lieu }}</a>
            </ul>
          </p>
        </div>


      </div>
    </div>


        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary fw-bold px-3" data-bs-dismiss="modal">Fermer</button>
            
        </div>
    </div>
</div>
</div> <!-- fin modal pour la suppression -->

</div>        
